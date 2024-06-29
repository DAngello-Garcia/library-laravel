<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function destroyReservation($id)
    {
        $reservation = Auth::user()->reservations()->findOrFail($id);

        $bookId = $reservation->book_id;
        $book = Book::find($bookId);
        $book->update(['available' => true]);

        $reservation->update(['status' => 'cancelled']);

        return redirect()->route('user.profile')->with('success', 'Reservation deleted successfully');
    }

    public function showReservation($id)
    {
        $reservation = Auth::user()->reservations()->with('book')->findOrFail($id);
        return view('user.reservation-detail', compact('reservation'));
    }

    public function reserve(Request $request, $bookId)
    {
        $request->validate([
            'reservation_end' => 'required|date|after:today',
        ]);

        $user_id = Auth::id();
        $book = Book::find($bookId);

        if (!$book) {
            return response()->json(['message' => 'Book is not available for reservation.'], 403);
        }

        $reservation = Reservation::create([
        'user_id' => $user_id,
        'book_id' => $book->id,
        'reservation_date' => Carbon::now(),
        'reservation_end' => Carbon::createFromFormat('Y-m-d', $request->reservation_end)->endOfDay(),
        'status' => 'active',
        ]);

        $book->update(['available' => false]);

        return redirect()->route('books.all', ['book' => $book])->with('success', 'Reservation created successfully.');
    }
}
