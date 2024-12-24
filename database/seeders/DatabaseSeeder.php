<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        //User::factory()->create([
          //  'name' => 'Test User',
           // 'email' => 'test@example.com',
        //]);
        $categorys = ['Medicine','Support','Pills','Other'];
        foreach($categorys as $category){
            Category::create(['name'=>$category]);
        }
        $existingCate = Category::all();
        Item::factory(5)->create([
            'category_id' => $existingCate->random()->id,
        ]);
    }
}
