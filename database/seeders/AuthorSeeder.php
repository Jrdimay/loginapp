<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    public function run()
    {
        // Create a new author
        Author::create([
            'name' => 'Author Name',
            'abstract' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...'
        ]);
    }
}