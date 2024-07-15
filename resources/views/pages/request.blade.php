@extends('layouts.master')
@section('body')
<main>
    @if ($items == null)
        <h1>Empty</h1>
    @endif
    @foreach ($items as $item )
        <div class="gallery" style="display: block">
            <div class="content">
                <img src="{{asset('/storage/images/items/'.$item->photo)}}">
                <h3>{{$item->item_name}}</h3>
                <p>{{$item->details}}</p>
                <h6>{{$item->price}}$</h6>
                <h6>@if ($item->prescription_requirment == 1)
                    Prescription Needed
                    @else
                    @endif
                </h6>
                <div class="button">
                <form action="{{route('items.destroy', ['item' => $item->id])}}" method="POST">
                @csrf
                @method('delete')
                <button class="button" type="submit">Delete</button>
                </form>
                <a class="button" href="{{route('items.edit',['item' => $item->id])}}">Update</a>
                <a class="button" href="{{route('items.show',['item' => $item->id])}}">Show</a>
                </div>
            </div>
        </div>
    @endforeach
    {!! $items->links() !!}
</main>
@endsection