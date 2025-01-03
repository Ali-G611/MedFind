<x-master>
    <link rel="stylesheet" href="{{ asset('css/Request.css') }}">
    @if (session('customer'))
        <div style="font-size: larger;width: 40%;margin: auto" class="alert alert-danger">
            {{ session('customer') }}
        </div>
    @endif
    @if ($items->isEmpty())
        <h1 style="margin: auto;color: white;opacity: 50%;">No Items to Show</h1>
    @endif
    <div class="gallery" style="display: flex;flex-wrap: wrap;justify-content:space-around;">
        @foreach ($items as $item)
            <div class="content">
                <img src="{{ asset('/storage/images/items/' . $item->photo) }}">
                <span style="font-size: x-large">{{ $item->name }}</span>
                <p>{{ Str::limit($item->details, 35) }}</p>
                <h6>{{ $item->price }}$</h6>
                <span style="font-size:large;margin-bottom: 5px;display:block">
                    @if ($item->prescription_requirment == 1)
                        Prescription Needed
                    @else
                    @endif
                </span>
                <span style="font-size:large;margin-bottom: 5px">Stock: {{$item->on_stock_quantity}}</span>
                <div class="button" style="display: flex;width: 100%;justify-content: space-evenly">
                    <form action="{{ route('customer.order', $item) }}" method="POST">
                        @csrf
                        @method('POST')
                        <button class="button" type="submit">Order</button>
                    </form>
                    @can(['delete', 'update'], $item)
                        <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="button" type="submit">Delete</button>
                        </form>
                        <a style="text-decoration: none" class="button"
                            href="{{ route('items.edit', $item->id) }}">Update</a>
                    @endcan
                    <a style="text-decoration: none" class="button" href="{{ route('items.show', $item->id) }}">Show</a>
                </div>


            </div>
        @endforeach
    </div>
    {!! $items->links() !!}
</x-master>
