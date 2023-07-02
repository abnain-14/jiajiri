<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;


class AdminCategoryController extends Controller
{

    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('admin.editcategory')->with('category', $category);
    }


    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        $category->name_of_expertise = $request->input('name_of_expertise');
        $category->years_of_experience = $request->input('years_of_experience');
        $category->category = $request->input('category');
        $category->save();
        return redirect('/manage_freelancers/'.$category->user_id)->with('success', 'Category Updated!');
    }


    public function destroy(string $id)
    {
        Category::destroy($id);
        return redirect()->back()->with('success', 'Category Deleted!');
    }
}
