<x-master>
    <link rel="stylesheet" href="{{asset('css/Request.css')}}">
    @if ($items->isEmpty())
        <h1 style="margin: auto;color: white;opacity: 50%;">No Items to Show</h1>
    @endif
    <div class="gallery" style="display: flex;flex-wrap: wrap;justify-content:space-around;">
        @foreach ($items as $item)
            <div class="content">
                <img src="{{ asset('/storage/images/items/' . $item->photo) }}">
                <span style="font-size: x-large">{{ $item->name }}</h3>
                    <p>{{ Str::limit($item->details, 35) }}</p>
                    <h6>{{ $item->price }}$</h6>
                    <span style="font-size:large;margin-bottom: 5px">
                        @if ($item->prescription_requirment == 1)
                            Prescription Needed
                        @else
                        @endif
                    </span>
                    <div class="button" style="display: flex">
                        <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="button" type="submit">Delete</button>
                        </form>
                        <a class="button" href="{{ route('items.edit', $item->id) }}">Update</a>
                        <a class="button" href="{{ route('items.show', $item->id) }}">Show</a>
                    </div>
            </div>
        @endforeach
    </div>
    {!! $items->links() !!}
</x-master>
