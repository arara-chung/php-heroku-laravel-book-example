<?php

namespace App\Http\Controllers;

use App\Book;
use Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\CreateBookRequest;

class BooksController extends Controller {

    public function __construct() {

        //$this->middleware('auth', ['except' => ['index','show']]);
        $this->middleware('auth');

    }
    
    public function index() {

        $books = Book::latest()->get();
        //$books = Book::latest('published_at')->where('published_at', '<=', Carbon::now())->get();
        //$books = Book::latest('published_at')->published()->get();

        return view('books.books2', ['books' => $books]);

    }

    // Validation using Validator::make($input, rule_array);
    /*
    public function store() {

        // Request Facade
        $input = Request::all();
        
        $validator = Validator::make($input, [
            'title' => 'required|max:255',
            ]);

        if($validator->fails()) {
            return redirect('/b2')
                ->withInput()
                ->withErrors($validator);
        }

        Book::create($input);

        return redirect('/b2');
    }
    */

    // Validation php artisan make:request CreateBookRequest
    public function store(CreateBookRequest $request) {

        $input = $request->all();

        Book::create($input);

        return redirect('/b2');
    }

    public function create() {

    }

    public function show($b2) {

        $book = Book::findOrFail($b2);

        return view('books.show')->with(compact('book'));

    }

    public function update($b2) {

    }

    public function destroy($b2) {

    }

    public function edit($b2) {

        $book = Book::findOrFail($b2);

        return view('books.edit', compact(book));
    }





}