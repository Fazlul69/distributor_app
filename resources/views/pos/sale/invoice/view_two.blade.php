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
                    <a href="#" class="printbtn" onClick="window.print()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill " viewBox="0 0 16 16">
                        <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                        <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                        </svg>Print</a>
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
                                    <option value="{{$customer->id}}">{{$customer->shop}}</option>
                                    @endforeach
                                </select>
                        </div>

                        <div class="col">
                            <label for="" class="form-label">Invoice</label>
                            <select class="form-control saleInvoice" name="invoice">
                                <option value="">Invoice</option>
                            </select>
                        </div>
                        <div class="col dates">
                            <label for="" class="form-label">Date</label>
                            <input type="text" class="form-control saleDate">
                        </div>
                        <!-- <div class="col">
                            <label for="" class="form-label">Vendor</label>
                            <select class="form-control saleVendor" name="vendor_id">
                                <option value="">Vendor</option>
                            </select>
                        </div> -->
                        <div class="col">
                            <label for="" class="form-label">Total</label>
                            <input type="text" class="form-control saleDue">
                        </div>
                        <div class="col">
                            <label for="" class="form-label">Collection</label>
                            <input type="text" class="form-control collections">
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
                        <div class="col address">
                            <p><strong>{{$detail->address}}</strong></p>
                            <p><strong>Mobile:</strong> {{$detail->mobile_1}}</p>
                            <p style="margin-left: 62px;">{{$detail->mobile_2}}</p>
                            {{-- <p><strong>Bkash:</strong> &nbsp;01873-342654</p> --}}
                            <p><strong>Email:</strong> {{$detail->email_1}}</p>
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
                                    @foreach($productsales->unique('invoice') as $pro)
                                        <td class="text-center">{{date('d-M-y', strtotime($pro->date))}}</td>
                                        <td class="text-center">{{$pro->invoice}}</td>
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
                                        <th>Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    @foreach($productsales->unique('invoice') as $pro)
                                    <td>{{$pro->customer->shop}}</td>
                                    <td>{{$pro->customer->customer_name}}</td>
                                    @endforeach
                                    </tr>
                                </tbody>
                                <thead>
                                    <tr>
                                        <th>Address</th>
                                        <th>Mobile No.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    @foreach($productsales->unique('invoice') as $pro)
                                    <td>{{$pro->customer->cus_address}}</td>
                                    <td>{{$pro->customer->cus_mobile}}</td>
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
                    <div class="row history_part">
                        <div class="col">
                            <table class="table table-bordered queryTable">
                                <thead>
                                    <tr class="text-center">
                                        <th>Date</th>
                                        <th>Invoice</th>
                                        <th>Invoice Amount</th>
                                        <th>Collection</th>
                                        <th>Closing Balance</th>
                                    </tr>
                                </thead>
                                <tbody>
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
                                    <h2>{{$detail->company_name}}</h2>
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
        .print_invoice img{width: 150px;}
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