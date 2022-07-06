@extends('master')

@section('content')

    <div class="invoice_create">
        <div class="container">
        <p><a href="{{route('dashboard.view')}}">Dashboard</a> / <a href="{{route('pinput.view')}}">Purchase Invoice</a></p>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('pinput.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="col invoice_table">
                            <div class="row section_one">
                            <div class="col">
                            <label for="vendor_id" class="form-label">Vendor</label>
                                        <select class="form-control purchaseVendor" name="vendor_id[]">
                                            <option value="">Select a Vendor</option>
                                                @foreach($vendors as $vendor)
                                                    <option value="{{$vendor->id}}">{{$vendor->name}}</option>
                                                @endforeach
                                        </select>
                                </div>
                                <div class="col">
                                    <label for="bill" class="form-label">Bill to</label>
                                    <select class="form-control p_bill" name="supplier_id[]">
                                            <option value="">Select a Supplier</option>
                                                @foreach($suppliers as $supplier)
                                                    <option value="{{$supplier->id}}">{{$supplier->supplier_mobile_no}}</option>
                                                @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    @php
                                        $heee = DB::table('product_inputs')->latest('id')->first();
                                    @endphp
                                    <label for="invoice" class="form-label">Invoice No</label>
                                    @if(empty($heee->invoice))
                                    <input type="text" class="form-control" id="invoice" name="invoice[]" value="101" placeholder="S101" required>
                                    @else
                                    <input type="text" class="form-control" id="invoice" name="invoice[]" value="{{$heee->invoice+1}}" placeholder="S101" required>
                                    @endif
                                </div>
                                <div class="col">
                                    <label for="date" class="form-label">date</label>
                                    <input type="date" class="form-control" id="date" name="date[]" placeholder="date">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="category" class="form-label">Category</label>
                                </div>
                                <div class="col">
                                    <label for="product_name" class="form-label">Item</label>
                                </div>
                                <div class="col">
                                    <label for="company_price" class="form-label">DP</label>
                                </div>
                                <div class="col">
                                    <label for="discount_price" class="form-label">Discount Price</label>
                                </div>
                                <div class="col">
                                    <label for="sell_price" class="form-label">TP</label>
                                </div>
                                <div class="col">
                                    <label for="mrp" class="form-label">MRP</label>
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

                            <div class="row addd tr">
                                
                                <div class="col">
                                    <select class="form-control purchaseCat" id="p_cat" name="category_id[]">
                                        <option value="">Category</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select class="form-control productNameforpurchase" id="oiHgu" name="product_id[]">
                                        <option value="">Item</option>
                                    </select>
                                    <!-- <input type="text" class="form-control" id="product_name" name="product_name[]" placeholder="Item" required> -->
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control company_price" id="company_price" name="company_price[]" placeholder="DP">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" id="discount_price" name="discount_price[]" placeholder="Discount">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control sell_price" id="sell_price" name="sell_price[]" placeholder="TP">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control mrp" id="mrp" name="mrp[]" placeholder="mrp">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control quantity" id="quantity" name="quantity[]" onkeyup='calculfac()' placeholder="quantity" required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control subtotal sale_total" id="total" name="total[]"  onclick="getTotal()" placeholder="total">
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
                        <a href="javascript:void(0)" class="addRow" style="float:inline-end">+ Add new item</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .invoice_create{
            padding-top: 20px;
        }
        a, a:hover{
            color: #323232;
            text-decoration: none;
        }
        .section_one{
            margin-bottom: 30px;
        }
        .addd{
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
            margin-left: 47rem;
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
        .content-wrapper .card {
            width: 100% !important;
            margin-left: 0 !important;
        }
        .addRow {
            border: 1px solid #3232;
            padding: 5px 8px;
            border-radius: 4px;
            background-color: #73d0b2;
            color: #fff !important;
        }
        label:not(.form-check-label):not(.custom-file-label) {
            font-weight: 700;
            font-size: 14px;
        }
        .select2-dropdown.select2-dropdown--above,.select2-dropdown.select2-dropdown--below {
            width: 300px !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow{display: none;}
    </style>
    
@endsection