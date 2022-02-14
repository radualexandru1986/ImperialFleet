<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ship>
 */
class ShipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'class' => $this->faker->streetName,
            'crew'  => rand(2000, 5000),
            'image' => 'https://www.denofgeek.com/wp-content/uploads/2016/01/millennium-falcon.jpg',
            'value' => '1999.44',
            'status' => 'Operational'
        ];
    }
}
