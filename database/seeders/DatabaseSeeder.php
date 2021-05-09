<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Apartment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Apartment::factory()->count(50)->create();
    }
}
