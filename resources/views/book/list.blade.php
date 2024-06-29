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
<div class="container mt-5">
    <div class="row mb-3">
        <div class="col-md-4">
            <form id="filterForm" method="GET">
                <div class="input-group">
                    <select name="category" class="form-control">
                        <option value="">All Categories</option>
                        @foreach($distinctCategories as $cat)
                            <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>
                                {{ $cat }}
                            </option>
                        @endforeach
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Filter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="bookList">
        <div class="card-group">
            @foreach($books as $book)
                <div class="col-md-4 mb-4">
                    <div class="card" style="width: 320px;">
                        <div style="display: flex; justify-content: center;">
                            <img src="{{ $book->cover }}" class="card-img-top" alt="{{ $book->title }}" style="width: 320px; height: 240px;">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text"><strong>Author:</strong> {{ $book->author }}</p>
                            <p class="card-text"><strong>Category:</strong> {{ implode(', ', $book->categories) }}</p>
                            <p class="card-text"><strong>Pages:</strong> {{ $book->pages }}</p>
                            <button class="btn btn-primary openModalButton" data-book-id="{{ $book->id }}">View Details</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
    
<div class="modal" tabindex="-1" role="dialog" id="bookModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Book Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="reservationForm" method="POST">
                @csrf
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Reserve Book</button>
                </div>
            </form>
        </div>
    </div>
</div>


@vite(['resources/js/retrieve-books.js'])

<script defer>
    $(document).ready(function () {
        $('.openModalButton').click(function () {
            var bookId = $(this).data('book-id');
            $.ajax({
                url: `/books/${bookId}`,
                method: 'GET',
                data: bookId,
                success: function (response) {
                    const modalBody = document.querySelector(".modal-body");
                    const formAction = `/books/${bookId}/reserve`;
                    $('#reservationForm').attr('action', formAction);
                    modalBody.innerHTML = `
                        <h5>${response.title}</h5>
                        <p><strong>Author:</strong> ${response.author}</p>
                        <p><strong>Category:</strong> ${response.categories.join(", ")}</p>
                        <p><strong>Pages:</strong> ${response.pages}</p>
                        <div class="form-group">
                        <label for="reservation_end">Reservation End Date:</label>
                        <input type="date" class="form-control" id="reservation_end" name="reservation_end" required>
                    </div>
                    `;
                    $('#bookModal').modal('show');
                },
                error: function () {
                    $('.modal-body').text('An error occurred while fetching user data.');
                    $('#bookModal').modal('show');
                }
            });
        });
    });
</script>

</x-app-layout>
