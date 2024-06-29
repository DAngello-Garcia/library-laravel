$(document).ready(function () {
    $("#filterForm").on("submit", function (event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: "/books",
            type: "GET",
            data: formData,
            success: function (response) {
                updateUIWithBooks(response);
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            },
        });
    });

    function updateUIWithBooks(books) {
        var bookList = $("#bookList");
        bookList.empty();
        var html = '<div class="card-group">';
        $.each(books, function (index, book) {
            html += '<div class="col-md-4 mb-4">';
            html += '<div class="card" style="width: 320px;">';
            html += '<div style="display: flex; justify-content: center;">';
            html +=
                '<img src="' +
                book.cover +
                '" class="card-img-top" alt="' +
                book.title +
                '" style="width: 320px; height: 240px;">';
            html += "</div>";
            html += '<div class="card-body">';
            html += '<h5 class="card-title">' + book.title + "</h5>";
            html +=
                '<p class="card-text"><strong>Author:</strong> ' +
                book.author +
                "</p>";
            html +=
                '<p class="card-text"><strong>Category:</strong> ' +
                book.categories.join(", ") +
                "</p>";
            html +=
                '<p class="card-text"><strong>Pages:</strong> ' +
                book.pages +
                "</p>";
            html += "</div></div></div>";
        });
        html += "</div>";
        bookList.append(html);
    }
});
