@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <div class="d-flex w-100 justify-content-between">
            <h1 class="m-0">Edit | <strong>{{$productcategory->name}}</strong></h1>
            <a href="{{route('productcategories.index')}}" class="btn btn-primary m-2 rounded-pill">All Categories</a>
        </div>
    </div>
    @if (session('alert'))
        <x-alert :type="session('alert')['type']" :message="session('alert')['message']">
            <x-slot name="title">Product Categories -</x-slot>
        </x-alert>
    @endif
    <div class="row my-2">
        <div class="col-12">
            <form action="{{route('productcategories.update', $productcategory->id)}}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group mb-3">
                    <input name="name" type="text" class="form-control" id="floatingInputValue" placeholder="Title"
                           value="{{$productcategory->name}}">
                    @error('name')
                    <p class="text-danger fs-6">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <textarea name="description" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                              style="height: 100px">{{($productcategory->description)}}
                    </textarea>
                    @error('description')
                    <p class="text-danger fs-6">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <select type="text" name="gender_id" class="form-control" id="gender_id" >
                        <option selected value="{{$productcategory->gender->id}}">{{ $productcategory->gender->name }}</option>
                        @foreach($genders as $gender)
                            @if($gender->id != $productcategory->gender->id)
                                <option value="{{ $gender->id }}">{{$gender->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="ml-auto btn btn-dark me-3">UPDATE</button>
                </div>

            </form>
        </div>
    </div>
@endsection


