<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(){   }

    public function create(){  
        return view('categories.create');
    }

    public function store(Request $request){  
        //check form submission for errors
        //insert into database or show error
        // dd($request);
        $rules = [
            'categories' => 'required|max:5|unique:categories,company'
        ];
    }
    
    public function show(string $id){   }

    public function edit(string $id){   }

    public function update(Request $request, string $id){   }

    public function destroy(string $id){    }

    public function confirmDelete(string $id){    }

}
