<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(){
        return view('categories.create');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'string',
        ]);
        Category::create($request->all());
        return back();
    }
    public function edit(Category $category){
        return view('categories.edit',compact('category'));
    }

    public function update(Request $request,Category $category){
        $request->validate([
            'name'=>'string',
        ]);
        $category->update([
            'name' => $request->get('name')
        ]);
        return back();
    }
    public function destroy(Category $category){
        $category->delete();
        return back();
    }
}
