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
                <div class="card-header">All Category</div>

                <div class="card-body">
                    <table class="table table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @if (count($categories) > 0)
                        @foreach ($categories as $key=>$category)
                          <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('category.edit', [$category->id]) }}" class="btn btn-outline-warning">Edit</a>
                                <a href="#" class="btn btn-outline-danger">Delete</a>
                            </td>
                          </tr>
                        @endforeach

                        @else
                        <td colspan="3">Tidak ada kategori yang ditampilkan</td>
                        @endif
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
