<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'Art']);
        Category::create(['name' => 'History']);
        Category::create(['name' => 'Geography']);
        Category::create(['name' => 'Science']);
        Category::create(['name' => 'Sports']);
    
    }
}
