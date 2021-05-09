<?php

namespace Database\Factories;

use App\Models\ApartmentCategory;
use App\Models\Apartment;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApartmentCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ApartmentCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //error con el unique
        return [
            'ext_id' => Apartment::pluck('ext_id')->random(),
            'title' => $this->faker->word(),
            'description' => $this->faker->text($maxNbChars = 249),            
        ];
    }
}
