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

            <form action="{{ route('food.update', [$food->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}

            <div class="card">
                <div class="card-header">Update food</div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{ $food->name }}" class="form-control @error('name') is-invalid @enderror">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div><br>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" cols="10" rows="4" class="form-control @error('description') is-invalid @enderror">{{ $food->description }}</textarea>
                        
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div><br>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" value="{{ $food->price }}" class="form-control @error('price') is-invalid @enderror">

                        @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div><br>

                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" class="form-control @error('category') is-invalid @enderror">
                            <option value="" selected hidden>[ Choose category ]</option>
                            @if (App\Models\Category::count() > 0)
                                @foreach (App\Models\Category::all() as $category)
                                <option value="{{ $category->id }}" @if ($category->id == $food->category_id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                                    
                            @else
                                <option value="" disabled>[-- empty --]</option>
                            @endif
                        </select>

                        @error('category')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div><br>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control">

                    </div><br>

                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary">Submit</button>
                    </div>

                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
