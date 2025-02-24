<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\DeliverEmployee;
use App\Models\Item;
use App\Models\Supplier;
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
        $existingCate = Category::all()->pluck('id');
        foreach($existingCate as $cate)
        Item::factory()->create([
            'category_id' => $cate,
        ]);
        $supplier = ['UN','Unifarma'];
        foreach($supplier as $supplier){
            Supplier::create(['name'=>$supplier,'address'=>'unknown']);
        }
        DeliverEmployee::factory(10)->create();
    }
}
