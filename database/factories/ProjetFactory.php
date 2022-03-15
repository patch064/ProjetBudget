<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Projet;
use Illuminate\Support\Str;

class ProjetFactory extends Factory
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function authorize()
    {
        return true;
    }
    public function definition()
    {
        return ['Libelle' => $this->faker->text(10 ),
            'cout' => $this->faker->numberBetween(1, 10000),
            'description'=> $this->faker->text( 30),
        ];
    }
}
