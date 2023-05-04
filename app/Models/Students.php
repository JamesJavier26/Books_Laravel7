<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $fillable = [
        'name'
     ];

     public function books(){
        return $this->belongsTo(Students::class,'book_id');
    }  
}
