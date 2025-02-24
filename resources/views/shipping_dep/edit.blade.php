<x-master>
    <link rel="stylesheet" href="{{ asset('css/add.css') }}">
    <form action="{{ route('shipping_dep.update', $shippingDep->id) }}" method="post" class="add-form">
        @csrf
        @method('PUT')
        <div class="div">
            <label for="governorate">Governorate:</label>
            <input type="text" name="governorate" id="governorate" value="{{ $shippingDep->governorate }}" required>
        </div>
        <div class="div">
            <button type="submit">Update Shipping Department</button>
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