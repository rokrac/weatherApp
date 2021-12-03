<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\ProductCondition;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductConditionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductCondition::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => $this->faker->numberBetween(1,100),
            'condition_id' => $this->faker->numberBetween(1,12),
        ];
    }
}
