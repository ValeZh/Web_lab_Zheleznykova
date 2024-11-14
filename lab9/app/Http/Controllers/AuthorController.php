<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index()
    {
        return Author::all();
    }

    public function show($id)
    {
        return Author::findOrFail($id);
    }

    public function store(Request $request)
    {
        // Валидация данных
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'biography' => 'nullable|string',
        ]);

        // Создание автора
        $author = Author::create($validated);
        return response($author, 201);
    }

    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);

        // Валидация данных
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'biography' => 'nullable|string',
        ]);

        // Обновление данных автора
        $author->update($validated);
        return response($author, 200);
    }

    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();

        return response()->noContent();
    }
}
