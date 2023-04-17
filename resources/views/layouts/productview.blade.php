@extends('master_two')

@section('content')
    <div class="p_view">
        <div class="container">
            <p><a href="{{route('mainView')}}">Home</a> / <a href="">Product</a></p>
            <div class="row">
                <div class="col text-center">
                    <img src="{{asset('images/'. $products->image)}}" class="rounded" alt="...">
                </div>
                <div class="col">
                <strong>Product Name:</strong><h1>{{$products->product_name}}</h1>
                    <p><strong>Price:</strong> <span class="mon">Tk ৳ {{$products->sell}}</span></p>
                    <p><strong>Quantity:</strong> {{$products->quantity}}</p>
                    <p><strong>Description:</strong><br> <span class="des">{{$products->description}}</span></p>
                </div>
            </div>
        </div>
    </div>
@endsection
