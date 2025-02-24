<x-master>
    <link rel="stylesheet" href="{{ asset('css/add.css') }}">
    <form action="{{ route('deliver_employee.update',$deliverEmployee->id) }}" method="post" class="add-form" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="div">
            <label for="name">Deliver Employee Name:</label>
            <input type="text" name="name" id="name" value="{{ $deliverEmployee->name }}">
        </div class="div">
        <div class="div">
            <label for="phone">Deliver Employee Phone:</label>
            <input type="text" name="phone" id="phone" value="{{ $deliverEmployee->phone }}">
        </div class="div">
        <div class="div">
            <label for="wage">Deliver Employee Wage:</label>
            <input type="text" name="wage" id="wage" value="{{ $deliverEmployee->wage }}">
        </div class="div">
        <div class="div">
            <label for="address">Deliver Employee Address:</label>
            <input type="text" name="address" id="address" value="{{ $deliverEmployee->address }}">
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
