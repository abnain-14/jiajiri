<?php

namespace App\Http\Controllers\Freelancer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{

    public function index()
    {
        $category = Category::where('user_id', Auth::user()->id)->get();
        return view('freelancer.category.index')->with('category', $category);
    }


    public function create()
    {
        return view('freelancer.category.create');
    }


    public function store(Request $request)
    {
        $category = new Category;
        $category->user_id = Auth::user()->id;
        $category->name_of_expertise = $request->input('name_of_expertise');
        $category->years_of_experience = $request->input('years_of_experience');
        $category->category = $request->input('category');
        $category->work_experience = $request->input('work_experience');
        $category->save();
        return redirect('/freelancer/category')->with('success', 'Category Added');
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
        $category->user_id = Auth::user()->id;
        $category->name_of_expertise = $request->input('name_of_expertise');
        $category->years_of_experience = $request->input('years_of_experience');
        $category->category = $request->input('category');
        $category->work_experience = $request->input('work_experience');
        $category->save();
        return redirect('/freelancer/category')->with('success', 'Category Updated!');
    }


    public function destroy(string $id)
    {
        Category::destroy($id);
        return redirect('/freelancer/category')->with('success', 'Category deleted!');
    }
}
