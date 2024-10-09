@extends('master')

@section('content')

    <div class="invoice_create">
        <div class="container">
        <p><a href="{{route('dashboard.view')}}">Dashboard</a> / <a href="{{route('sales.index')}}">Sales Invoice</a></p>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('sales.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="col invoice_table">
                            <div class="row section_one">
                                <div class="col">
                                    <label for="bill" class="form-label">Bill to</label>
                                    <input type="text" class="form-control" name="customer_name" placeholder="Customer Name">
                                </div>
                                <div class="col">
                                    <label for="bill" class="form-label">Customer Mobile No.</label>
                                    <input type="text" class="form-control" name="customer_mobile" placeholder="Customer Mobile">
                                </div>
                                <div class="col">
                                    <label for="invoice" class="form-label">Invoice No</label>
                                    <input type="text" class="form-control" id="invoice" name="invoice[]" value="{{ $newInvoiceNumber }}" readonly>
                                </div>
                                <div class="col">
                                    <label for="date" class="form-label">date</label>
                                    <input type="date" class="form-control" id="date" name="date[]" placeholder="date" value="{{ date('Y-m-d') }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="vendor" class="form-label">Vendor</label>
                                </div>
                                <div class="col">
                                    <label for="category" class="form-label">Category</label>
                                </div>
                                <div class="col">
                                    <label for="product_name" class="form-label">Item</label>
                                </div>
                                <div class="col">
                                    <label for="stock" class="form-label">Stock</label>
                                </div>
                                <div class="col">
                                    <label for="sell_price" class="form-label">Sell Price</label>
                                </div>
                                <div class="col">
                                    <label for="mrp" class="form-label">Quantity</label>
                                </div>
                                <div class="col">
                                    <label for="total" class="form-label">total</label>
                                </div>
                                <div class="col">
                                </div>
                            </div>

                            <div class="row add tr">
                                <div class="col vv">
                                    <select class="form-control productVendor" name="vendor_id[]">
                                        <option value="">Select a Vendor</option>
                                            @foreach($vendors as $vendor)
                                                <option value="{{$vendor->id}}">{{$vendor->name}}</option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <select class="form-control productCategory" name="category[]">
                                        <option value="">Category</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select class="form-control productName" name="product_name[]">
                                        <option value="">Item</option>
                                    </select>
                                </div>
                                <div class="col hide">
                                    <input type="text" class="form-control purchase_quality" name="purchase_quality" placeholder="from purchase">
                                </div>
                                <div class="col hide">
                                    <input type="text" class="form-control sales_quality" name="sales_quality" placeholder="from sale">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control p_stock" placeholder="Stock">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control p_price" id="sell_price" name="sell_price[]" placeholder="Sell Price">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control quantity" id="quantity" name="quantity[]" onkeyup='saletotalcal()' placeholder="Quantity" required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control sale_total" id="total" name="total[]" placeholder="Total">
                                </div>
                                <div class="col">
                                    <a href="javascript:void(0)" class="btn btn-danger deleteRow" style="font-size: 11px;">X</a>
                                </div>
                            </div>  
                        </div>
                        <div class="row dow_row">
                            <div class="col">
                                <p class="title">Sub Total</p>
                                <input type="text" class="form-control sub_total" id="sub_total" name="sub_total" placeholder="Subtotal">
                            </div>
                            <div class="col">
                                <p class="title">Discount</p>
                                <input type="text" class="form-control grand_discount" id="grand_discount" name="grand_discount" placeholder="Discount in %">
                            </div>
                            <div class="col">
                                <p class="title title_g">Grand Total</p>
                                <input type="text" class="form-control grand_total" id="grand_total" name="grand_total" placeholder="Grand Total">
                            </div>
                            <div class="col">
                                <p class="title">Payed</p>
                                <input type="text" class="form-control kIops" id="payed" name="payed">
                            </div>
                            <div class="col">
                                <p class="title">Due</p>
                                <input type="text" class="form-control kIoaw" id="due" name="due">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a href="javascript:void(0)" class="addRowforsale">+ Add new item</a>
                    </form>
                </div>
            </div>
            {{-- <div class="note">
                <div class="container">
                    <h3>Note</h3>
                        <form action="">
                            @csrf
                            <div class="gtYsd">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="">Vendor</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="bill" class="form-label">Bill to</label>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="invoice" class="form-label">Invoice No</label>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="">Payed</label>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="">Due</label>
                                    </div>
                                </div>
                                <div class="row hgDqw">
                                    <div class="col-md-2 xcUbv">
                                        <select class="form-control bhFre" name="vendor_id">
                                            <option value="">Select a Vendor</option>
                                            @foreach($vendors as $vendor)
                                            <option value="{{$vendor->id}}">{{$vendor->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3 xcUbv">
                                        <select class="form-control single" name="customer_id">
                                            <option value="">Select a Customer</option>
                                                @foreach($customers as $customer)
                                                    <option value="{{$customer->id}}">{{$customer->cus_mobile}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2 xcUbv">
                                        <input type="text" class="form-control"  name="note_invoice" placeholder="S101" required>
                                    </div>
                                    <div class="col-md-2 xcUbv">
                                        <input type="text" class="form-control sdLju" name="note_payed">
                                    </div>
                                    <div class="col-md-2 xcUbv">
                                        <input type="text" class="form-control sdLju" name="note_due">
                                    </div>
                                    <div class="col-md-2 xcUbv">
                                        <p></p>
                                        
                                    </div>
                                </div>
                            </div>
                                <button type="submit" class="btn btn-success notesubmit">Note Save</button>
                                <!-- <a href="javascript:void(1)" class="addNote btn btn-success">+</a> -->
                        </form>
                </div>
            </div> --}}
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
        .invoice_create p{
            margin-left: 10px;
        }
        .invoice_create a {
            color: #323232;
            text-decoration: none;
            /* font-size: 20px; */
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
            margin-left: -10px;
        }
        .col.hide {
           display: none;
        }
        .content-wrapper .card {
            width: 100% !important;
            margin-left: 0 !important;
        }
        .select2-container .select2-selection--single {
          height: 38px;
        }
        .addRowforsale {
            border: 1px solid #3232;
            padding: 5px 8px;
            border-radius: 4px;
            background-color: #73d0b2;
            color: #fff !important;
        }
        .note{margin-top: 20px; margin-bottom: 20px;}
        .gtYsd {
            justify-content: center;
            margin-left: 220px;
            margin-top: 30px;
        }
        .btn.btn-success.notesubmit {
            margin-top: 10px;
            margin-bottom: 10px;margin-left: 220px;
        }
        .addNote.btn.btn-success {
            margin-top: 1px;
            margin-left: 50px;
        }
        .xcUbv{margin-bottom: 10px;}
    </style>
    

    
@endsection
