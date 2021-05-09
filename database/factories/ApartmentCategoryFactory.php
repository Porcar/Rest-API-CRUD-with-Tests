<?php

namespace Database\Factories;
use App\Models\ApartmentCategory;
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
        //Change $max = 100 to the number of times you need to run the factory since AP-ID is unique.
        return [
            'ext_id' => 'AP-'.$this->faker->unique()->numberBetween($min= 1, $max = 100),
            'title' => $this->faker->randomElement(['Luxury', 'Estándar','Premium','Etc']),
            'description' => $this->faker->text($maxNbChars = 249),            
        ];
    }
}
