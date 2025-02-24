<x-master>
    <link rel="stylesheet" href="{{ asset('css/add.css') }}">
    <form action="{{ route('category.store') }}" method="post" class="add-form" enctype="multipart/form-data">
        @csrf
        <div class="div">
            <label for="name">Category Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
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
                @foreach ($errors->all() as $category)
                    <li class="alert alert-danger">{{ $category }}</li>
                @endforeach

            </ul>
        </div>
    @endif

</x-master>
