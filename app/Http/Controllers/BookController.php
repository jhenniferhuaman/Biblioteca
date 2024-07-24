<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class  BookController extends Controller
{
    public function index()
    {
        return Book::all();
    }

    public function show(Book $book)
    {
        return $book;
    }

    public function store(Request $request)
    {
        Book::create([ 
           'title' => $request->title,
           'isbn' => $request->isbn,
           'author_id' => $request->author_id,
        ])->categories()->attach($request->categories);
        

        return response()->json(['message' => 'Book registrado']);
    }

    public function update(Request $request, Book $book)
    {
        $book->update([
            'title' => $request->title,
            'isbn' => $request->isbn,
            'author_id' => $request->author_id,
        ]);
        $this->updateCategories($request, $book);
        return $book;
    }

    public function updateCategories(Request $request, Book $book)
    {
        $book->categories()->sync([$request->categories]);
    }

    public function destroyCategories(Book $book)
    {
        $book->categories()->detach();
        return response()->json(['message' => 'Categorias eliminadas']);
    }

    public function destroy(Book $book)
    {
        $this->destroyCategories($book);
        $book->delete();
        return response()->json(['message' => 'Book eliminado']);
    }
}
