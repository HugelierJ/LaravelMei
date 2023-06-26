@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <div class="d-flex">
            <p class="rounded bg-danger m-0 d-flex align-self-center p-2 text-white">{{$orders->total()}}</p>
            <h1 class="m-0">| Orders</h1>
            <a href="{{route('orders.index')}}" class="btn btn-primary m-2 rounded-pill">All Orders</a>
        </div>
    </div>
    @if (session('alert'))
        <x-alert :type="session('alert')['type']" :message="session('alert')['message']">
            <x-slot name="title">Product Categories</x-slot>
        </x-alert>
    @endif
    <table class="table table-striped shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <thead>
        <tr>
            <th>Id</th>
            <th>Status</th>
            <th>Total Price</th>
            <th>Session Id</th>
            <th>Payment Id</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->status}}</td>
                <td>{{$order->total_price}}</td>
                <td>{{ $order->session_id }}</td>
                <td>{{ $order->payment_id }}</td>
                <td>{{$order->created_at ? $order->created_at->diffForHumans() : ''}}</td>
                <td>{{$order->updated_at ? $order->updated_at->diffForHumans() : ''}}</td>
                <td>
                    <a class="dropdown-item" href="{{route('orders.show', $order->id)}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-pencil" viewBox="0 0 16 16">
                            <path
                                d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                        </svg>
                        show
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $orders->links() }}
@endsection


