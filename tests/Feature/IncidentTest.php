<?php

namespace Tests\Feature;

use App\Models\Activity;
use App\Models\Incident;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IncidentTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test when a incident is created
     * @test
     * @return void
     */
    public function a_incident_can_be_added_to_the_activity()
    {
        $this->withoutExceptionHandling();

        //The Project is created
        $project = Project::factory()->create();

        //The Activity is created
        $activity = Activity::factory()->count(1)->for($project)->create()->last();

        //The Incident is created
        Incident::factory()->count(1)->create(['activity_id' => $activity->getAttribute('id')]);

        //Get last incident created
        $lastIncident = Incident::latest()->first();

        //Executing & Asserting
        $this->assertDatabaseCount('incidents', 1);
        $this->assertDatabaseHas('incidents', $lastIncident->getAttributes());
    }
}
