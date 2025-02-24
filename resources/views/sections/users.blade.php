@extends('dashboard')

@section('content')
<div class="content-section"  style="min-height:100vh">
    <div  style="color: white">
            <h2 style="margin: 2rem">Users</h2>
        </div>
        <table class="table table-bordered" style="color: white">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Verified</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->email_verified_at ? 'Yes' : 'No' }}</td>
                        <td style="display: flex;justify-content:space-around">
                            <a href="{{ route('user.show', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form method="POST" action="{{ route('user.destroy', $user->id) }}">
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
            {{ $users->links() }}
        </div>
    </div>
@endsection
