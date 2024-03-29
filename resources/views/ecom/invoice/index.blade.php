@extends('master')

@section('content')
   <div class="ecom_invoice">
       <div class="container">
           <p><a href="{{route('dashboard.view')}}">Dashboard</a> / <a href="{{route('ecom_invoice.index')}}">Ecommerce Invoice</a></p>
           <a href="{{route('ecom_invoice.create')}}" class="add">+ Add Invoice</a>
           <div class="row">
               <div class="col">
                    <form class="form-inline search justify-content-center" action="{{route('sale.invoice.search')}}" method="get">
                        <div class="row">
                            <div class="col"><input class="form-control mr-sm-2" name="query" type="text" placeholder="Invoice No" aria-label="Search"></div>
                        </div>
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg></button>
                    </form>
               </div>
               <div class="col">
                    <form class="form-inline search justify-content-center" action="{{route('sale.cus.search')}}" method="get">
                        <div class="row">
                            <div class="col"><input class="form-control mr-sm-2" name="query" type="text" placeholder="Customer Name/No" aria-label="Search"></div>
                        </div>
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg></button>
                    </form>
               </div>
               <div class="col">
                    <form class="form-inline search justify-content-center" action="{{route('sale.datesearch')}}" method="get">
                        <div class="row">
                            <div class="col"><input class="form-control mr-sm-2" name="query" type="date" placeholder="Search" aria-label="Search"></div>
                        </div>
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg></button>
                    </form>
               </div>
           </div>
           <div class="">
               <div class="card-body">
                <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Invoice No</th>
                            <th scope="col">Customer</th>
                            <th scope="col">total</th>
                            <th scope="col">due</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ecomsales->unique('invoice') as $item)
                            <tr>
                                <td>{{$item->date}}</td>
                                <td>{{$item->invoice}}</td>
                                <td>{{$item->customer_name}}</td>
                                <td>{{$item->grand_total}}</td>
                                <td>{{$item->due}}</td>
                                <td>
                                <a class="svgimg" href="{{route('ecom_invoice.edit',$item->id)}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                                    </svg>
                                </a>
                                <a href="{{route('ecom_invoice.show',$item->invoice)}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                    </svg>
                                </a>
                                            <form method="POST" id="delete-form-{{$item->id}}" 
                                                    action="{{route('ecom_invoice.delete',$item->id)}}" style="display: none;">
                                                    @csrf
                                                    {{method_field('delete')}}
                                                    
                                            </form>
                                                <button onclick="if(confirm('Are you sure, You want to delete this?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{$item->id}}').submit();
                                                }else{
                                                event.preventDefault();
                                                }
                                                "class="btn" href="">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                </svg>
                                                </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
               </div>
           </div>
       </div>
   </div>


 
   <style>
       .ecom_invoice{
           padding-top: 20px;
       }
       .card{
           margin-top: 40px;
       }
       .btn-success{
           margin-top: -45px;
           float: right;
       }
       .btn-success:focus {
            border-color: #fff;
            box-shadow: none;
       }
       .table thead th{
          font-size: 12px;
       }  
       .ecom_invoice .add{
            margin-top: -45px;
            float: right;
            text-decoration: none;
            border: 1px solid #3232;
            padding: 5px 8px;
            border-radius: 4px;
            background-color: #73d0b2;
            color: #fff !important;
       }

       .ecom_invoice p{
            margin-left: 10px;
        }
        .ecom_invoice a {
            color: #323232;
            text-decoration: none;
        }
        .bi.bi-binoculars-fill, .bi.bi-eye-fill {
            margin-left: 11px;
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