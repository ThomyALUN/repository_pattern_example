<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()          { return Book::all(); }

    public function store(Request $r){ return Book::create($r->only('title','author')); }

    public function show(Book $book) { return $book; }

    public function update(Request $r, Book $book)
    {
        $book->update($r->only('title','author'));
        return $book;
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return response()->noContent();
    }
}
