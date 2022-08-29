<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Activity;
use App\Models\Incident;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //This seeder call others seeder for faker data
        $this->call([
            UserSeeder::class,
            ProjectSeeder::class,
            ActivitySeeder::class,
            IncidentSeeder::class,
            ProjectUserSeeder::class,
            ActivityUserSeeder::class
        ]);
    }
}
