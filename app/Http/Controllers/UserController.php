<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Incident;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * This function executing a select for get all activities of user
     */
    public function getActivities($id)
    {
        return User::find($id)->activities;
    }

    /**
     * This function executing a select for get all incidents where the user has access
     */
    public function getIncidents($id)
    {
        $user = User::find($id);
        $activities = $user->activities()->where('roles', '=', 'responsible')->get();
        $incidents = [];
        foreach ($activities as $activity) {
            array_push($incidents, Activity::find($activity->id)->incidents);
        }

        return $incidents;
    }
}
