<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Carbon\Carbon;
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
     * This function executing a insert for add users to the project
     */
    public function addUserToTheProject()
    {
        $message = "Error with the action insert in Project - User";
        $project_id = request()->route('id');
        request()->validate(
            [
                'role' => '',
                'user_id' => ''
            ]
        );

        $query = DB::table('project_user')->insertGetId([
            'roles' => request()->role,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'project_id' => $project_id,
            'user_id' => request()->user_id
        ]);

        if ($query) {
            $message = "New Row Project - User Added Succesfully";
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
