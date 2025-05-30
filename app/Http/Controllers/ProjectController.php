<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('images')->orderBy('created_at', 'desc')->get();
        return view('admin.projects', compact('projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|in:Industrie Publicitaire,Découpe CNC & LASER,Impression numérique & UV',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $project = Project::create([
            'title' => $request->title,
            'type' => $request->type,
            'status' => 'termine' // Default status
        ]);
        

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('projects', 'public');
                ProjectImage::create([
                    'project_id' => $project->id,
                    'path' => $path
                ]);
            }
        }

        return redirect()->route('admin.projects')->with('success', 'Projet ajouté avec succès');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        
        // Delete associated images from storage
        foreach ($project->images as $image) {
            Storage::disk('public')->delete($image->path);
            $image->delete();
        }
        
        $project->delete();
        
        return response()->json(['success' => true]);
    }

    public function deleteImage($id)
    {
        $image = ProjectImage::findOrFail($id);
        Storage::disk('public')->delete($image->path);
        $image->delete();
        
        return response()->json(['success' => true]);
    }
}
