<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Book;
use App\Models\Reservation;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $books = Book::all();

        foreach ($users as $user) {
            foreach ($books as $book) {
                Reservation::create([
                    'user_id' => $user->id,
                    'book_id' => $book->id,
                    'reservation_date' => Carbon::now(),
                    'reservation_end' => Carbon::now()->addDays(7),
                    'status' => 'active',
                ]);
            }
        }
    }
}
