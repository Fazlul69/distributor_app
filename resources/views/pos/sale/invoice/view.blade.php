@extends('master')

@section('content')
    <div class="sale_invoice_view">
        <div class="container">
            <div class="row dfd">
                <div class="col">
                    @foreach($productsales->unique('invoice') as $pro)
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
            <div class="print_invoice card dfd">
                <div class="col p-15 card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="border-0">Customer</th>
                                <th class="border-0">Total</th>
                                <th class="border-0">Due</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productsales->unique('invoice') as $pro)
                            <tr>
                                <td>{{$pro->customer->customer_name}}</td>
                                <td>{{$pro->grand_total}}</td>
                                <td>{{$pro->due}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="print_invoice card dfd">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <label for="bill" class="form-label">Bill to</label>
                                <select class="form-control customerSelectFromSale single" name="customer_id[]">
                                    <option value="">Select a Customer</option>
                                    @foreach($customers as $customer)
                                    <option value="{{$customer->id}}">{{$customer->cus_mobile}}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="col">
                            <label for="" class="form-label">Invoice</label>
                            <select class="form-control saleInvoice" name="invoice">
                                <option value="">Invoice</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="" class="form-label">Vendor</label>
                            <select class="form-control saleVendor" name="vendor_id">
                                <option value="">Vendor</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="" class="form-label">Due</label>
                            <input type="text" class="form-control saleDue" name="due">
                        </div>
                        <div class="col">
                            <p></p>
                            <button class="btn btn-success addHistory">+</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- invoice part -->
            <div class="print_invoice card printTables" id="printTable">
                <div class="card-body">
                    <div class="row top">
                        <div class="col"><img src="{{asset('images/logo2.png')}}" alt=""></div>
                        <div class="col"></div>
                        <div class="col address">
                            <p><strong style="margin-left: 75px;">Wapda Road</strong>, <br><strong>Chawk Bazar</strong>, <strong>Comilla</strong>. <br></p>
                            <p><strong>Mobile:</strong> 01614-342654</p>
                            <p style="margin-left: 62px;">01924-342654</p>
                            <p><strong>Bkash:</strong> &nbsp;01873-342654</p>
                            <p><strong>Email:</strong> jcjoyb1991@gmail.com</p>
                        </div>
                    </div>
                    <hr class="my-5">
                    <div class="row bill_area">
                        <div class="col">
                            <h5>Bill to</h5>
                            @foreach($productsales->unique('invoice') as $pro)
                            <p>{{$pro->customer->customer_name}}</p>
                            <p>{{$pro->customer->cus_mobile}}</p>
                            @endforeach
                        </div>
                        <div class="col"></div>
                        <div class="col">
                            <table>
                                <tbody>
                                    <tr>
                                        <td><strong>Invoice No:</strong></td>
                                        @foreach($productsales->unique('invoice') as $pro)
                                        <td>{{$pro->invoice}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Invoice Date:</strong></td>
                                        <td>{{date('d-M-y', strtotime($pro->date))}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Address:</strong></td>
                                        <td>{{$pro->customer->cus_address}}</td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row table_area p-0">
                        <div class="col-4">
                            <p class="his_head rowColor" style="background: #546af1">History</p>
                            <div class="col">
                                <table class="table queryTable">
                                    <thead>
                                        <tr>
                                            <th>Vendor</th>
                                            <th>Invoice</th>
                                            <th>Due</th>
                                        </tr>
                                    </thead>
                                    <tbody class="sjKei">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col vl">
                            <table class="table">
                                <thead class="pre_head">
                                    <tr class="pre_head_tr inv-pl30 rowColor" style="background: #546af1">
                                        <th>Items</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($productsales as $pro)
                                    <tr>
                                        <td width="50%">{{$pro->item->product_name}}</td>
                                        <td>৳{{$pro->item->tp}}</td>
                                        <td>{{$pro->quantity}}</td>
                                        <td>৳{{$pro->total}}</td>
                                    </tr>
                                    @endforeach
                                    <!-- down part -->
                                    @php
                                        $tt = $productsales->sum('total')
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
                                        @foreach($productsales->unique('invoice') as $pro)
                                        <td>{{$pro->grand_discount}}%</td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><strong>Grand Total</strong></td>
                                        @foreach($productsales->unique('invoice') as $pro)
                                        <td>৳{{$pro->grand_total}}</td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><strong>Payed</strong></td>
                                        @foreach($productsales->unique('invoice') as $pro)
                                        <td>৳{{$pro->payed}}</td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"><strong>Due</strong></td>
                                        @foreach($productsales->unique('invoice') as $pro)
                                        <td>৳{{$pro->due}}</td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="footer">
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
                                    @foreach($productsales->unique('invoice') as $pro)
                                    <p>Shop Name: {{$pro->customer->shop}}</p>
                                    <p>Address: {{$pro->customer->cus_address}}</p>
                                    @endforeach
                                </div>
                                <div class="col-md-6 dShyt">
                                    @foreach($productsales->unique('invoice') as $pro)
                                    <p>Invoice No: {{$pro->invoice}}</p>
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
            color: #fff;
            background: #2568ef;
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