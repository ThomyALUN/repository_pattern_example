<?php

namespace App\Http\Controllers;

use App\Interfaces\BookRepositoryInterface;
use Illuminate\Http\Request;

class BookRepoController extends Controller
{
    public function __construct(private BookRepositoryInterface $books) {}

    public function index()          { return $this->books->all(); }

    public function store(Request $r){ return $this->books->create($r->only('title','author')); }

    public function show($id)
    {
        $book = $this->books->find($id);
        return $book ?: response()->json(['message'=>'Not found'], 404);
    }

    public function update(Request $r, $id)
    {
        $book = $this->books->find($id);
        if (!$book) return response()->json(['message'=>'Not found'], 404);

        return $this->books->update($book, $r->only('title','author'));
    }

    public function destroy($id)
    {
        $book = $this->books->find($id);
        if (!$book) return response()->json(['message'=>'Not found'], 404);

        $this->books->delete($book);
        return response()->noContent();
    }
}
