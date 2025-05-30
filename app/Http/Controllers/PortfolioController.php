<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class PortfolioController extends Controller
{
    public function index()
    {
        $projects = Project::with('images')->orderBy('created_at', 'desc')->get();
        $types = Project::distinct()->pluck('type')->filter(); // Get unique project types
        
        return view('portfolio', compact('projects', 'types'));
    }
}
