<?php

use App\Book;
use Illuminate\Http\Request;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// book routes version 2
Route::resource('b2', 'BooksController');

/*
Route::get('/b2', ['as' => 'indexBook', 'middleware' => 'auth', 'uses' => 'BooksController@index']);
//Route::get('/b2/create', ['as' => 'createBook2', 'middleware' => 'auth', 'uses' => 'BooksController@create']);
Route::post('/b2', ['as' => 'storeBook', 'middleware' => 'auth', 'uses' => 'BooksController@store']);
Route::get('/b2/{book}', 'BooksController@show');
*/




// book routes version 1
Route::group(['middleware' => ['web']], function() {

    Route::get('/b', ['middleware' => 'auth', function() {
        $books = Book::all();
        return view('books', ['books' => $books]);
    }]);

    Route::post('/book', ['middleware' => 'auth', function(Request $request) {

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            ]);

        if($validator->fails()) {
            return redirect('/b')
                ->withInput()
                ->withErrors($validator);
        }

        $book = new Book;
        $book->title = $request->title;
        $book->excerpt = $request->excerpt;
        $book->description = $request->description;
        $book->save();

        return redirect('/b');
    }]);

    Route::delete('/book/{book}', ['middleware' => 'auth', function(Book $book) {
        $book->delete();
        return redirect('/b');
    }]);

    Route::auth();

});