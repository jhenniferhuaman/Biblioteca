<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        return Author::all();
    }

    public function show(Author $author)
    {
        return $author;
    }

    public function store(Request $request)
    {
        //dd($request->lastname);
        //return $request;
        Author::create([
           'name' => $request->name,
           'last_name' => $request->last_name,
        ]);
        
        return response()->json(['message' => 'Autor registrado']);
    }

    public function update(Request $request, Author $author)
    {
        $author->update($request->all());
        return $author;
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return response()->json(['message' => 'Author eliminado']);
    }
}
