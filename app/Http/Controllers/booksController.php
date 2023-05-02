<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use App\Models\Books;

class booksController extends Controller
{

    public function index()
    {
        $books = Books::latest()->paginate(5);
  
        return view('books.index',compact('books'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
            
    }
   

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
  
        Books::create($request->all());
   
        return redirect()->route('books.index')
                        ->with('success','Book Listed successfully.');
    }
   

    public function show(Books $book)
    {
        return view('books.show',compact('book'));
    }
   
    public function edit(Books $book)
    {
        return view('books.edit',compact('book'));
    }
  
    public function update(Request $request, Books $book)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
  
        $book->update($request->all());
  
        return redirect()->route('books.index')
                        ->with('success','Book updated successfully');
    }
  
    public function destroy(Books $book)
    {
        $book->delete();
  
        return redirect()->route('books.index')
                        ->with('success','Book deleted successfully');
    }
}
