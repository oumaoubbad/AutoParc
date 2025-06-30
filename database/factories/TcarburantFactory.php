<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TcarburantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => array_rand(["essence", "gazole", "diesel"], 1)
        ];
    }
}
