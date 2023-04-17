@extends('master')

@section('content')
    <div class="sale_invoice_view">
        <div class="container">
            <div class="row dfd">
                <div class="col">
                    @foreach($ecomsales->unique('invoice') as $eco)
                    <h2>Invoice # {{$eco->invoice}}</h2>
                    <p>Created: {{date('d-M-y', strtotime($eco->date))}} </p>
                    @endforeach
                </div>
                <div class="col"></div>
                <div class="col">
                    <a href="#" class="printbtn" onClick="window.print()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill " viewBox="0 0 16 16">
                        <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                        <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                        </svg>Print</a>
                </div>
            </div>
            <!-- invoice part -->
            <div class="print_invoice card printTables" id="printTable">
                <div class="card-body">
                    <div class="row top">
                        <div class="col address">
                            <h3>Bismillah Traders</h1>
                            <p>Wapda Road, Chawk Bazar, Comilla</p>
                            <p><strong>Mobile:</strong> 01614-342654</p>
                            <p style="margin-left: 62px;">01924-342654</p>
                            <p><strong>Bkash:</strong> &nbsp;01873-342654</p>
                            <p><strong>Email:</strong> jcjoyb1991@gmail.com</p>
                        </div>
                        <!-- <div class="col"></div> -->
                        <div class="col">
                            <h4 class="text-center">Invoice</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">DATE</th>
                                        <th class="text-center">INVOICE NO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    @foreach($ecomsales->unique('invoice') as $eco)
                                        <td class="text-center">{{date('d-M-y', strtotime($eco->date))}}</td>
                                        <td class="text-center">{{$eco->invoice}}</td>
                                    @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr class="my-5">
                    <div class="row bill_area">
                        <div class="col">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Shop Name</th>
                                        <th>Mobile No.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    @foreach($ecomsales->unique('invoice') as $eco)
                                    <td>{{$eco->customer_name}}</td>
                                    <td>{{$eco->customer_mobile}}</td>
                                    @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row table_area p-0">
                        <div class="col">
                            <table class="table table-bordered">
                                <thead class="pre_head">
                                    <tr class="pre_head_tr inv-pl30 rowColor">
                                        <th>Items</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($ecomsales as $eco)
                                    <tr>
                                        <td width="50%">{{$eco->item->product_name}}</td>
                                        <td>৳{{$eco->item->sell}}</td>
                                        <td>{{$eco->quantity}}</td>
                                        <td>৳{{$eco->total}}</td>
                                    </tr>
                                    @endforeach
                                    <!-- down part -->
                                    @php
                                        $tt = $ecomsales->sum('total')
                                    @endphp
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><strong>Sub Total</strong></td>
                                        <td>৳{{$tt}}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><strong>Discount</strong></td>
                                        @foreach($ecomsales->unique('invoice') as $eco)
                                        <td>{{$eco->grand_discount}}%</td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><strong>Grand Total</strong></td>
                                        @foreach($ecomsales->unique('invoice') as $eco)
                                        <td>৳{{$eco->grand_total}}</td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><strong>Payed</strong></td>
                                        @foreach($ecomsales->unique('invoice') as $eco)
                                        <td>৳{{$eco->payed}}</td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><strong>Due</strong></td>
                                        @foreach($ecomsales->unique('invoice') as $eco)
                                        <td>৳{{$eco->due}}</td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col"></div>
                        <div class="col"></div>
                        <div class="col">
                            <p class="fJuyr">Total : </p>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="footer">
                            <div class="khYtd">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-scissors" viewBox="0 0 16 16">
                                <path d="M3.5 3.5c-.614-.884-.074-1.962.858-2.5L8 7.226 11.642 1c.932.538 1.472 1.616.858 2.5L8.81 8.61l1.556 2.661a2.5 2.5 0 1 1-.794.637L8 9.73l-1.572 2.177a2.5 2.5 0 1 1-.794-.637L7.19 8.61 3.5 3.5zm2.5 10a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0zm7 0a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0z"/>
                                </svg>
                                ----------------------------------------------------------------------------------------------------------------------------
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-scissors-2" viewBox="0 0 16 16">
                                <path d="M3.5 3.5c-.614-.884-.074-1.962.858-2.5L8 7.226 11.642 1c.932.538 1.472 1.616.858 2.5L8.81 8.61l1.556 2.661a2.5 2.5 0 1 1-.794.637L8 9.73l-1.572 2.177a2.5 2.5 0 1 1-.794-.637L7.19 8.61 3.5 3.5zm2.5 10a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0zm7 0a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0z"/>
                                </svg>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p>Recive/Copy</p>
                                </div>
                                <div class="col-md-4">
                                    <h2>Bismillah Tredars</h2>
                                </div>
                                <div class="col-md-4">
                                    <p class="text-center">Date:</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    @foreach($ecomsales->unique('invoice') as $eco)
                                    <p>Shop Name: {{$eco->customer_name}}</p>
                                    @endforeach
                                </div>
                                <div class="col-md-6 dShyt">
                                    @foreach($ecomsales->unique('invoice') as $eco)
                                    <p>Invoice No: {{$eco->invoice}}</p>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p class="saLio">Replace Delivery: </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="swU text-center">Customer/Receiver Sign</p>
                                </div>
                                <div class="col-md-4">
                                    <p class="swU text-center">DM Sign</p>
                                </div>
                                <div class="col-md-4">
                                    <p class="swU text-center">Authorized Sign</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .dfd a{
            text-decoration: none;
            color: #fff;
            padding: 6px 20px;
            border: 1px solid #235dcc;
            border-radius: 10px;
            background-color: #235dcc;
            display: inherit;
            width: 25%;
            margin-top: 22px;
            float: right;
        }
        .p-15 {
           padding: 15px !important;
        }
        .box{
            position: relative;
            border-top: 0;
            margin-bottom: 20px;
            width: 100%;
            background: #fff;
            border-radius: 0;
            padding: 0px;
            -webkit-transition: .5s;
            transition: .5s;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            border: 0px solid #dce3e6;
            border-radius: 8px;
            box-shadow: 0 .65rem 1.5rem rgba(0,0,0,.09) !important;
        }
        .print_invoice{
            margin-bottom: 2.143rem;
            box-shadow: 0 .75rem 1.5rem rgba(0,0,0,.09) !important;
            border: 1px solid #eaedf2 !important;
            border-radius: 10px;
            height: 100%;
        }
        .print_invoice img{width: 200px;}
        .address p{padding: 0; margin: 0;}
        thead.pre_head {
            color: #000;
            background: #fff !important;
        }
        .his_head {
            color: #fff;
            font-size: 20px;
            text-align: center;
            padding: 5px 0px;
        }
        .vl {
            border-left: 3px solid #000;
        }
        .bill_area{margin-bottom: 20px;}
        .bill_area p{padding: 0; margin: 0;}
        .btn.btn-success.addHistory {
           margin-top: 15px;
        }
        .select2-container .select2-selection--single {
          height: 38px;}
        .select2-container--default.select2-container--focus .select2-selection--multiple, .select2-container--default.select2-container--focus .select2-selection--single {
          border-color: #3233;
        }
        
        .footer{display: none;}
        .dates{display: none;}

        @media print
        {
            .bi.bi-scissors {
                transform: rotate(93deg);
            }
            .bi.bi-scissors-2 {
                transform: rotate(-93deg);
            }
            .top {
                padding-bottom: 30px;
            }
            .bill_area{
                margin-top: 10px;
            }
            
            .dfd, .my-5, .main-footer { display:none !important;}
            .content-wrapper .card {
                position: relative;
                display: flex;
                flex-direction: column;
                min-width: 0;
                word-wrap: break-word;
                background-color: #fff;
                background-clip: border-box;
                border: 1px solid #fff;
                border-radius: 0.5rem;
                width: 100% !important;
                margin-left: 0px !important;
            }
            .print_invoice {
                margin-bottom: 2.143rem;
                border: 0px solid #eaedf2 !important;
                box-shadow: 0 0 0 rgba(0, 0, 0, 0.09) !important;
                border-radius: 10px;
            }
            .printTables{height: 1450px;}
            .footer{
                display: block;
                position: absolute;
                bottom: 0;
                left: 0;
                page-break-after: avoid;
            }
            .footer p{margin: 0;padding: 0;}
            .saLio{
                margin-bottom: 5px !important;
            }
            .swU {
                margin: 0;
                padding: 0;
                border-top: 1px solid #000 !important;
            }
            
        }
        
    </style>
@endsection