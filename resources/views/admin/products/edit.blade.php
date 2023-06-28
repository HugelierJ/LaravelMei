@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <div class="d-flex">
            <h1 class="m-0">Create Products</h1>
            <a href="{{route('products.index')}}" class="btn btn-primary m-2 rounded-pill">All Products</a>
        </div>
    </div>
    <div class="row">
        <form class="col-8" action="{{action('App\Http\Controllers\ProductsController@update',$product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group mb-3">
                <label for="name">Product name</label>
                <input name="name" type="text" class="form-control" id="floatingInputValue" placeholder="Name" value="{{ $product->name }}">
                @error('name')
                <p class="text-danger fs-6">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="gender_id">Product Gender</label>
                <select type="text" name="gender_id" class="form-control" id="gender_id" >
                    <option selected value="{{$product->gender->id}}">{{ $product->gender->name }}</option>
                    @foreach($genders as $gender)
                        @if($gender->id != $product->gender->id)
                            <option value="{{ $gender->id }}">{{$gender->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="d-flex justify-content-around border border-1 my-3 py-3 bg-white">
                <div class="form-group mb-3 d-flex flex-column">
                    <label>Brands</label>
                    <div class="btn-group-vertical">
                        @foreach($brands as $brand)
                            <label>
                                <input type="radio" name="brand_id" value="{{ $brand->id }}" autocomplete="off"
                                    {{ $product->brand->id == $brand->id ? "checked" : "" }}> {{ $brand->name }}
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
                                <input type="radio" name="color_id" value="{{ $color->id }}" autocomplete="off" {{ $product->color->id == $color->id ? "checked" : "" }}> {{ $color->name }}
                            </label>
                        @endforeach
                    </div>
                    @error('brand_id')
                    <p class="text-danger fs-6">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group mb3">
                    <label>Categorieën</label>
                    @foreach($productcategories as $productcategory)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{$productcategory->id}}" id="category{{$productcategory->id}}" name="productcategories[]" @if($product->productcategories->contains($productcategory->id))
                                checked
                                @endif>
                            <label class="form-check-label" for="category{{$productcategory->id}}">{{$productcategory->name}}</label>
                        </div>
                    @endforeach
                    @error('categories')
                    <p class="text-danger fs-6">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="form-group mb-3">
                <label for="body">Product description</label>
                <textarea name="body" class="form-control" placeholder="Product description" id="floatingTextarea2" style="height: 100px">{{ $product->body }}</textarea>
                @error('body')
                <p class="text-danger fs-6">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="price">Product price</label>
                <input type="number" step="0.01" name="price" class="form-control" value="{{ $product->price }}" placeholder="Put the price in:" id="price"></input>
                @error('price')
                <p class="text-danger fs-6">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="stock">Stock quantity</label>
                <input type="number" name="stock" class="form-control" value="{{ $product->stock }}" placeholder="Put the Stock in:" id="stock"></input>
                @error('stock')
                <p class="text-danger fs-6">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="photo_id">Photo</label>
                <input class="form-control" type="file" name="photo_id" id="photo_id">
            </div>
            <button type="submit" class="ml-auto btn btn-dark d-flex justify-content-end me-3">UPDATE PRODUCT</button>
        </form>
        <div class="col-4">
            <img class="img-fluid img-thumbnail"
                 src="{{$product->photo ? asset($product->photo->file) : 'http://via.placeholder.com/400'}}" alt="{{$product->name}}">
        </div>
    </div>
@endsection


