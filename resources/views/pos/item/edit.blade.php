@extends('master')

@section('content')
    <div class="item-edit">
        <div class="container">
            <a href="{{route('item.view')}}"><- Back</a> / <a href="{{route('item.view')}}">Item Edit</a>
            <div class="row">
                <div class="card">
                    <div class="card-body">
                    <form action="{{route('items.update', $items->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="product_name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" value="{{$items->product_name}}">
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="dp" class="form-label">Buy Price</label>
                            <input type="text" class="form-control" id="dp" name="buy_price" value="{{$items->buy_price}}">
                        </div>
                        <div class="col">
                            <label for="tp" class="form-label">Sell Price</label>
                            <input type="text" class="form-control" id="tp" name="sell_price" value="{{$items->sell_price}}">
                        </div>
                        <div class="col">
                            <label for="discount_price" class="form-label">Discount Price</label>
                            <input type="text" class="form-control" id="discount_price" name="discount_price" value="{{$items->discount_price}}">
                        </div>
                        <div class="col">
                            <label for="mrp" class="form-label">MRP</label>
                            <input type="text" class="form-control" id="mrp" name="mrp" value="{{$items->mrp}}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary done">Submit</button>
                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .item-edit{margin-top: 20px;}
        a, a:hover{
            color: #323232;
            text-decoration: none;
        }
        .item-edit .card{
            margin-top: 25px;
        }
    </style>
@endsection