<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Students;
use App\Models\Books;

class StudentsController extends Controller
{
    public function index()
    {
        $students = Students::latest()->paginate(5);
  
        return view('students.index',compact('students'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
            
    }
   

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'books_id' => 'required'
        ]);
  
        Students::create($request->all());
   
        return redirect()->route('students.index')
                        ->with('success','Student Listed successfully.');
    }
   

    public function show(Students $student)
    {
        return view('students.show',compact('student'));
    }
   
    public function edit(Students $student)
    {
        return view('students.edit',compact('student'));
    }
  
    public function update(Request $request, Students $student)
    {
        $request->validate([
            'name' => 'required',
            'books_id' => 'required'
        ]);
  
        $student->update($request->all());
  
        return redirect()->route('students.index')
                        ->with('success','Student updated successfully');
    }
  
    public function destroy(Students $student)
    {
        $student->delete();
  
        return redirect()->route('students.index')
                        ->with('success','Student deleted successfully');
    }
}
