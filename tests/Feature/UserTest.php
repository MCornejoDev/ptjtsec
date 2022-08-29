<?php

namespace Tests\Feature;

use App\Models\Activity;
use App\Models\Project;
use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test when a user is assigned to the project
     * @test
     * @return void
     */
    public function can_be_a_user_assigned_to_the_project()
    {
        $this->withoutExceptionHandling();

        //The Project is created
        $project = Project::factory()->create();

        //Get Role
        $roleRandom = Factory::create()->randomElement(['responsible', 'member']);

        //The User is created and attached to the pivot table
        $user = User::factory()->hasAttached($project, ['roles' => $roleRandom])->create();

        //Executing & Asserting
        $this->assertDatabaseCount('project_user', 1);
        $this->assertDatabaseHas('project_user', [
            'project_id' => $project->id,
            'user_id' => $user->id,
            'roles' => $roleRandom
        ]);
    }

    /**
     * A basic feature test when a user is assigned to the activity
     * @test
     * @return void
     */
    public function can_be_a_user_assigned_to_the_activity()
    {
        $this->withoutExceptionHandling();
    }

    /**
     * A basic feature test when a user is assigned to the incident
     * @test
     * 
     * @return void
     */
    public function can_be_a_user_assigned_to_the_incident()
    {
        $this->withoutExceptionHandling();
    }
}
