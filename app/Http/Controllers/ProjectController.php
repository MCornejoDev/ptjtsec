<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * This function executing a save of records in the table projects
     */
    public function store()
    {
        $project = new Project();
        $message = "Error with the action save in Project";

        $data = request()->validate(
            [
                'name' => '',
                'description' => ''
            ]
        );

        $project->fill($data);

        if ($project->save()) {
            $message = "New Row Project Added Succesfully";
        }

        return redirect("/")->with('status', $message);
    }

    /**
     * This function executing a select for get all users of project
     */
    public function getUsers($id)
    {
        return Project::find($id)->users;
    }
}
