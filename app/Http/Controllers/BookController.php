<?php

namespace App\Http\Controllers;

use App\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('book.index', ['books' => $books]);
    }
}
