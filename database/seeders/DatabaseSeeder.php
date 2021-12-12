<?php

namespace Database\Seeders;

use App\Models\Content;
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
        // User::factory(10)->create();
        Content::factory(6)->create([
            'type' => 'skills',
        ]);

        Content::factory(3)->create([
            'type' => 'interests',
        ]);

        Content::factory(3)->create([
            'type' => 'experiences',
        ]);
    }
}
