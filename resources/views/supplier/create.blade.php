<x-master>
    <link rel="stylesheet" href="{{ asset('css/add.css') }}">
    <form action="{{ route('supplier.store') }}" method="post" class="add-form">
        @csrf
        <div class="div">
            <label for="name">Supplier Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        </div>
        <div class="div">
            <label for="address">Supplier Address:</label>
            <input type="text" name="address" id="address" value="{{ old('address') }}" required>
        </div>
        <div class="div">
            <button type="submit">Submit</button>
        </div>
    </form>

    @if ($message = Session::get('success'))
        <div style="padding: 20px; background-color: green; color: white;">
            {{ $message }}
        </div>
    @endif

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="alert alert-danger">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</x-master>