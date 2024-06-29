<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $booksQuery = Book::where('available', true);

        if ($request->ajax()) {
            $category = $request->input('category');
            if ($category) {
                $booksQuery->whereJsonContains('categories', $category);
            }
            $books = $booksQuery->get();
            return response()->json($books);
        }

        $books = $booksQuery->get();
        $distinctCategories = Book::distinct()->pluck('categories')->flatten()->unique();

        return view('book.list', compact('books', 'distinctCategories'));
    }

    public function detail( $id)
    {
        $book = Book::findOrFail($id);
        if ($book) {
            return response()->json($book);
        } else {
            return response()->json(['message' => 'Book not found'], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
