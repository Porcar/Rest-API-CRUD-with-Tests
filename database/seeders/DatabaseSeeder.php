<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Apartment;
use App\Models\ApartmentCategory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Clear both tables before running the factory seeders
        Apartment::truncate();
        ApartmentCategory::truncate();
        //Run both factory seeders 100 times.
        Apartment::factory()->count(100)->create();
        ApartmentCategory::factory()->count(100)->create();
    }
}
