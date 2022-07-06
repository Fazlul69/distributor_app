@extends('master')

@section('content')

    <div class="container missing-edit">
        <p><a href="{{route('stock.index')}}">Stock</a> / <a href="{{route('missing.index')}}">Missing Product List</a></p>
        <div class="col-sm-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <form action="{{route('missing.update',$missing->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="product_id" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="product_id" name="product_id" value="{{$missing->item->product_name}}">
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="text" class="form-control" id="quantity" name="quantity" value="{{$missing->quantity}}">
                        </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .missing-edit{padding-top: 20px;}
        .missing-edit p{
            margin-left: 10px;
        }
        .missing-edit a {
            color: #323232;
            text-decoration: none;
        }
    </style>

@endsection