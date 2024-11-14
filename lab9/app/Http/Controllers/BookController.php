<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        return Book::with('author', 'genre')->get();
    }

    public function show($id)
    {
        return Book::with('author', 'genre')->findOrFail($id);
    }

    public function store(Request $request)
    {
        // Валидация данных
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'year' => 'required|integer|min:1000|max:' . date('Y'),
            'price' => 'required|numeric|min:0',
            'author_id' => 'required|exists:authors,id',
            'genre_id' => 'required|exists:genres,id',
        ]);

        // Создание книги
        $book = Book::create($validated);
        return response($book, 201);
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        // Валидация данных
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'year' => 'required|integer|min:1000|max:' . date('Y'),
            'price' => 'required|numeric|min:0',
            'author_id' => 'required|exists:authors,id',
            'genre_id' => 'required|exists:genres,id',
        ]);

        // Обновление данных книги
        $book->update($validated);
        return response($book, 200);
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return response()->noContent();
    }
}
