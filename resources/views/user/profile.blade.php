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
            <div class="card">
                <div class="card-header">Profile</div>
                <div class="card-body">
                    <p><strong>Name:</strong> {{ $user->name }}</p>
                    <p><strong>Username:</strong> {{ $user->username }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header">My Reservations</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Book</th>
                                <th>Reservation Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservations as $reservation)
                                <tr>
                                    <td>{{ $reservation->book->title }}</td>
                                    <td>{{ $reservation->reservation_date }}</td>
                                    <td>{{ $reservation->reservation_end }}</td>
                                    <td>{{ $reservation->status }}</td>
                                    @if($reservation->status == 'active')
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('reservation.show', $reservation->id) }}" class="btn btn-info">Details</a>
                                            <form action="{{ route('reservation.destroy', $reservation->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                    @else
                                    <td>
                                        
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</x-app-layout>