<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $fillable = [
        'name', 'books_id'
     ];

     public function books(){
        return $this->belongsTo(Students::class,'books_id');
    }  
}
