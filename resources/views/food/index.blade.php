@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if (Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">All Foods</div>

                <div class="card-body">
                    <table class="table table">
                        <thead>
                          <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Category</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @if (count($foods) > 0)
                        @foreach ($foods as $key=>$food)
                          <tr>
                            <td><img src="{{ asset('image') }}/{{ $food->image }}" width="100"></td>
                            <td>{{ $food->name }}</td>
                            <td>{{ $food->description }}</td>
                            <td>{{ $food->price }}</td>
                            <td>{{ $food->category_id }}</td>
                            <td>
                                <a href="{{ route('food.edit', [$food->id]) }}" class="btn btn-warning">Edit</a>
                                <form style="display: inline-block" action="{{ route('food.destroy', [$food->id]) }}" method="post">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-outline-danger">Delete</button>
                                </form>
                            </td>
                          </tr>
                        @endforeach

                        @else
                        <td colspan="6">Tidak ada kategori yang ditampilkan</td>
                        @endif
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
