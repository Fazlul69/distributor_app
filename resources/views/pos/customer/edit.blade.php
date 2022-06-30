@extends('master')

@section('content')

    <div class="container vendor-edit">
        <p><a href="{{route('customer.view')}}">Customers</a> / <a href="">Edit Customer</a></p>
        <div class="col-sm-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <form action="{{route('customer.update',$customers->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="mb-3">
                                <label for="customer_name" class="form-label">Customer Name</label>
                                <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{$customers->customer_name}}">
                            </div>
                            <div class="mb-3">
                                <label for="cus_mobile" class="form-label">Mobile</label>
                                <input type="text" class="form-control" id="cus_mobile" name="cus_mobile" value="{{$customers->cus_mobile}}">
                            </div>
                            <div class="mb-3">
                                <label for="shop" class="form-label">Shop</label>
                                <input type="text" class="form-control" id="shop" name="shop" value="{{$customers->shop}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="cus_email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="cus_email" name="cus_email" value="{{$customers->cus_email}}">
                            </div>
                            <div class="mb-3">
                                <label for="cus_address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="cus_address" name="cus_address" value="{{$customers->cus_address}}">
                            </div>
                            <div class="mb-3">
                                <label for="payed" class="form-label">Payed</label>
                                <input type="text" class="form-control" id="payed" name="payed" value="{{$customers->payed}}">
                            </div>
                            <div class="mb-3">
                                <label for="due" class="form-label">Due</label>
                                <input type="text" class="form-control" id="due" name="due" value="{{$customers->due}}">
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