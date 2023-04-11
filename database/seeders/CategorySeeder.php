<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // disable foreign key check for this connection before running seeders
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // delete categories table records
        \DB::table('categories')->truncate();

        // define data
        $data = ['Education', 'Self Improvement', 'Technology'];

        // insert data into the database
        foreach ($data as $name) {
            \App\Models\Category::create([
                'name' => $name,
            ]);
        }

        // enable foreign key check for this connection after running seeders
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
