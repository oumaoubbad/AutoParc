<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MarqueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            "name" => $this->faker->lastName,
            "image" => "images/imageplaceholder.png",
        ];
    }
}
