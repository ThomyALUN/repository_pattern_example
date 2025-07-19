<?php

namespace App\Interfaces;

use App\Models\Book;
use Illuminate\Support\Collection;

interface BookRepositoryInterface
{
    public function all(): Collection;
    public function create(array $data): Book;
    public function find(int $id): ?Book;
    public function update(Book $book, array $data): Book;
    public function delete(Book $book): void;
}
