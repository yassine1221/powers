<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\ProjectImage;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $types = ['Enseignes', 'Découpe Laser', 'Design Graphique'];
        
        foreach ($types as $type) {
            $project = Project::create([
                'title' => "Test $type Project",
                'type' => $type,
                'status' => 'termine'
            ]);

            ProjectImage::create([
                'project_id' => $project->id,
                'path' => 'projects/test-image.jpg'
            ]);
        }
    }
}
