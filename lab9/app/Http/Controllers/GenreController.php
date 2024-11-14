<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function index()
    {
        return Genre::all();
    }

    public function show($id)
    {
        return Genre::findOrFail($id);
    }

    public function store(Request $request)
    {
        // Валидация данных
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Создание жанра
        $genre = Genre::create($validated);
        return response($genre, 201);
    }

    public function update(Request $request, $id)
    {
        $genre = Genre::findOrFail($id);

        // Валидация данных
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Обновление данных жанра
        $genre->update($validated);
        return response($genre, 200);
    }

    public function destroy($id)
    {
        $genre = Genre::findOrFail($id);
        $genre->delete();

        return response()->noContent();
    }

    public function test(Request $request)
    {
        return "Test";
    }
}
