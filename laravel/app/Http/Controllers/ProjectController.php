<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;

class ProjectController extends Controller
{

    public function createProject(Request $request)
    {
        try {
            $validated = $request->validate([
                'project_name' => 'required|string|max:255',
                'user_id' => 'required|exists:users,id', 
            ]);
    
            $project = Project::create([
                'name' => $validated['project_name'],
                'user_id' => $validated['user_id'],
            ]);
    
            $project->increment('requests_num'); 
    
            return response()->json($project, 201);
    
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    public function getProject($id){
        $project = Project::find($id);

        if(!$project){
            return response() -> json(['message' => 'Project not found'], 404);
        }

        return response() -> json($project);
    }

    public function addMember($projectId, $userId)
    {
        $project = Project::find($projectId);
        $user = User::find($userId);

        if (!$project || !$user) {
            return response()->json(['message' => 'Project or User not found'], 404);
        }

        $project->users()->attach($userId);

        return response()->json(['message' => 'User added to project']);
    }
}
