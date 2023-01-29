<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'year' =>    $this->faker->dateTimeBetween('-40 years', '-18 years'),
            'gender' => $this->faker->boolean(),
            'course_id' => Course::decode(Course::inRandomOrder()->value('id')),
            'status' => $this->faker->numberBetween(0, 3),
        ];
    }
}
