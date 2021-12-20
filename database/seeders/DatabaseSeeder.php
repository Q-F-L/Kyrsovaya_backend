<?php

namespace Database\Seeders;

use App\Models\Courses;
use Directory;
use Illuminate\Database\Seeder;
use App\Models\Touragent;
use App\Models\Tour;
use App\Models\Users;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //Touragent::factory(10)->create();
        Tour::factory(10)->create();
        Users::factory(10)->create();
    }
}
