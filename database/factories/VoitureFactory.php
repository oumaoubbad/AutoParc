<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VoitureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "matricule" => $this->faker->lastName,
            "ncg" => $this->faker->swiftBicNumber,
            "image" => "images/imageplaceholder.png",
            "marque_id" => rand(1,4),
            "modele_id" => rand(1,4),
            "etat_id" => rand(1,4),
            "tcarburant_id" => rand(1,4),
            "status" => rand(0, 1)
        ];
    }
}
