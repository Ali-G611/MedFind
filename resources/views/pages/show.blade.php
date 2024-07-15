<link rel="stylesheet" href="{{asset('css/show.css')}}">
@extends('layouts.master')
@section('body')

<div class="myproduct">
    <img src="myproduct-image.jpg" alt="myproduct Image">
    <div class="myproductdetail">
    <h2>Item Name</h2>
    <p>Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    <p>Price: $19.99</p>
    <button>Add to Cart</button>
    </div>
</div>

@endsection