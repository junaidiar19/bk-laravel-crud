<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // seeder categories
        $this->call(CategorySeeder::class);

        // factory book untuk 50 buku
        \App\Models\Book::factory(50)->create();
    }
}
