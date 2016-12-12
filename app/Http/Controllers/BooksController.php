<?php

use App\Book;

class BooksController extends Controller {

    public function index() {

        $books = Book::all();

        return view('book', compact(books));

    }

    public function show($id) {

        $book = Book::findOrFail($id);

        return view('books.show', compact(book));

    }

}