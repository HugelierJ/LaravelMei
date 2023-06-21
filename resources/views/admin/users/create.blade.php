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
                <input class="form-control" type="text" name="firstname" id="first_name" placeholder="Fill in your first name...">
            </div>
            <div class="form-group flex-fill ml-4">
                <label for="last_name">Last Name</label>
                <input class="form-control" type="text" name="lastname" id="last_name" placeholder="Fill in your last name...">
            </div>
        </div>
        <div class="d-flex justify-content-evenly">
            <div class="form-group flex-fill">
                <label for="user_name">Username</label>
                <input class="form-control" type="text" name="username" id="user_name" placeholder="Fill in your username...">
            </div>
            <div class="form-group flex-fill ml-4">
                <label for="e-mail">Email</label>
                <input class="form-control" type="email" name="email" id="e-mail" placeholder="Fill in your email...">
            </div>
        </div>
        <div class="d-flex justify-content-evenly">
            <div class="form-group flex-fill">
                <label for="phone_number">Phone Number</label>
                <input class="form-control" type="tel" name="phonenumber" id="phone_number" placeholder="Fill in your phone number...">
            </div>
            <div class="form-group flex-fill ml-4">
                <label for="genders">Gender</label>
                <select class="form-control" type="text" name="gender" id="genders">
                    <option value="" selected disabled>Choose your gender</option>
                    @foreach($genders as $gender)
                        <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="d-flex justify-content-evenly">
            <div class="form-group flex-fill">
                <label for="passwords">Password</label>
                <input class="form-control" type="password" name="password" id="passwords" placeholder="Fill in your password...">
            </div>
            <div class="form-group flex-fill ml-4">
                <label for="is_active">Status</label>
                <select class="form-control" type="password" name="isactive" id="is_active">
                    <option selected value="1">Active</option>
                    <option value="0">Not-Active</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="photo">Photo</label>
            <input class="form-control" type="file" name="photofile" id="photo">
        </div>
        <button type="submit" class="btn btn-primary">Create User</button>
    </form>
{{--    {!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\AdminUsersController@store','files'=>true]) !!}--}}
{{--    <div class="form-group">--}}
{{--        {!! Form::label('name','Name:') !!}--}}
{{--        {!! Form::text('name',null,['class'=>'form-control','placeholder' => 'Name required...']) !!}--}}
{{--    </div>--}}
{{--    <div class="form-group">--}}
{{--        {!! Form::label('email','E-mail:') !!}--}}
{{--        {!! Form::text('email',null,['class'=>'form-control','placeholder' => 'E-mail required...']) !!}--}}
{{--    </div>--}}
{{--    <div class="form-group">--}}
{{--        {!! Form::label('Select roles: (hou de ctrl toets ingedrukt om meerdere te selecteren') !!}--}}
{{--        {!! Form::select('roles[]',$roles,null,['class'=>'form-control','placeholder' => 'Pick a role...','multiple'=>'multiple']) !!}--}}
{{--    </div>--}}
{{--    <div class="form-group">--}}
{{--        {!! Form::label('is_active', 'Status:') !!}--}}
{{--        {!! Form::select('is_active',array(1=>'Active',0=>'Not Active'),0,['class'=>'form-control']) !!}--}}
{{--    </div>--}}
{{--    <div class="form-group">--}}
{{--        {!! Form::label('password','Password:') !!}--}}
{{--        {!! Form::password('password',['class'=>'form-control','placeholder' => 'Password required...']) !!}--}}
{{--    </div>--}}
{{--    <div class="form-group">--}}
{{--        {!! Form::label('photo_id','Photo_id:') !!}--}}
{{--        {!! Form::file('photo_id',null,['class'=>'form-control']) !!}--}}
{{--    </div>--}}
{{--    <div class="form-group">--}}
{{--        {!! Form::submit('Create User',['class'=>'btn btn-primary']) !!}--}}
{{--    </div>--}}

{{--    {!! Form::close() !!}--}}

@endsection
