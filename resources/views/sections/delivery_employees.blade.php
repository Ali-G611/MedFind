@extends('dashboard')

@section('content')
<div class="content-section"  style="min-height:100vh">
    <div  style="color: white">
            <h2 style="margin: 2rem">Delivery Employees</h2>
        </div>
        <table class="table table-bordered" style="color: white">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Wage</th>
                    <th>Address</th>
                    <th>Shipping Dep</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($delivery_employees as $delivery_employe)
                    <tr>
                        <td>{{ $delivery_employe->id }}</td>
                        <td>{{ $delivery_employe->name }}</td>
                        <td>{{ $delivery_employe->phone }}</td>
                        <td>{{ $delivery_employe->wage }}</td>
                        <td>{{ $delivery_employe->address }}</td>
                        <td>{{ $delivery_employe->dep_id }}</td>
                        <td style="display: flex;justify-content:space-around">
                            <a href="{{ route('deliver_employee.edit', $delivery_employe->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form method="POST" action="{{ route('deliver_employee.destroy', $delivery_employe->id) }}">
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
            {{ $delivery_employees->links() }}
        </div>
    </div>
@endsection
