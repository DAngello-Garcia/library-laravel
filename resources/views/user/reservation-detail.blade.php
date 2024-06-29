<x-app-layout>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card align-items-center">
                <div class="card-header">Reservation Details</div>
                <div class="card-body">
                    <p><strong>Book:</strong> {{ $reservation->book->title }}</p>
                    <p><strong>Author:</strong> {{ $reservation->book->author }}</p>
                    <p><strong>Reservation Date:</strong> {{ $reservation->reservation_date }}</p>
                    <p><strong>End Date:</strong> {{ $reservation->reservation_end }}</p>
                    <p><strong>Status:</strong> {{ $reservation->status }}</p>
                    <p><strong>Cover:</strong> <img src="{{ $reservation->book->cover }}" alt=""></p>
                </div>
                <div class="card-footer">
                <form action="{{ route('reservation.destroy', $reservation->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                </div>
            </div>
        </div>
    </div>
</div>

</x-app-layout>