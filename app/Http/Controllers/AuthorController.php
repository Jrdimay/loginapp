<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index(Request $request)
{
    $query = Author::query();

    if ($request->has('search')) {
        $searchTerm = $request->input('search');
        $query->where('Title', 'like', '%' . $searchTerm . '%');
    }

    $authors = $query->get();

    return view('pub', compact('authors'));
    $authors = Author::all();
}

    public function edit()
    {
        $author = Author::first();
        return view('Author.edit', compact('author'));
    }

    public function views()
    {
        $author = Author::first();
        return view('Author.views', compact('author'));
    }
    
}

