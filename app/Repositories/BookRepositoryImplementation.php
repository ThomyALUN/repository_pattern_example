<?php

namespace App\Repositories;

use App\Models\Book;
use App\Interfaces\BookRepositoryInterface;
use Illuminate\Support\Collection;

class BookRepositoryImplementation implements BookRepositoryInterface
{
    public function all(): Collection { return Book::all(); }

    public function create(array $d): Book { return Book::create($d); }

    public function find(int $id): ?Book { return Book::find($id); }

    public function update(Book $b, array $d): Book
    {
        $b->update($d);
        return $b;
    }

    public function delete(Book $b): void { $b->delete(); }
}
