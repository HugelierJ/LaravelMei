@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <div class="d-flex">
            <div class="d-flex">
                <p class="rounded bg-danger m-0 d-flex align-self-center p-2 text-white">{{$addresses->total()}} </p>
                <h1 class="m-0"> | Addresses | </h1>
            </div>
        </div>
        <div class="d-flex">
            <a href="{{route('addresses.index')}}" class="btn btn-primary m-2 rounded-pill">All Addresses</a>
            {{--            <a href="{{ route('address.create') }}" class="btn btn-primary m-2 rounded-pill">Add Address</a>--}}
        </div>

    </div>
    @if (session('alert'))
        <x-alert :type="session('alert')['type']" :message="session('alert')['message']">
            <x-slot name="title">Address</x-slot>
        </x-alert>
    @endif

    <table class="table table-striped shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <thead>
        <tr>
            <th>Id</th>
            <th>User</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Zip Code</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
        @foreach($addresses as $address)
            <tr>
                <td>{{$address->id}}</td>
                <td>
                    {{ $address->user->first_name . " " . $address->user->last_name }}
                </td>
                <td>{{$address->street}}</td>
                <td>{{$address->city}}</td>
                <td>{{$address->country}}</td>
                <td>{{$address->zip_code}}</td>
                <td>{{$address->created_at ? $address->created_at->diffForHumans() : ''}}</td>
                <td>{{$address->updated_at ? $address->updated_at->diffForHumans() : ''}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $addresses->links() }}
@endsection


