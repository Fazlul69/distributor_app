@extends('master')

@section('content')
   <div class="customer">
       <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="mb-25"><a href="{{route('customer.view')}}">Customers</a> 
                        <button type="button" class="btn btn-default btn-rounded print pull-right" data-bs-toggle="modal" data-bs-target="#customerModal">+ Add Customer</button>
                    </h2>
                </div>
            </div>
           <div class="row">
               <div class="col"></div>
               <div class="col">
                    <form class="form-inline" action="{{route('cus.search')}}" method="get">
                        <input class="form-control mr-sm-2" name="query" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
               </div>
               <div class="col"></div>
           </div>
           <div class="">
               <div class="card-body">
                <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Customer Mobile No</th>
                            <th scope="col">Shop Name</th>
                            <th scope="col">Customer Email</th>
                            <th scope="col">cus_address</th>
                            <th scope="col">Payed</th>
                            <th scope="col">Due</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $customer)
                            <tr>
                                <th scope="row">{{$customer->id}}</th>
                                <td>{{$customer->customer_name}}</td>
                                <td>{{$customer->cus_mobile}}</td>
                                <td>{{$customer->shop}}</td>
                                <td>{{$customer->cus_email}}</td>
                                <td>{{$customer->cus_address}}</td>
                                <td>{{$customer->payed}}</td>
                                <td>{{$customer->due}}</td>
                                <td>
                                <a class="svgimg" href="{{route('customer.edit',$customer->id)}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                                                </svg>
                                            </a>
                                            <form method="POST" id="delete-form-{{$customer->id}}" 
                                                    action="{{route('customer.delete',$customer->id)}}" style="display: none;">
                                                    @csrf
                                                    {{method_field('delete')}}
                                                    
                                                </form>
                                                <button onclick="if(confirm('Are you sure, You want to delete this?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{$customer->id}}').submit();
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
       <div class="pagination">
            <span>{{$customers->links()}}</span>
        </div> 
   </div>

   <!-- customer add modal start -->
 
    <div class="modal fade" id="customerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('customer.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label for="customer_name" class="form-label">Customer Name</label>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                                <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
                                </svg>
                                <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Customer Name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="cus_mobile" class="form-label">Mobile No</label>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                                <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
                                </svg>
                                <input type="text" class="form-control" id="cus_mobile" name="cus_mobile" placeholder="Mobile No" required>
                            </div>
                            <div class="col-md-6">
                                <label for="shop" class="form-label">Shop Name</label>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                                <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
                                </svg>
                                <input type="text" class="form-control" id="shop" name="shop" placeholder="Shop Name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="cus_email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="cus_email" name="cus_email" placeholder="Email">
                            </div>
                            <div class="col-md-6">
                                <label for="cus_address" class="form-label">Address</label>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                                <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
                                </svg>
                                <input type="text" class="form-control" id="cus_address" name="cus_address" placeholder="Address" required>
                            </div>
                            <div class="col-md-6">
                                <label for="payed" class="form-label">Payed</label>
                                <input type="text" class="form-control" id="payed" name="payed" placeholder="Tk">
                            </div>
                            <div class="col-md-6">
                                <label for="due" class="form-label">Due</label>
                                <input type="text" class="form-control" id="due" name="due" placeholder="Due in Tk">
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary done">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

   <!-- customer modal end -->


   <style>
       .customer{
           padding-top: 20px;
       }
       .card{
           margin-top: 40px;
       }
       .btn-success{
           /* margin-top: -45px; */
           float: right;
       }
       .btn-success:focus {
            border-color: #fff;
            box-shadow: none;
        }
        h2 a,a:hover{
            color: #455a64;
        }
        .form-control:focus {
            box-shadow: none;
        }
        .pull-right {
            float: right;
            padding: 10px 18px !important;
            background-color: #fff;
            border: 2px solid #ddd !important;
            color: #455a64 !important;
            border-radius: 60px !important;
        }
        .mb-25 {
            line-height: 36px;
            font-size: 24px;
            color: #444 !important;
            font-weight: 600;
            margin-top: 11px;
        }
        .btn.btn-default.btn-rounded.print.pull-right:hover {
            background: #fafafa;
            border: 2px solid #136acd !important;
            color: #2568ef !important;
        }
        .done {
            margin-top: 10px;
        }
        .bi.bi-asterisk {
            margin-left: 0px;
            width: 7px;
            color: #ea1717;
            margin-top: -5px;
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