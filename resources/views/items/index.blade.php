@extends('layouts.public')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">{{-- draw a beautiful box --}}
                <div class="card-header">Items</div>
                <div class="card-body">
                    @php
                        // dd($items)
                    @endphp
                    <h1 class="text-end">
                        <a href="/items/create" class="btn btn-info" role="button">
                        + Add New
                        </a>
                    </h1>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>category_id</th>
                                <th>title</th>
                                <th>description</th>
                                <th>price</th>
                                <th>quantity</th>
                                <th>sku</th>
                                <th>picture</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->category_id }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->sku }}</td>
                                <td>{{ $item->picture }}</td>
                                {{-- 
                                    <td>
                                     @foreach($item->items as $items)
                                        {{ $items->name }},
                                    </td>
                                 --}}
                                <td>
                                    <div style="float:left;">
                                        <a href="{{ route('items.edit', $item->id) }}"
                                                class="btn btn-success btn-sm">Edit</a>
                                    </div>
                                    <div style="float:left; margin-left:5px;">{{-- margin makes buttonns not overlap --}}
                                        <form method="post" action="/items/{{ $item->id }}"
                                              onsubmit="return confirm('Delete Item? Are you sure?')">

                                                @csrf {{-- 419 error if not set--}}
                                                
                                                <input type="hidden" name="_method" value="DELETE"/>
                                                <input type="submit" name="submit" value="Delete"
                                                    class="btn btn-sm btn-danger btn-block"/>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                <div>
            </div>
        </div><!-- .col-md-8 -->
    </div>
</div>
@endsection

@section('scripts')
@endsection

@section('styles')
@endsection