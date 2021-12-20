<?php

namespace Database\Factories;

use App\Models\Tour;
use Illuminate\Database\Eloquent\Factories\Factory;

class TourFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tour::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titel' => $this->faker->name,
            'continent' => 'Continent',
            'country' => $this->faker->country(),
            'price' => 30000,
            'topic' => $this->faker->text(20),
            'description' => $this->faker->realText,
            'touragent_id' => $this->faker->numberBetween(1, 10),
            'rating' => '0',
            'ageGroup' => '10-62',
            'route' => 'Албания',
            'day' => $this->faker->date,
            'faceImg' => $this->faker->imageUrl,
            'gallery' => 'gallery',
            'included' => $this->faker->text,
            'notIncluded' => $this->faker->text,
            'Requirements' => 'Requirements',
            'Cancellation' => 'Cancellation',
            'MaxTourist' => 10,
            'touristCounter' => 0,
            'dates' => 'dates'
        ];
    }
}
