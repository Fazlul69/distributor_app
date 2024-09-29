@extends('master')

@section('content')

<div class="stock_details">
    <div class="container">
        <div class="row">
            <div class="col"> << <a href="{{route('stock.index')}}">Back</a> / <a href="{{route('stock.details')}}">Stock Details</a></div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <form class="form-inline search" action="{{route('stockdetails.search')}}" method="get">
                    <input class="form-control mr-sm-2" name="query" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
        <div class="lscYr">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Vendor</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Buy Price</th>
                    <th scope="col">Sell Price</th>
                    <th scope="col">Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productinputs as $pro)
                    <tr>
                        <td>{{date('d-M-y', strtotime($pro->date))}}</td>
                        @php
                            $allven = $vendors->where('id', $pro->vendor_id);
                            $p_name = $items->where('id', $pro->product_id);
                        @endphp
                        @foreach($allven as $ven)
                        <td>{{$ven->name}}</td>
                        @endforeach
                        @foreach($p_name as $pname)
                        <td>{{$pname->product_name}}</td>
                        @endforeach
                        <td>{{$pro->company_price}}</td>
                        <td>{{$pro->sell_price}}</td>
                        <td>{{$pro->quantity}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    a, a:hover{color: #323232;}
    .form-inline.search {
        margin-bottom: 20px;
    }
</style>
@endsection