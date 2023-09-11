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

            <form action="{{ route('category.update', [$category->id]) }}" method="post">
                @csrf
                {{ method_field('PUT') }}
                <div class="card">
                <div class="card-header">Update Food Category</div>

                <div class="card-body">
                    <div class="form-group">
                        <label class="control-label" for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $category->name }}">
                    </div> <br>

                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary">Update</button>
                    </div>
                </div>
            </form>

        </div>
        </div>
    </div>
</div>
@endsection
