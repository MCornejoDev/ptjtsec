<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use App\Http\Requests\StoreIncidentRequest;
use App\Http\Requests\UpdateIncidentRequest;

class IncidentController extends Controller
{
    /**
     * This function executing a save of records in the table activity
     */
    public function store()
    {
        $incident = new Incident();
        $message = "Error with the action save in Incident";

        $data = request()->validate(
            [
                'name' => '',
                'description' => '',
                'activity_id' => ''
            ]
        );

        $incident->fill($data);

        if ($incident->save()) {
            $message = "New Row Incident Added Succesfully";
        }

        return redirect("/")->with('status', $message);
    }
}
