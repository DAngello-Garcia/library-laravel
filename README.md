# Library

This is a system to manage the books reservations made by users.

## Requirements

### User

-   An user can register, login and logout.
-   An user can edit their profile.
-   An user can see a list of their reservations and delete them.
-   An user can reserve a book.

### Book

-   A book can be reserved.
-   A book can be listed only if it is available.
-   A book can be filtered by category.
-   A book can be reserved.

## Data modeling

### User

id, name, username, email, password

### Book

id, isbn, title, author, description, categories, publisher, publication_date, pages, cover, available

### Reservation

id, user_id, book_id, reservation_date, reservation_end, status

## Requisites

Before you begin, ensure you have met the following requirements:

-   **PHP >= 8.0**: Ensure PHP is installed and properly configured.
-   **Composer**: PHP dependency manager.
-   **Node.js & npm**: Node.js and npm for front-end dependencies.

## Installation

Follow these steps to install and set up the project:

1. **Clone the Repository**:

    ```bash
    git clone https://github.com/DAngello-Garcia/library-laravel.git
    cd library-laravel
    ```

2. **Install PHP Dependencies**:

    ```bash
    composer install
    ```

3. **Install Node.js Dependencies**:

    ```bash
    npm install
    ```

4. **Set Up Environment Variables**:
   Copy the `.env.example` file to `.env`.

    ```bash
    cp .env.example .env
    ```

5. **Generate Application Key**:

    ```bash
    php artisan key:generate
    ```

6. **Run Migrations**:

    ```bash
    php artisan migrate
    ```

7. **Run Database Seeders**:

    ```bash
    php artisan db:seed
    ```

8. **Running the Application**:
    ```bash
    php artisan serve
    ```
