<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    /**
     * This function executing a save of records in the table activity
     */
    public function store()
    {
        $activity = new Activity();
        $message = "Error with the action save in Activity";
        
        $data = request()->validate(
            [
                'name' => '',
                'description' => '',
                'project_id' => ''
            ]
        );

        $activity->fill($data);

        if ($activity->save()) {
            $message = "New Row Activity Added Succesfully";
        }

        return redirect("/")->with('status', $message);
    }

    /**
     * This function executing a insert for add users to the project
     */
    public function addUserToTheActivity()
    {
        $message = "Error with the action insert in Activity - User";
        $activity_id = request()->route('id');
        request()->validate(
            [
                'role' => '',
                'user_id' => ''
            ]
        );

        $query = DB::table('activity_user')->insertGetId([
            'roles' => request()->role,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'activity_id' => $activity_id,
            'user_id' => request()->user_id
        ]);

        if ($query) {
            $message = "New Row Activity - User Added Succesfully";
        }

        return redirect("/")->with('status', $message);
    }
}
