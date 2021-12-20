<?php

namespace Database\Factories;

use App\Models\Touragent;
use Illuminate\Database\Eloquent\Factories\Factory;

class TouragentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Touragent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'surname' => 'Surname',
            'email' => $this->faker->email(),
            'country' => $this->faker->country(),
            'face_img' => $this->faker->imageUrl,
            'rating'=> '0',
            'description' => $this->faker->text(),
            'password' => '1234567890'
        ];
    }
}
