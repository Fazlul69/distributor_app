@extends('master')

@section('content')

    <div class="container vendor-edit">
        <p><a href="{{route('stock.index')}}">Stock</a> / <a href="{{route('damage.index')}}">Damage</a></p>
        <div class="col-sm-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <form action="{{route('damage.update',$damages->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="product_id" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="product_id" name="product_id" value="{{$damages->item->product_name}}">
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="text" class="form-control" id="quantity" name="quantity" value="{{$damages->quantity}}">
                        </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .vendor-edit{padding-top: 20px;}
        .vendor-edit p{
            margin-left: 10px;
        }
        .vendor-edit a {
            color: #323232;
            text-decoration: none;
        }
    </style>

@endsection