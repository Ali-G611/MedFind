@extends('dashboard')

@section('content')
<div class="content-section"  style="min-height:100vh">
    <div style="color: white">
            <h2 style="margin: 2rem">Customers</h2>

        </div>
        <table class="table table-bordered" style="color: white">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Balance</th>
                    <th>Phone</th>
                    <th>Birth</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->first_name }}</td>
                        <td>{{ $customer->last_name }}</td>
                        <td>{{ $customer->balance }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->birth }}</td>
                        <td style="display: flex;justify-content:space-around">
                            <a href="{{ route('user.show', $customer->user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center" style="margin: 2rem">
            {{ $customers->links() }}
        </div>
    </div>
@endsection
