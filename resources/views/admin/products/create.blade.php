@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <div class="d-flex">
            <h1 class="m-0">Create Products</h1>
            <a href="{{route('products.index')}}" class="btn btn-primary m-2 rounded-pill">All Products</a>
        </div>
    </div>
    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="form-group mb-3">
            <input name="name" type="text" class="form-control" id="floatingInputValue" placeholder="Name">
            @error('name')
            <p class="text-danger fs-6">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="gender_id">Product Gender</label>
            <select type="text" name="gender_id" class="form-control" id="gender_id" >
                <option selected disabled value="">Select a gender</option>
                @foreach($genders as $gender)
                    <option value="{{ $gender->id }}">{{$gender->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="d-flex justify-content-around border border-1 my-3 py-3 bg-white">
            <div class="form-group mb-3 d-flex flex-column">
                <label>Brands</label>
                <div class="btn-group-vertical">
                    @foreach($brands as $brand)
                        <label>
                            <input type="radio" name="brand_id" value="{{ $brand->id }}" autocomplete="off"> {{ $brand->name }}
                        </label>
                    @endforeach
                </div>
                @error('brand_id')
                <p class="text-danger fs-6">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-3 d-flex flex-column">
                <label>Colors</label>
                <div class="btn-group-vertical">
                    @foreach($colors as $color)
                        <label>
                            <input type="radio" name="color_id" value="{{ $color->id }}" autocomplete="off"> {{ $color->name }}
                        </label>
                    @endforeach
                </div>
                @error('brand_id')
                <p class="text-danger fs-6">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb3">
                <label>Categorieën</label>
                @foreach($productcategories as $category)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{$category->id}}" id="category{{$category->id}}" name="productcategories[]">
                        <label class="form-check-label" for="category{{$category->id}}">{{$category->name}}</label>
                    </div>
                @endforeach
                @error('categories')
                <p class="text-danger fs-6">{{$message}}</p>
                @enderror
            </div>
        </div>

        <div class="form-group mb-3">
            <textarea name="body" class="form-control" placeholder="Product description" id="floatingTextarea2" style="height: 100px"></textarea>
            @error('body')
            <p class="text-danger fs-6">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group mb-3">
            <input type="number" step="0.01" name="price" class="form-control" placeholder="Put the price in:" id="price"></input>
            @error('price')
            <p class="text-danger fs-6">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group mb-3">
            <input type="number" name="stock" class="form-control" placeholder="Put the Stock in:" id="stock"></input>
            @error('stock')
            <p class="text-danger fs-6">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <input type="file" name="photo_id" id="ChooseFile">
        </div>
        <button type="submit" class="ml-auto btn btn-dark d-flex justify-content-end me-3">ADD PRODUCTS</button>
    </form>
@endsection


