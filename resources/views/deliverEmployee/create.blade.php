<x-master>
    <link rel="stylesheet" href="{{ asset('css/add.css') }}">
    <form action="{{ route('deliverEmployee.store') }}" method="post" class="add-form" enctype="multipart/form-data">
        @csrf
        <div class="div">
            <label for="name">Deliver Employee Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
        </div class="div">
        <div class="div">
            <label for="phone">Deliver Employee Phone:</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone') }}">
        </div class="div">
        <div class="div">
            <label for="wage">Deliver Employee Wage:</label>
            <input type="number" name="wage" id="wage" value="{{ old('wage') }}">
        </div class="div">
        <div class="div">
            <label for="address">Deliver Employee Address:</label>
            <input type="text" name="address" id="address" value="{{ old('address') }}">
        </div class="div">
        <div class="div">
            <button type="submit">Submit</button>
        </div class="div">
    </form>

    @if ($messge = Session::get('success'))
        <div style="padding: 20%;backgroud-color:green;">
            {{ $messge }}
        </div>
    @endif

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $deliverEmployee)
                    <li class="alert alert-danger">{{ $deliverEmployee }}</li>
                @endforeach

            </ul>
        </div>
    @endif

</x-master>
