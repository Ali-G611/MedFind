<x-master>
    <link rel="stylesheet" href="{{ asset('css/add.css') }}">
    <form action="{{ route('shipping_dep.store') }}" method="post" class="add-form">
        @csrf
        <div class="div">
            <label for="governorate">Governorate:</label>
            <input type="text" name="governorate" id="governorate" value="{{ old('governorate') }}" required>
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