@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">{{-- draw a beautiful box --}}
                    <div class="card-header">Edit Item</div>
                    <div class="card-body">
                        <form method="POST" action="/items/{{ $item->id }}">

                            @csrf               {{-- generate a token --}}

                            <input type="hidden" name="_method" value="PUT"/>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="category_id">category_id</label>   {{-- form-control gives round corners --}}
                                <input type="text" class="form-control" name="category_id" title="category_id" 
                                       value="{{ old('category_id', $item->category_id) }}"/>    
                            </div>
                            <div class="col-md-12">
                                <label for="title">title</label>   {{-- form-control gives round corners --}}
                                <input type="text" class="form-control" name="title" title="title" 
                                       value="{{ old('title', $item->title) }}"/>    
                            </div>
                            <div class="col-md-12">
                                <label for="description">description</label>   {{-- form-control gives round corners --}}
                                <input type="text" class="form-control" name="description" title="description" 
                                       value="{{ old('item', $item->description) }}"/>    
                            </div>
                            <div class="col-md-12">
                                <label for="price">price</label>   {{-- form-control gives round corners --}}
                                <input type="text" class="form-control" name="price" title="price" 
                                       value="{{ old('item', $item->price) }}"/>    
                            </div>
                            <div class="col-md-12">
                                <label for="quantity">quantity</label>   {{-- form-control gives round corners --}}
                                <input type="text" class="form-control" name="quantity" title="quantity" 
                                       value="{{ old('item', $item->quantity) }}"/>    
                            </div>
                            <div class="col-md-12">
                                <label for="sku">sku</label>   {{-- form-control gives round corners --}}
                                <input type="text" class="form-control" name="sku" title="sku" 
                                       value="{{ old('item', $item->sku) }}"/>    
                            </div>
                            <div class="col-md-12">
                                <label for="sku">picture</label>   {{-- form-control gives round corners --}}
                                <input type="text" class="form-control" name="picture" title="picture" 
                                       value="{{ old('item', $item->picture) }}"/>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="/items" class="btn btn-lg btn-danger btn-block" style="margin-top:20px">Cancel</a>
                            </div>
                            <div class="col-md-6">
                                <input type="submit" value="Save Item"
                                class="btn btn-primary btn-lg btn-block" style="margin-top:20px" />
                            </div>
                        </div>
                        </form>

                    <div>
                </div>
            </div><!-- .col-md-8 -->
        </div>
    </div>
@endsection

@section('styles'){{-- just in case need to use--}}
@endsection

@section('scripts'){{-- put js here --}}
@endsection         {{-- triger code to generate script --}}