<!-- Extends template page-->
@extends('layout.app')

<!-- Specify content -->
@section('content')

<h3>Books List</h3>

<div class="row">
   <div class="col-md-12 col-sm-12 col-xs-12">
      <!-- Alert message (start) -->
      @if(Session::has('message'))
      <div class="alert {{ Session::get('alert-class') }}">
         {{ Session::get('message') }}
      </div>
      @endif
      <!-- Alert message (end) -->

      <div class='actionbutton'>

         <a class='btn btn-info float-right' href="{{route('books.create')}}">Add</a>

      </div>
      <table class="table" >
        <thead>
          <tr>
            <th width='40%'>Name</th>
            <th width='40%'>Description</th>
            <th width='20%'>Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach($books as $books)
           <tr>
              <td>{{ $books->name }}</td>
              <td>{{ $books->description }}</td>
              <td>
                 <!-- Edit -->
                 <a href="{{ route('books.edit',[$books->id]) }}" class="btn btn-sm btn-info">Edit</a>
                 <!-- Delete -->
                 <a href="{{ route('books.delete',$books->id) }}" class="btn btn-sm btn-danger">Delete</a>
              </td>
           </tr>
        @endforeach
        </tbody>
     </table>

   </div>
</div>
@stop