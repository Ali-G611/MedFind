@extends('dashboard')

@section('content')
    <div class="content-section"  style="min-height:100vh">
        <div  style="color: white">
            <h2 style="margin: 2rem">Suppliers</h2>
        </div>
        <table class="table table-bordered" style="color: white">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suppliers as $supplier)
                    <tr>
                        <td>{{ $supplier->id }}</td>
                        <td>{{ $supplier->name  }}</td>
                        <td>{{ $supplier->address  }}</td>
                        <td style="display: flex;justify-content:space-around">
                            <a href="{{ route('supplier.edit', $supplier->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form method="POST" action="{{ route('supplier.destroy', $supplier->id) }}">
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
            {{ $suppliers->links() }}
        </div>
    </div>
@endsection
