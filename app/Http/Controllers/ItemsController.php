<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ItemsController extends Controller
{
    public function index(){

        //get all items from database
        $items = \App\Models\Items::all()->sortBy('item');
        // dd($items);

        return view('items.index')->with('items', $items);
    }

    public function create(){  
        return view('items.create');
    }

    public function store(Request $request){  
        //check form submission for errors
        //insert into database or show error
        // dd($request);
        $rules = [
            'item' => 'required|max:50|unique:items,item'
        ];
        $validator = $this->validate($request, $rules);

        $item = new \App\Models\Items;
        $item->category_id = $request->category_id;
        $item->save();

        //Flash a success message
        Session::flash('success', 'A new item has been created');

        //redirect to index
        return redirect()->route('items.index');
    }
    
    public function show(string $id){   }

    public function edit(string $id){

        //retrieve the item corresponding to the passed key value
        $item = \App\Models\Items::find($id);
        if (!$item) dd("no item found");

        return view('items.edit')->with('item', $item);
    }

    public function update(Request $request, string $id){ 
        // dd($request);
        $rules = [
            'item' => 'required|max:50|unique:items,item,'.$id
        ];
        $validator = $this->validate($request, $rules);

        $item = \App\Models\Items::find($id);
        if (!$item) dd("no item found");

        $item->item = $request->item;
        $item->save();

        //Flash a success message
        Session::flash('success', 'The item has been updated');

        //redirect to index
        return redirect()->route('items.index');

    }

    public function destroy(string $id){

        // dd('delete');
        $item = \App\Models\Items::find($id);
        if (!$item) {
            // dd("no item found");
            Session::flash('error','No item found');
        } else {
            $item->delete();
            Session::flash('success','item deleted');
        }

        return redirect()->route('items.index');
    }

    public function confirmDelete(string $id){    }

}
