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
            'name' => 'Apartment '. $this->faker->domainWord(),
            'description' => $this->faker->text($maxNbChars = 249),
            'quantity' => $this->faker->numberBetween(0,10),
            'active' => $this->faker->numberBetween(0, 1),
        ];
    }
}
