@extends('layouts.admin')
@section('title')
    Create User
@endsection
@section('content')
    <h1>Create User</h1>
    <hr>
    @include('includes.form_error')
    <form action="{{ route("users.store") }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method("POST")
        <div class="d-flex justify-content-evenly">
            <div class="form-group flex-fill">
                <label for="first_name">First Name</label>
                <input class="form-control" type="text" name="first_name" id="first_name" placeholder="Fill in your first name...">
            </div>
            <div class="form-group flex-fill ml-4">
                <label for="last_name">Last Name</label>
                <input class="form-control" type="text" name="last_name" id="last_name" placeholder="Fill in your last name...">
            </div>
        </div>
        <div class="d-flex justify-content-evenly">
            <div class="form-group flex-fill">
                <label for="username">Username</label>
                <input class="form-control" type="text" name="username" id="username" placeholder="Fill in your username...">
            </div>
            <div class="form-group flex-fill ml-4">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email" placeholder="Fill in your email...">
            </div>
        </div>
        <div class="d-flex justify-content-evenly">
            <div class="form-group flex-fill">
                <label for="phone_number">Phone Number</label>
                <input class="form-control" type="tel" name="phone_number" id="phone_number" placeholder="Fill in your phone number...">
            </div>
            <div class="form-group flex-fill ml-4">
                <label for="gender">Gender</label>
                <select class="form-control" type="text" name="gender" id="gender">
                    <option value="" selected disabled>Choose your gender</option>
                    @foreach($genders as $gender)
                        <option value="{{ $gender->id }}">{{ $gender->name }}</option>
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
                <select class="form-control" type="password" name="is_active" id="is_active">
                    <option selected value="1">Active</option>
                    <option value="0">Not-Active</option>
                </select>
            </div>
        </div>
        <div class="form-group flex-fill">
            <label for="roles">Roles</label>
            <select multiple class="form-control" type="text" name="roles[]" id="roles">
                <option value="" selected disabled>Choose user roles...</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="photo_id">Photo</label>
            <input class="form-control" type="file" name="photo_id" id="photo_id">
        </div>
        <button type="submit" class="btn btn-primary">Create User</button>
    </form>
@endsection
