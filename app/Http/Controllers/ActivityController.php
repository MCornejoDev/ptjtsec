<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;

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
}
