<x-master>
    <link rel="stylesheet" href="{{ asset('css/add.css') }}">
    <form action="{{ route('orders.store') }}" method="post" class="add-form">
        @csrf
        <div class="div">
            <label for="order_date">Order Date:</label>
            <input type="date" name="order_date" id="order_date" value="{{ old('order_date', now()->toDateString()) }}" required>
        </div>
        <div class="div">
            <label for="deliver_date">Deliver Date:</label>
            <input type="date" name="deliver_date" id="deliver_date" value="{{ old('deliver_date') }}">
        </div>
        <div class="div">
            <label for="total_cost">Total Cost:</label>
            <input type="number" name="total_cost" id="total_cost" value="{{ old('total_cost') }}" required>
        </div>
        <div class="div">
            <label for="status">Status:</label>
            <select name="status" id="status" required>
                <option value="ordered">Ordered</option>
                <option value="waiting">Waiting</option>
            </select>
        </div>
        <div class="div">
            <label for="customer_id">Customer:</label>
            <select name="customer_id" id="customer_id" required>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="div">
            <label for="shipping_dep_id">Shipping Department:</label>
            <select name="shipping_dep_id" id="shipping_dep_id" required>
                @foreach($shippingDeps as $shippingDep)
                    <option value="{{ $shippingDep->id }}">{{ $shippingDep->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="div">
            <label>Items:</label>
            @foreach($items as $item)
                <div>
                    <input type="checkbox" name="items[]" id="item_{{ $item->id }}" value="{{ $item->id }}">
                    <label for="item_{{ $item->id }}">{{ $item->name }}</label>
                    <input type="number" name="quantities[]" placeholder="Quantity" min="1">
                </div>
            @endforeach
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