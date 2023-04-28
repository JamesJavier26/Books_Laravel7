<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use App\Books;

class booksController extends Controller
{
    public function index(){
    $books = Books::select('id','name','description')->get();
      return view('books.index')->with('books',$books);
    }

    public function create(){
        return view('books.create');
    }

    public function store(Request $request){
        $data = $request->except('_method','_token','submit');
  
        $validator = Validator::make($request->all(), [
           'name' => 'required|string|min:3',
           'description' => 'required|string|min:3',
        ]);
  
        if ($validator->fails()) {
           return redirect()->Back()->withInput()->withErrors($validator);
        }
  
        if($record = Books::firstOrCreate($data)){
           Session::flash('message', 'Added Successfully!');
           Session::flash('alert-class', 'alert-success');
           return redirect()->route('books');
        }else{
           Session::flash('message', 'Data not saved!');
           Session::flash('alert-class', 'alert-danger');
        }
  
        return Back();
     }

     public function edit($id){
        $books = Books::find($id);
  
        return view('books.edit')->with('books',$books);
     }

     public function update(Request $request,$id){
        $data = $request->except('_method','_token','submit');
  
        $validator = Validator::make($request->all(), [
           'name' => 'required|string|min:3',
           'description' => 'required|string|min:3',
        ]);
  
        if ($validator->fails()) {
           return redirect()->Back()->withInput()->withErrors($validator);
        }
        $books = Books::find($id);
  
        if($books->update($data)){
  
           Session::flash('message', 'Update successfully!');
           Session::flash('alert-class', 'alert-success');
           return redirect()->route('books');
        }else{
           Session::flash('message', 'Data not updated!');
           Session::flash('alert-class', 'alert-danger');
        }

        return Back()->withInput();
    }

    // Delete
   public function destroy($id){
    Books::destroy($id);

    Session::flash('message', 'Delete successfully!');
    Session::flash('alert-class', 'alert-success');
    return redirect()->route('books');
 }

  
}
