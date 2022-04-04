<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Budget;
use Illuminate\Support\Str; //à rajouter

class BudgetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function authorize()
    {
        return true;
    }
    public function definition()
    {
        return ['Libelle' => $this->faker->text(10 ),
            'somme' => $this->faker->numberBetween(1, 10000),
           'user_id' => $this ->faker->numberBetween(1,20)

        ];
    }
}
