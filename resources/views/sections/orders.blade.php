@extends('dashboard')

@section('content')
    <div class="content-section"  style="min-height:100vh">
        <div  style="color: white">
            <h2 style="margin: 2rem">Orders</h2>
        </div>
        <table class="table table-bordered" style="color: white">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Order Date</th>
                    <th>Deliver Date</th>
                    <th>Total Cost</th>
                    <th>Status</th>
                    <th>Customer</th>
                    <th>Shipping Dep</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->order_date }}</td>
                        <td>{{ $order->deliver_date }}</td>
                        <td>{{ $order->total_cost }}</td>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->customer->first_name  }}</td>
                        <td>{{ $order->shipping_dep->governorate  }}</td>
                        <td style="display: flex;justify-content:space-around">
                            <a href="{{ route('order.edit', $order->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form method="POST" action="{{ route('order.destroy', $order->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center" style="margin: 2rem">
            {{ $orders->links() }}
        </div>
    </div>
@endsection
