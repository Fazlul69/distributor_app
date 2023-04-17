@extends('master')

@section('content')
    <div class="sale-edit">
        <div class="container">
            <p><a href="{{route('sales.index')}}">Sales</a> / <a href="">Sales Edit</a></p>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('sales.update', $productsales->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="payed" class="form-label">Payed</label>
                            <input type="text" class="form-control" id="payed" name="payed" value="{{$productsales->payed}}">
                        </div>
                        <div class="mb-3">
                            <label for="due" class="form-label">Due</label>
                            <input type="text" class="form-control"  name="due" value="{{$productsales->due}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .sale-edit{margin-top: 20px;}
        a, a:hover{color: #323232;
            text-decoration: none;}
        .card {
            width: 40% !important;
        }
    </style>
@endsection