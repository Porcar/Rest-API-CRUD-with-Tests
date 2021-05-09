<?php

namespace Database\Factories;

use App\Models\Apartment;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApartmentFactory extends Factory
{

    protected $model = Apartment::class;

    //factory to seed the DB
    public function definition()
    {
        
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text($maxNbChars = 249),
            'quantity' => $this->faker->numberBetween(0,100),
            'active' => $this->faker->numberBetween(0, 1),
        ];
    }
}
