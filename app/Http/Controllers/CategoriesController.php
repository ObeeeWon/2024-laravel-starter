<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{
    public function index(){

        //get all categories from database
        $categories = \App\Models\Categories::all()->sortBy('category');
        // dd($categories);

        return view('categories.index')->with('categories', $categories);
    }

    public function create(){  
        return view('categories.create');
    }

    public function store(Request $request){  
        //check form submission for errors
        //insert into database or show error
        // dd($request);
        $rules = [
            'category' => 'required|max:50|unique:categories,category'
        ];
        $validator = $this->validate($request, $rules);

        $category = new \App\Models\Categories;
        $category->category = $request->category;
        $category->save();

        //Flash a success message
        Session::flash('success', 'A new category has been created');

        //redirect to index
        return redirect()->route('categories.index');
    }
    
    public function show(string $id){   }

    public function edit(string $id){

        //retrieve the category corresponding to the passed key value
        $category = \App\Models\Categories::find($id);
        if (!$category) dd("no category found");

        return view('categories.edit')->with('category', $category);
    }

    public function update(Request $request, string $id){ 
        // dd($request);
        $rules = [
            'category' => 'required|max:50|unique:categories,category,'.$id
        ];
        $validator = $this->validate($request, $rules);

        $category = \App\Models\Categories::find($id);
        if (!$category) dd("no category found");

        $category->category = $request->category;
        $category->save();

        //Flash a success message
        Session::flash('success', 'The category has been updated');

        //redirect to index
        return redirect()->route('categories.index');

    }

    public function destroy(string $id){

        // dd('delete');
        $category = \App\Models\Categories::find($id);
        if (!$category) {
            // dd("no category found");
            Session::flash('error','No category found');
        } else {
            $category->delete();
            Session::flash('success','category deleted');
        }

        return redirect()->route('categories.index');
    }

    public function confirmDelete(string $id){    }

}
