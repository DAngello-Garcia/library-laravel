<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::pluck('id')->toArray();
        $books = Book::pluck('id')->toArray();

        return [
            'user_id' => $this->faker->randomElement($users),
            'book_id' => $this->faker->randomElement($books),
            'reservation_date' => Carbon::now(),
            'reservation_end' => Carbon::now()->addDays(7),
            'status' => $this->faker->randomElement(['active', 'cancelled', 'completed']),
        ];
    }
}
