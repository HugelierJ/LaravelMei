@extends('layouts.admin')
@section('title')
    Edit User
@endsection
@section('content')

    <div class="container-fluid">
        <h1>Edit User</h1>
        <hr>
        <div class="row shadow-lg p-3 mb-5 bg-body-tertiary rounded">
            <div class="col-12 col-lg-6 ">
                @include('includes.form_error')
                <form action="{{ route("users.update", $user->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method("PATCH")
                    <div class="d-flex justify-content-evenly">
                        <div class="form-group flex-fill">
                            <label for="first_name">First Name</label>
                            <input class="form-control" type="text" name="first_name" id="first_name" value="{{ $user->first_name }}">
                        </div>
                        <div class="form-group flex-fill ml-4">
                            <label for="last_name">Last Name</label>
                            <input class="form-control" type="text" name="last_name" id="last_name" value="{{ $user->last_name }}">
                        </div>
                    </div>
                    <div class="d-flex justify-content-evenly">
                        <div class="form-group flex-fill">
                            <label for="username">Username</label>
                            <input class="form-control" type="text" name="username" id="username" value="{{ $user->username }}">
                        </div>
                        <div class="form-group flex-fill ml-4">
                            <label for="email">Email</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="d-flex justify-content-evenly">
                        <div class="form-group flex-fill">
                            <label for="phone_number">Phone Number</label>
                            <input class="form-control" type="tel" name="phone_number" id="phone_number" @if($user->phone_number)value="{{ $user->phone_number }}"@endif>
                        </div>
                        <div class="form-group flex-fill ml-4">
                            <label for="gender_id">Gender</label>
                            <select class="form-control" type="text" name="gender_id" id="gender_id">
                                <option value="" selected disabled>Choose your gender</option>
                                @foreach($genders as $gender)
                                    <option @if($gender->id == $user->gender_id) selected @endif value="{{ $gender->id }}">{{ $gender->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-evenly">
                        <div class="form-group flex-fill">
                            <label for="password">Password</label>
                            <input class="form-control" type="password" name="password" id="password" placeholder="Fill in your password...">
                        </div>
                        <div class="form-group flex-fill ml-4">
                            <label for="is_active">Status</label>
                            <select class="form-control" type="text" name="is_active" id="is_active">
                                <option selected value="1">Active</option>
                                <option value="0">Not-Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group flex-fill">
                        <label for="address">Address</label>
                        <input class="form-control" type="text" name="address" id="address" value="{{ $user->address->street }}">
                    </div>
                    <div class="form-group flex-fill">
                        <label for="roles">Roles</label>
                        <select multiple class="form-control" type="text" name="roles[]" id="roles">
                            @foreach($roles as $role)
                                <option @if($user->roles->contains('id', $role->id)) selected @endif value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="photo_id">Photo</label>
                        <input class="form-control" type="file" name="photo_id" id="photo_id">
                    </div>
                    <button type="submit" class="btn btn-primary">Update User</button>
                </form>
        </div>
            <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center">
                <img class="img-fluid img-thumbnail" src="{{$user->photo ? asset($user->photo->file) : 'http://via.placeholder.com/600'}}" alt="{{$user->name}}">
            </div>
    </div>
@endsection
