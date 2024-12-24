<x-master>

    <form action="{{ route('items.store') }}" method="post" class="add-form" enctype="multipart/form-data">
        @csrf
        <div class="div">
            <label for="name">Item Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
        </div class="div">
        <div class="div">
            <label for="details">Item Description:</label>
            <input type="text" name="details" id="details" value="{{ old('details') }}">
        </div class="div">
        <div class="div">
            <label for="expire_date">Expire Date:</label>
            <input type="date" name="expire_date" id="expire_date" value="{{ old('expire_date') }}">
        </div class="div">
        <div class="div">
            <label for="price">Price:</label>
            <input type="number" name="price" id="price" value="{{ old('price') }}">
        </div class="div">
        <div class="div">
            <label for="prescription_requirment">Prescription Required:</label>
            <input type="checkbox" name="prescription_requirment" id="prescription_requirment" value="1">
        </div class="div">
        <div class="div">
            <label for="photo">Item Photo:</label>
            <input type="file" name="photo" id="photo">
        </div class="div">
        <div class="div">
            <div>
                <label for="category">Category:</label>
                <select name="category_id" id="category">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
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
                @foreach ($errors->all() as $item)
                    <li class="alert alert-danger">{{ $item }}</li>
                @endforeach

            </ul>
        </div>
    @endif

</x-master>
