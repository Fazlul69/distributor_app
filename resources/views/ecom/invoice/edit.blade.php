@extends('master')

@section('content')
    <div class="sale-edit">
        <div class="container">
            <p> <a href="">Ecommerce Sales Edit</a></p>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('ecom_invoice.update', $ecomsales->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="payed" class="form-label">Total</label>
                            <p>{{$ecomsales->grand_total}}</p>
                        </div>
                        <div class="mb-3">
                            <label for="payed" class="form-label">Payed</label>
                            <input type="text" class="form-control" id="payed" name="payed" value="{{$ecomsales->payed}}">
                        </div>
                        <div class="mb-3">
                            <label for="due" class="form-label">Due</label>
                            <input type="text" class="form-control"  name="due" value="{{$ecomsales->due}}">
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