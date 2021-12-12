<?php

namespace Database\Factories;

use App\Models\Content;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ContentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Content::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => $this->faker->randomElement(['skills', 'interests', 'experiences']),
            'title' => $this->faker->text(33),
            'icon' => $this->faker->randomElement(['typescript', 'javascript', 'php', 'c++']),
            'body' => $this->faker->text(500),
        ];
    }
}
