@extends('master')

@section('content')
    <div class="container stock">
        <div class="row">
                <div class="col">
                    <h2 class="mb-25"><a href="{{route('stock.index')}}">Stock Items</a>
                    </h2>
                </div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <form class="form-inline search" action="{{route('stock.search')}}" method="get">
                    <input class="form-control mr-sm-2" name="query" type="search" placeholder="Product Name" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
            <div class="col">
                <a href="{{route('stock.details')}}" class="s_details">Stock Details</a>
            </div>
        </div>
        <div class="">
            <div class="card-body des">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Vendor</th>
                    <th scope="col">Purchase</th>
                    <th scope="col">Sale</th>
                    <th scope="col">Damage</th>
                    <th scope="col">Missing</th>
                    <th scope="col">Replace</th>
                    <th scope="col">Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                    <tr>
                        <td>{{$item->product_name}}</td>

                        @php
                            $allven = $vendors->where('id', $item->vendor_id);
                            $sale_product = $productsales->where('product_id', $item->id)->sum('quantity');
                            $dmg = $damages->where('product_id', $item->id)->sum('quantity');
                            $miss = $missings->where('product_id', $item->id)->sum('quantity');
                            $p_quantity = $productinputs->where('product_id', $item->id)->sum('quantity');
                            $rep = $replaces->where('product_id', $item->id)->sum('sales_return');
                        @endphp
                        @foreach($allven as $ven)
                        <td>{{$ven->name}}</td>
                        @endforeach

                        <td>{{$p_quantity}}</td>
                        <td>{{$sale_product}}</td>
                        <td>{{$dmg}}</td>
                        <td>{{$miss}}</td>
                        <td>{{$rep}}</td>
                        <td>{{$p_quantity - $sale_product - $dmg - $miss+$rep}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        <div class="pagination">
            <span>{{$items->links()}}</span>
        </div> 
    </div>

    <style>
        /* .stock{padding-top: 30px;} */
        .des{
            box-shadow: 0 .75rem 1.5rem rgba(0,0,0,.09) !important;
            border: 0px solid #eaedf2 !important;
            border-radius: 10px;
        }
        .search{margin-bottom: 10px;}
        a{
            text-decoration: none;
            color: #323232;
        }
        .s_details {
            color: #000;
            border: 1px solid #3233;
            padding: 8px 15px;
            border-radius: 6px;
        }
         /* pagination */
         .w-5.h-5 {
           width: 15px;
        }
        .relative.inline-flex.items-center.px-4.py-2.text-sm.font-medium.text-gray-700.bg-white.border.border-gray-300.leading-5.rounded-md.hover\:text-gray-500.focus\:outline-none.focus\:ring.ring-gray-300.focus\:border-blue-300.active\:bg-gray-100.active\:text-gray-700.transition.ease-in-out.duration-150,.relative.inline-flex.items-center.px-4.py-2.text-sm.font-medium.text-gray-500.bg-white.border.border-gray-300.cursor-default.leading-5.rounded-md,.relative.inline-flex.items-center.px-4.py-2.ml-3.text-sm.font-medium.text-gray-700.bg-white.border.border-gray-300.leading-5.rounded-md.hover\:text-gray-500.focus\:outline-none.focus\:ring.ring-gray-300.focus\:border-blue-300.active\:bg-gray-100.active\:text-gray-700.transition.ease-in-out.duration-150 {
            display: none !important;
        }

        .pagination {
            margin-left: 27px;
            margin-bottom: 10px;
        }
    </style>
@endsection