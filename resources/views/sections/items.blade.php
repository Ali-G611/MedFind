@extends('dashboard')

@section('content')
<div class="content-section"  style="min-height:100vh">
    <div  style="color: white">
            <h2 style="margin: 2rem">Items</h2>
        </div>
        <table class="table table-bordered" style="color: white">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Expire Date</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->expire_date }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->on_stock_quantity }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td style="display: flex;justify-content:space-around">
                            <a href="{{ route('items.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form method="POST" action="{{ route('items.destroy', $item->id) }}">
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
            {{ $items->links() }}
        </div>
    </div>
@endsection
