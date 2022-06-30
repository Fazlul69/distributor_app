@extends('master')

@section('content')

    <div class="container vendor-edit">
        <p><a href="{{route('supplier.view')}}">Suppliers</a> / <a href="">Edit Suppliers</a></p>
        <div class="col-sm-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <form action="{{route('supplier.update',$suppliers->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="mb-3">
                                <label for="supplier_name" class="form-label">Supplier Name</label>
                                <input type="text" class="form-control" id="supplier_name" name="supplier_name" value="{{$suppliers->supplier_name}}">
                            </div>
                            <div class="mb-3">
                                <label for="supplier_mobile_no" class="form-label">Mobile</label>
                                <input type="text" class="form-control" id="supplier_mobile_no" name="supplier_mobile_no" value="{{$suppliers->supplier_mobile_no}}">
                            </div>
                            <div class="mb-3">
                                <label for="supplier_email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="supplier_email" name="supplier_email" value="{{$suppliers->supplier_email}}">
                            </div>
                            <div class="mb-3">
                                <label for="payed" class="form-label">Payed</label>
                                <input type="text" class="form-control" id="payed" name="payed" value="{{$suppliers->payed}}">
                            </div>
                            <div class="mb-3">
                                <label for="due" class="form-label">Due</label>
                                <input type="text" class="form-control" id="due" name="due" value="{{$suppliers->due}}">
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