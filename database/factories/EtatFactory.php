<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EtatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => array_rand(["en service", "en reparation"], 1)

        ];
    }
}
