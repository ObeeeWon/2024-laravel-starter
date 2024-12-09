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
            'category_id' => 'required|max:50',
            'title' => 'required|max:50|unique:items,title',
            'description' => 'required|max:50',
            'price' => 'required|max:50',
            'sku' => 'required|max:50|unique:items,sku',
            'quantity' => 'required|max:10|unique:items,quantity',
            'picture' => 'required|max:50'

        ];
        $validator = $this->validate($request, $rules);

        $item = new \App\Models\Items;
        $item->category_id = $request->category_id;
        $item->title = $request->title;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->quantity = $request->quantity;
        $item->sku = $request->sku;
        $item->picture = $request->picture;
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
            'category_id' => 'required|max:50',
            'title' => 'required|max:50|unique:items,title'.$id,
            'description' => 'required|max:50',
            'price' => 'required|max:50',
            'sku' => 'required|max:50|unique:items,sku',
            'quantity' => 'required|max:10|unique:items,quantity',
            'picture' => 'required|max:50'
        ];
        $validator = $this->validate($request, $rules);

        $item = \App\Models\Items::find($id);
        if (!$item) dd("no item found");

        $item->category_id = $request->category_id;
        $item->title = $request->title;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->sku = $request->sku;
        $item->quantity = $request->quantity;    
        $item->picture = $request->picture;
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
