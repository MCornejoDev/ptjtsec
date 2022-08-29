<?php

namespace Tests\Feature;

use App\Models\Activity;
use App\Models\Project;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ActivityTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test when a is added to the project
     * @test
     * @return void
     */
    public function a_activity_can_be_added_to_the_project()
    {
        $this->withoutExceptionHandling();

        //The Project is created
        $project = Project::factory()->create(); 

        //The Activity is created
        Activity::factory()->count(1)->for($project)->create(); 

        //Get last activity created
        $lastActivity = Activity::latest()->first();

        //Executing & Asserting
        $this->assertDatabaseCount('activities', 1);
        $this->assertDatabaseHas('activities', $lastActivity->getAttributes());
    }
}
