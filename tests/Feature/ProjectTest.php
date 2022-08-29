<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Faker\Factory;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test when a project is created
     * @test
     * @return void
     */
    public function a_project_can_be_created()
    {
        $this->withoutExceptionHandling();

        //The Project is created
        $project = Project::factory()->create();

        //Executing & Asserting
        $this->assertDatabaseCount('projects', 1);
        $this->assertDatabaseHas('projects', $project->getAttributes());
    }

    /**
     * A basic feature test when a project is created
     * @test
     * @return void
     */
    public function member_list_of_project()
    {
        $this->withoutExceptionHandling();
    }
}
