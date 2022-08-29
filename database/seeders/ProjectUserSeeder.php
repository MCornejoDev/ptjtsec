<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $i = 0;
        while ($i <= 9) {
            DB::table('project_user')->insert([
                "project_id" => $faker->numberBetween(1, 4),
                "user_id" => $faker->numberBetween(1, 4),
                "roles" => $faker->randomElement(['responsible', 'member'])
            ]);
            $i++;
        }
    }
}
