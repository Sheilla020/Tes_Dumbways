<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Category::create([
            'name' => 'Progaming'
        ]);
        Category::create([
            'name' => 'Dev Web'
        ]);
        Category::create([
            'name' => 'Android'
        ]);

        Book::create([
            'categorie_id' => '1',
            'name' => 'Progaming Book 1',
            'stock' => '5',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Rerum harum officiis quis. Reiciendis quaerat, eum dignissimos dicta magni 
            labore commodi eligendi natus consectetur quibusdam tenetur, veritatis 
            accusantium ab error aliquid!'
        ]);

        Book::create([
            'categorie_id' => '1',
            'name' => 'Progaming Book 2',
            'stock' => '5',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Rerum harum officiis quis. Reiciendis quaerat, eum dignissimos dicta magni 
            labore commodi eligendi natus consectetur quibusdam tenetur, veritatis 
            accusantium ab error aliquid!'
        ]);

        Book::create([
            'categorie_id' => '2',
            'name' => 'Full Stack Book 1',
            'stock' => '5',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Rerum harum officiis quis. Reiciendis quaerat, eum dignissimos dicta magni 
            labore commodi eligendi natus consectetur quibusdam tenetur, veritatis 
            accusantium ab error aliquid!'
        ]);

        Book::create([
            'categorie_id' => '3',
            'name' => 'Android',
            'stock' => '5',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Rerum harum officiis quis. Reiciendis quaerat, eum dignissimos dicta magni 
            labore commodi eligendi natus consectetur quibusdam tenetur, veritatis 
            accusantium ab error aliquid!'
        ]);
    }
}
