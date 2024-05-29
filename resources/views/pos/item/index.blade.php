@extends('master')

@section('content')
    <div class="items">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="mb-25"><a href="{{route('item.view')}}">All Product</a> 
                        <button type="button" class="btn btn-default btn-rounded print pull-right" data-bs-toggle="modal" data-bs-target="#itemModal">+ Add Item</button>
                    </h2>
                </div>
            </div>
            <div class="row">
               <div class="col">
                    <form class="form-inline search justify-content-center" action="{{route('items.search')}}" method="get">
                        <div class="row">
                            <div class="col"><input class="form-control mr-sm-2" name="query" type="text" placeholder="Product Name" aria-label="Search"></div>
                        </div>
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg></button>
                    </form>
               </div>
           </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">Vendor</th>
                    <th scope="col">Category</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">DP</th>
                    <th scope="col">TP</th>
                    <th scope="col">Discount Price</th>
                    <th scope="col">MRP</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                    <tr>
                    <td>{{$item->vendor->name ?? null}}</td>
                    <td>{{$item->category->category_name ?? null }}</td>
                    <td>{{$item->product_name}}</td>
                    @if(auth()->user()->role == 2)
                    <td>0</td>
                    @else
                    <td>{{$item->dp}}</td>
                    @endif
                    <td>{{$item->tp}}</td>
                    <td>{{$item->discount_price}}</td>
                    <td>{{$item->mrp}}</td>
                    <td>
                    @if(auth()->user()->role == 2)
                    @else
                    <a class="svgimg" href="{{route('items.edit',$item->id)}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                            </svg>
                    </a>
                    
                                            <form method="POST" id="delete-form-{{$item->id}}" 
                                                    action="{{route('items.delete',$item->id)}}" style="display: none;">
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
                                                @endif
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="itemModal" tabindex="-1" aria-labelledby="itemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="itemModalLabel">Add New Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('item.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="vendor_id" class="form-label">Vendor</label>
                        <select class="form-control productVendor" name="vendor_id">
                            <option value="">Select a Vendor</option>
                            @foreach($vendors as $vendor)
                            <option value="{{$vendor->id}}">{{$vendor->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Category</label>
                        <select class="form-control productCategory" name="category_id">
                        <option value="">Category</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="product_name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name"required>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="dp" class="form-label">DP</label>
                            <input type="text" class="form-control" id="dp" name="dp">
                        </div>
                        <div class="col">
                            <label for="tp" class="form-label">TP</label>
                            <input type="text" class="form-control" id="tp" name="tp">
                        </div>
                        <div class="col">
                            <label for="discount_price" class="form-label">Discount Price</label>
                            <input type="text" class="form-control" id="discount_price" name="discount_price">
                        </div>
                        <div class="col">
                            <label for="mrp" class="form-label">MRP</label>
                            <input type="text" class="form-control" id="mrp" name="mrp">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary done">Submit</button>
                </form>
            </div>
        </div>
    </div>
    </div>

    <style>
        .items{
           /* padding-top: 20px; */
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
        table{margin-top: 30px;}
        .done {
            margin-top: 10px;
        }
    </style>
@endsection