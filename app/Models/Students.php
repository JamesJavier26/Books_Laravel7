<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Books;

class Students extends Model
{
    protected $fillable = [
        'name', 'books_id'
     ];

     public function books(){

        return $this->belongsTo(Books::class);

    }  
}
