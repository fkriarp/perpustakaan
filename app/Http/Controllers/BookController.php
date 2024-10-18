<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'stock_available' => 'required',
            'stock_needs' => 'required',
        ]);

        $stockAvailable = $request->stock_available;
        $stockNeeds = $request->stock_needs;
        
        if ($stockAvailable < $stockNeeds) {
            $difference = $stockNeeds - $stockAvailable; 
        } else {
            $difference = 0;
        }

        Book::create([
            'book_name' => $request->name,
            'stock_available' => $request->stock_available,
            'stock_needs' => $request->stock_needs,
            'shortage' => $difference,
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Book::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Data berhasil dihapus!');
    }
}
