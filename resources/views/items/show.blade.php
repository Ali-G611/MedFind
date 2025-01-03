<x-master>

    <div class="content"
        style="background: var(--add-color);margin: auto;display: flex;flex-direction: row;margin-top: 25px;margin-bottom: 25px;border-radius: 4%">
        <div>
            <img style="padding: 25px" src="{{ asset('/storage/images/items/' . $item->photo) }}">
        </div>
        <div style="padding: 25px;display: flex;flex-direction: column;justify-content: space-evenly;height:auto;color: wheat">
            <span style="font-size: xx-large">{{ $item->name }}</span>
                <p style="font-size: x-large">{{$item->details}}</p>
                <h6 style="font-size: x-large">{{ $item->price }}$</h6>
                <span style="font-size:x-large;margin-bottom: 5px">
                    @if ($item->prescription_requirment == 1)
                        Prescription Needed
                    @else
                    @endif
                </span>
                <span style="font-size:large;margin-bottom: 5px">Stock: {{$item->on_stock_quantity}}</span>
                @can(['delete','update'],$item)
                <div class="button" style="display: flex;justify-content: space-between;width: 50%">
                    <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <a onclick="this.parentNode.submit();" style="text-decoration: none;background-color: rgb(33, 33, 141);color: bisque;font-size: large;padding: 5px;border-radius: 20%" class="a" type="submit">Delete</a>
                    </form>
                    <a style="text-decoration: none;background-color: rgb(33, 33, 141);color: bisque;font-size: large;padding: 5px;border-radius: 20%" class="button"
                        href="{{ route('items.edit', $item->id) }}">Update</a>
                </div>
                @endcan
                <a style="width: fit-content;text-decoration: none;background-color: rgb(33, 33, 141);color: bisque;font-size: large;padding: 5px;border-radius: 20%" class="button"
                        href="{{ url()->previous() }}">Back</a>
        </div>
    </div>

</x-master>
