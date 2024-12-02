<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function getproject($id){
        $project = Project::find($id);

        if(!$project){
            return response() -> json(['message' => 'Project not found'], 404);
        }

        return response() -> json($project);
    }
}
