<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Product;
use App\Models\Unit;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Category::create([
            'category_name' => 'Semen',
            'user_id' => 1
        ]);
        Category::create([
            'category_name' => 'Cat',
            'user_id' => 2
        ]);
        Category::create([
            'category_name' => 'Genteng',
            'user_id' => 1
        ]);

        Unit::create([
            'unit_name' => 'Kg',
            'user_id' => 1
        ]);

        Unit::create([
            'unit_name' => 'Bks',
            'user_id' => 3
        ]);

        Product::create([
            'product_name' => 'Semen Holcim',
            'category_id' => 1,
            'img_path' => 'Abs',
            'user_id' => 1
        ]);
    }
}
