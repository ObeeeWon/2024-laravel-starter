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
                                <label for="item">Item</label>   {{-- form-control gives round corners --}}
                                <input type="text" class="form-control" name="item" title="item" 
                                       value="{{ old('item', $item->item) }}"/>    
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