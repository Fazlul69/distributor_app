@extends('master')

@section('content')
    <div class="sale_invoice_view">
        <div class="container">
            <div class="row dfd">
                <div class="col">
                    @foreach($productinputs->unique('invoice') as $pro)
                    <h2>Invoice # {{$pro->invoice}}</h2>
                    <p>Created: {{date('d-M-y', strtotime($pro->date))}} </p>
                    @endforeach
                </div>
                <div class="col"></div>
                <div class="col">
                    <a href="#" onClick="window.print()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill " viewBox="0 0 16 16">
                        <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                        <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                        </svg>Print</a>
                    
                </div>
            </div>
            <!-- invoice part -->
            <div class="print_invoice card printTables" id="printTable">
                <div class="card-body">
                    <div class="row top">
                        <div class="col"><img src="{{asset('details/'. $detail->dashboard_logo)}}" alt=""></div>
                        <div class="col"></div>
                        <div class="col address">
                            <p><strong>{{$detail->address}}</strong></p>
                            <p><strong>Mobile:</strong> {{$detail->mobile_1}}</p>
                            <p style="margin-left: 62px;">{{$detail->mobile_2}}</p>
                            {{-- <p><strong>Bkash:</strong> &nbsp;01873-342654</p> --}}
                            <p><strong>Email:</strong> {{$detail->email_1}}</p>
                        </div>
                    </div>
                    <hr class="my-5">
                    <div class="row bill_area">
                        <div class="col">
                            <p>Purchase from</p>
                            @foreach($productinputs->unique('invoice') as $pro)
                            <h5>{{$pro->vendor->name}}</h5>
                            @endforeach
                        </div>
                        <div class="col"></div>
                        <div class="col">
                            <table>
                                <tbody>
                                    <tr>
                                        <td><strong>Invoice No:</strong></td>
                                        @foreach($productinputs->unique('invoice') as $pro)
                                        <td>{{$pro->invoice}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Invoice Date:</strong></td>
                                        <td>{{date('d-M-y', strtotime($pro->date))}}</td>
                                    </tr>
                                    <tr>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row table_area p-0">
                        
                        <div class="col vl">
                            <table class="table">
                                <thead class="pre_head">
                                    <tr class="pre_head_tr inv-pl30 rowColor" style="background: #546af1">
                                        <th width="50%">Items</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($productinputs as $pro)
                                    <tr>
                                        <td width="50%">{{$pro->items->product_name}}</td>
                                        <td>৳{{$pro->sell_price}}</td>
                                        <td>{{$pro->quantity}}</td>
                                        <td>৳{{$pro->total}}</td>
                                    </tr>
                                    @endforeach
                                    <!-- down part -->
                                    @php
                                        $tt = $productinputs->sum('total')
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
                                        @foreach($productinputs->unique('invoice') as $pro)
                                        <td>{{$pro->grand_discount}}%</td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><strong>Grand Total</strong></td>
                                        @foreach($productinputs->unique('invoice') as $pro)
                                        <td>৳{{$pro->grand_total}}</td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><strong>Payed</strong></td>
                                        @foreach($productinputs->unique('invoice') as $pro)
                                        <td>৳{{$pro->payed}}</td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><strong>Due</strong></td>
                                        @foreach($productinputs->unique('invoice') as $pro)
                                        <td>৳{{$pro->due}}</td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
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
            /* margin-top: 20px; */
        }
        .print_invoice img{width: 150px;}
        .address p{padding: 0; margin: 0;}
        thead.pre_head {
            color: #fff;
            background: #2568ef;
        }
        .his_head {
            color: #fff;
            font-size: 20px;
            text-align: center;
            padding: 5px 0px;
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

        @media print
        {
            .his_head.rowColor {
                border-bottom: 2px solid #000;
            }
            .vl table tbody tr:nth-child(1) {
               border-top: 3px solid #000;
            }
            .top {
                border-bottom: 2px solid #000;
                padding-bottom: 30px;
            }
            .bill_area{margin-top: 10px;border-bottom: 2px solid #000;}
            .rowColor{background-color: #546af1 !important;}
            /* .table_area, .pre_head_tr{
                border-bottom: 2px solid #000;
            } */
            .dfd, .my-5, .main-footer { display:none;}
        }
    </style>
@endsection