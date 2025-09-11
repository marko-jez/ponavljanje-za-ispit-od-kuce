<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $books = Book::all(); da se sve prikazu knjige
        $user = Auth::user();
        $books = $user->books;
        $profile = $user->profile;
        return view('books.index', compact('books', 'user', 'profile'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year' => 'required'
        ],
        [
            'title.required' => 'Molimo vas unesite naslov knjige', 
            'author.required' => 'Molimo unesite autora',
            'year.required' => 'Molimo unesite godinu',  
        ]);

        Book::create([
            'author' => $validatedData['author'],
            'title' => $validatedData['title'],
            'year' => $validatedData['year'],
            'user_id' => Auth::user()->id
        ]);
        return redirect('/books');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::find($id);
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::find($id);
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year' => 'required'
        ],
        [
            'title.required' => 'Molimo vas unesite naslov knjige', 
            'author.required' => 'Molimo unesite autora',
            'year.required' => 'Molimo unesite godinu',  
        ]);

        $book = Book::find($id);
        $book->update([
            'author' => $validatedData['author'],
            'title' => $validatedData['title'],
            'year' => $validatedData['year'],
            'user_id' => Auth::user()->id
        ]);
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Book::destroy($id);
        return redirect()->route('books.index');
    }
}
