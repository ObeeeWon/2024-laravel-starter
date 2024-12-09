@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">{{-- draw a beautiful box --}}
                    <div class="card-header">Create a item</div>
                    <div class="card-body">

                        <form method="POST" action="/items">{{-- form-control gives round corners --}}
                        {{-- generate a token --}}
                            @csrf 
                            <label for="category_id">category_id</label>
                            <input type="text" class="form-control" name="category_id" title="category_id" />

                            <label for="title">title</label>
                            <input type="text" class="form-control" name="title" title="title" />

                            <label for="description">description</label>
                            <input type="text" class="form-control" name="description" title="description" />

                            <label for="price">price</label>
                            <input type="text" class="form-control" name="price" title="price" />

                            <label for="quantity">quantity</label>
                            <input type="text" class="form-control" name="quantity" title="quantity" />

                            <label for="sku">sku</label>
                            <input type="text" class="form-control" name="sku" title="sku" />

                            <label for="picture">picture</label>
                            <input type="text" class="form-control" name="picture" title="picture" />

                            <input type="submit" value="Add item"
                                   class="btn btn-primary btn-lg btn-block" style="margin-top:20px" />
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