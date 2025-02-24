@extends('dashboard')

@section('content')
<div class="content-section"  style="min-height:100vh">
    <div  style="color: white" >
            <h2 style="margin: 2rem">Categories</h2>
        </div>
        <table class="table table-bordered" style="color: white">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td style="display: flex;justify-content:space-around">
                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form method="POST" action="{{ route('category.destroy', $category->id) }}">
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
            {{ $categories->links() }}
        </div>
    </div>
@endsection
