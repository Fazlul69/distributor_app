@extends('master')
@section('content')

    <div class="product_edit">
        <div class="container">
            <h4>Edit Products</h4>
            <div class="row">
                <div class="card">
                    <div class="card-body">
                    <form action="{{route('product.update', $products->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                            <div class="col">
                                <label for="brand" class="form-label">Brand Name</label>
                                <input type="text" class="form-control" id="brand" name="brand" value="{{$products->brand}}">
                            </div>
                            <div class="col">
                                <label for="product_name" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="product_name" name="product_name" value="{{$products->product_name}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" class="form-control" id="description" name="description" value="{{$products->description}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="buy" class="form-label">Buy Price</label>
                                <input type="text" class="form-control" id="buy" name="buy" value="{{$products->buy}}">
                            </div>
                            <div class="col">
                                <label for="sell" class="form-label">Sell Price</label>
                                <input type="text" class="form-control" id="sell" name="sell" value="{{$products->sell}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="quantity" class="form-label">quantity</label>
                                <input type="text" class="form-control" id="quantity" name="quantity" value="{{$products->quantity}}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Submit</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection