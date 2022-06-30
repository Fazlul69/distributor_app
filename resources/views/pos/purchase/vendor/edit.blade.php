@extends('master')

@section('content')

    <div class="container vendor-edit">
    <p>> <a href="{{route('vendor.view')}}">Vendors</a> > <a href="">Edit Vendor</a></p>
        <div class="col-sm-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <form action="{{route('vendor.update',$vendors->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$vendors->name}}" placeholder="Name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{$vendors->email}}" placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <label for="mobile" class="form-label">Mobile No.</label>
                                <input type="text" class="form-control" id="mobile" name="mobile" value="{{$vendors->mobile}}" placeholder="Mobile No">
                            </div>
                            <div class="mb-3">
                                <label for="unpaid" class="form-label">Due</label>
                                <input type="text" class="form-control" id="unpaid" name="unpaid" value="{{$vendors->unpaid}}" placeholder="Due in Tk">
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
        .vendor-edit a {
            color: #323232;
            text-decoration: none;
        }
    </style>

@endsection