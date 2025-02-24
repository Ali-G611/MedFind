@extends('dashboard')

@section('content')
    <div class="content-section"  style="min-height:100vh">
        <div  style="color: white">
            <h2 style="margin: 2rem">Shipping Dep</h2>
        </div>
        <table class="table table-bordered" style="color: white">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Governorate</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($shipping_deps as $shipping_dep)
                    <tr>
                        <td>{{ $shipping_dep->id }}</td>
                        <td>{{ $shipping_dep->governorate  }}</td>
                        <td style="display: flex;justify-content:space-around">
                            <a href="{{ route('shipping_dep.edit', $shipping_dep->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form method="POST" action="{{ route('shipping_dep.destroy', $shipping_dep->id) }}">
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
            {{ $shipping_deps->links() }}
        </div>
    </div>
@endsection
