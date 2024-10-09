@extends('master')

@section('content')
   <div class="supplier global">
       <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="mb-25"><a href="{{route('supplier.view')}}">Supplies</a> 
                        <button type="button" class="btn btn-default btn-rounded print pull-right" data-bs-toggle="modal" data-bs-target="#supplierModal">+ Add Suppliers</button>
                    </h2>
                </div>
           </div>
           <div class="row">
               <div class="col">
                    <form class="form-inline search justify-content-center" action="{{route('supplier.search')}}" method="get">
                        <div class="row">
                            <div class="col"><input class="form-control mr-sm-2" name="query" type="text" placeholder="Mobile No" aria-label="Search"></div>
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
                            <th scope="col">#</th>
                            <th scope="col">Supplier Name</th>
                            <th scope="col">Supplier Mobile No</th>
                            <th scope="col">Supplier Email</th>
                            <th scope="col">Vendor</th>
                            <th scope="col">Payed</th>
                            <th scope="col">Due</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($suppliers as $supplier)
                            <tr>
                                <th scope="row">{{$supplier->id}}</th>
                                <td>{{$supplier->supplier_name}}</td>
                                <td>{{$supplier->supplier_mobile_no}}</td>
                                <td>{{$supplier->supplier_email}}</td>
                                <td>{{optional($supplier->vendors)->name}}</td>
                                <td>{{$supplier->payed}}</td>
                                <td>{{$supplier->due}}</td>
                                <td>
                                <a class="svgimg" href="{{route('supplier.edit',$supplier->id)}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                                                </svg>
                                            </a>
                                            <form method="POST" id="delete-form-{{$supplier->id}}" 
                                                    action="{{route('supplier.delete',$supplier->id)}}" style="display: none;">
                                                    @csrf
                                                    {{method_field('delete')}}
                                                    
                                                </form>
                                                <button onclick="if(confirm('Are you sure, You want to delete this?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{$supplier->id}}').submit();
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

   <!-- supplier add modal start -->
 
    <div class="modal fade" id="supplierModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Supplier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('supplier.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label for="supplier_name" class="form-label">Supplier Name</label>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                                <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
                                </svg>
                                <input type="text" class="form-control" id="supplier_name" name="supplier_name" placeholder="Supplier Name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="supplier_mobile_no" class="form-label">Mobile No</label>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                                <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
                                </svg>
                                <input type="text" class="form-control" id="supplier_mobile_no" name="supplier_mobile_no" placeholder="Mobile No">
                            </div>
                            <div class="col-md-6">
                                <label for="supplier_email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="supplier_email" name="supplier_email" placeholder="Email">
                            </div>
                            <div class="col-md-6">
                                <label for="vendor_id" class="form-label">Vendor</label>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                                <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
                                </svg>
                                <select class="form-control" name="vendor_id" required>
                                    <option value="">Select a Vendor</option>
                                        @foreach($vendors as $vendor)
                                            <option value="{{$vendor->id}}">{{$vendor->name}}</option>
                                        @endforeach
                                </select>
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

   <!-- supplier modal end -->

@endsection