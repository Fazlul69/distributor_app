@extends('master')

@section('content')

    <div class="invoice_create">
        <div class="container">
        <p><a href="{{route('dashboard.view')}}">Dashboard</a> / <a href="{{route('pinput.view')}}">Purchase Invoice</a></p>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('pinput.update', $productinputs->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col">
                                <p class="title title_g">Grand Total</p>
                                <input type="text" class="form-control" id="" name="grand_total" value="{{$productinputs->grand_total}}">
                            </div>
                            <div class="col"></div>
                            <div class="col"></div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p class="title">Payed</p>
                                <input type="text" class="form-control" id="payed" name="payed" value="{{$productinputs->payed}}">
                            </div>
                            <div class="col"></div>
                            <div class="col"></div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p class="title">Due</p>
                                <input type="text" class="form-control" id="due" name="due" value="{{$productinputs->due}}">
                            </div>
                            <div class="col"></div>
                            <div class="col"></div>
                        </div>
                        <button type="submit" class="btn btn-success done">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .invoice_create{
            padding-top: 20px;
        }
        .section_one{
            margin-bottom: 30px;
        }
        .add{
            background-color: #F2F4F7;
            padding: 15px 10px;
        }
        .form-control:focus {
            color: #212529;
            background-color: #fff;
            border-color: #3232;
            outline: 0;
            box-shadow: none;
        }
        .select2-container .select2-selection--single {
          height: 38px;
        }
        .dow_row .col
        {
            display: flex;
            margin-left: 47rem !important;
            margin-top: 10px;
        }
        .dow_row .title {
            margin-top: 7px;
        }
        .dow_row #sub_total, #grand_discount, #grand_total,.kIops {
            width: 40%;
            margin-left: 8px;
        }
        .dow_row .kIops {
            width: 40%;
            margin-left: 28px;
        }
        
        .dow_row .kIoaw {
            width: 40%;
            margin-left: 43px;
        }
        .dow_row .title.title_g {
            margin-left: -19px !important;
        }
        .addRow {
            border: 1px solid #3232;
            padding: 5px 8px;
            border-radius: 4px;
            background-color: #73d0b2;
            color: #fff !important;
        }
        a,a:hover{color: #323232;
            text-decoration: none;}
        .card {
            width: 40% !important;
            margin-left: 50px !important;
        }
        .done{margin-top: 20px;}
    </style>
    
@endsection