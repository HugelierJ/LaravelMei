@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <div class="d-flex">
            <h1 class="m-0">Create Product Category</h1>
            <a href="{{route('productcategories.index')}}" class="btn btn-primary m-2 rounded-pill">All Product Categories</a>
        </div>
    </div>
    <form action="{{route('productcategories.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="form-group mb-3">
            <label for="name">Name</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="category">
            @error('name')
            <p class="text-danger fs-6">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" placeholder="Leave a description here" id="description"
                      style="height: 100px"></textarea>
            @error('description')
            <p class="text-danger fs-6">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="gender_id">Product Gender</label>
            <select type="text" name="gender_id" class="form-control" id="gender_id" >
                <option selected disabled>Choose a gender</option>
                @foreach($genders as $gender)
                        <option value="{{ $gender->id }}">{{$gender->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="ml-auto btn btn-dark d-flex justify-content-end me-3">ADD PRODUCT CATEGORY</button>
    </form>
@endsection


