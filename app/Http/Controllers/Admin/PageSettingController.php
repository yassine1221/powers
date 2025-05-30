<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageSettingController extends Controller
{
    public function index()
    {
        $pageSettings = PageSetting::all();
        $pages = PageSetting::getPages();
        return view('admin.page-settings.index', compact('pageSettings', 'pages'));
    }

    public function edit($id)
    {
        $pageSetting = PageSetting::findOrFail($id);
        return view('admin.page-settings.edit', compact('pageSetting'));
    }

    public function update(Request $request, $id)
    {
        $pageSetting = PageSetting::findOrFail($id);

        $request->validate([
            'hero_title' => 'required|string|max:255',
            'hero_description' => 'required|string',
            'hero_background' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('hero_background')) {
            // Delete old image if exists
            if ($pageSetting->hero_background) {
                Storage::disk('public')->delete($pageSetting->hero_background);
            }

            // Store new image
            $path = $request->file('hero_background')->store('hero-backgrounds', 'public');
            $pageSetting->hero_background = $path;
        }

        $pageSetting->hero_title = $request->hero_title;
        $pageSetting->hero_description = $request->hero_description;
        $pageSetting->save();

        return redirect()->route('admin.page-settings.index')
            ->with('success', 'Paramètres de la page mis à jour avec succès.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'page_name' => 'required|string|unique:page_settings',
            'hero_title' => 'required|string|max:255',
            'hero_description' => 'required|string',
            'hero_background' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $pageSetting = new PageSetting();
        $pageSetting->page_name = $request->page_name;
        $pageSetting->hero_title = $request->hero_title;
        $pageSetting->hero_description = $request->hero_description;

        if ($request->hasFile('hero_background')) {
            $path = $request->file('hero_background')->store('hero-backgrounds', 'public');
            $pageSetting->hero_background = $path;
        }

        $pageSetting->save();

        return redirect()->route('admin.page-settings.index')
            ->with('success', 'Paramètres de la page créés avec succès.');
    }

    public function create()
    {
        $availablePages = collect(PageSetting::getPages())
            ->diffKeys(PageSetting::pluck('page_name', 'page_name'));
            
        return view('admin.page-settings.create', compact('availablePages'));
    }

    public function destroy($id)
    {
        $pageSetting = PageSetting::findOrFail($id);

        // Delete hero background image if exists
        if ($pageSetting->hero_background) {
            Storage::disk('public')->delete($pageSetting->hero_background);
        }

        $pageSetting->delete();

        return redirect()->route('admin.page-settings.index')
            ->with('success', 'Paramètre de la page supprimé avec succès.');
    }
}
