@extends('master')

@section('content')

    <div class="container replace-edit">
        <p><a href="{{route('replace.index')}}">Replace Product List</a></p>
        <div class="col-sm-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <form action="{{route('replace.update',$replaces->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="sales_return" class="form-label">Quantity</label>
                            <input type="text" class="form-control" id="sales_return" name="sales_return" value="{{$replaces->sales_return}}">
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="text" class="form-control" id="amount" name="amount" value="{{$replaces->amount}}">
                        </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .replace-edit{padding-top: 20px;}
        .replace-edit p{
            margin-left: 10px;
        }
        .replace-edit a {
            color: #323232;
            text-decoration: none;
        }
    </style>

@endsection