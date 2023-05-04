<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $fillable = [
        'name','description' 
     ];

    public function students(){
        return $this->hasOne(Books::class,'books_id');
    } 
}
