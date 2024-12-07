@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">{{-- draw a beautiful box --}}
                    <div class="card-header">Create a item</div>
                    <div class="card-body">

                        <form method="POST" action="/items">
                            @csrf {{-- generate a token --}}
                            <label for="item">item</label>{{-- form-control gives round corners --}}
                            <input type="text" class="form-control" name="item" title="item" />
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