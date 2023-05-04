<?php

use Illuminate\Database\Seeder;
use App\Models\Books;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Books::create([
            'name' => 'Science Book',
            'description' => 'Book About Science'
        ]);
    }
}
