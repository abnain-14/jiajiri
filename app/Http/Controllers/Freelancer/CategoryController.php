<?php

namespace App\Http\Controllers\Freelancer;

use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Catch_;

class CategoryController extends Controller
{

    public function index()
    {
        $category = Category::all();
        return view('freelancer.category.index')->with('category', $category);
    }


    public function create()
    {
        return view('freelancer.category.create');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        Category::create($input);
        return redirect('/freelancer/category')->with('flash_message', 'Category Added!');
    }


    public function show(string $id)
    {
        $category = Category::find($id);
        return view('freelancer.category.show')->with('category', $category);
    }


    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('freelancer.category.edit')->with('category', $category);
    }


    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        $input = $request->all();
        $category->update($input);
        return redirect('/freelancer/category')->with('flash_message', 'Category Updated!');
    }


    public function destroy(string $id)
    {
        Category::destroy($id);
        return redirect('/freelancer/category')->with('flash_message', 'category deleted!');
    }
}
