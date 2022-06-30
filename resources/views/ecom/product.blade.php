@extends('master')
@section('content')
    <div class="product">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="mb-25"><a href="{{route('product.index')}}">Products</a> 
                        <button type="button" class="btn btn-default btn-rounded print pull-right" data-bs-toggle="modal" data-bs-target="#productModal">+ Add Product</button>
                    </h2>
                </div>
            </div>
            <div class="">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">Subcategory</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Buy Price</th>
                            <th scope="col">Sell Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Image</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $item)
                            <tr>
                            <td>{{$item->subcategory_id}}</td>
                            <td>{{$item->brand}}</td>
                            <td>{{$item->product_name}}</td>
                            <td>{{$item->description}}</td>
                            <td>{{$item->buy}}</td>
                            <td>{{$item->sell}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->image}}</td>
                            <td>
                            <a class="svgimg" href="{{route('product.edit',$item->id)}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                                                </svg>
                                            </a>
                                            <form method="POST" id="delete-form-{{$item->id}}" 
                                                    action="{{route('product.delete',$item->id)}}" style="display: none;">
                                                    @csrf
                                                    {{method_field('delete')}}
                                                    
                                                </form>
                                                <button class="guYhj" onclick="if(confirm('Are you sure, You want to delete this?')){
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

        <!-- Modal -->
        <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Add New Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-control productcat" name="category">
                                <option value="">Select a category</option>
                                @foreach($ecomcategories as $item)
                                <option value="{{$item->id}}">{{$item->category_name}}</option>
                                @endforeach
                                </select>
                        </div>
                        <div class="col">
                            <label for="subcategory_id" class="form-label">Subcategory</label>
                            <select class="form-control productSub" name="subcategory_id">
                                <option value="">Select a category</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="brand" class="form-label">Brand Name</label>
                            <input type="text" class="form-control" id="brand" name="brand">
                        </div>
                        <div class="col">
                            <label for="product_name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="product_name" name="product_name">
                        </div>
                        <div class="col">
							<label for="image" class="col-sm-3 col-form-label">Image</label>
							<input type="file" name="image" id="fileToUpload">
						</div>
                        <div class="col">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" id="description" name="description">
                        </div>
                        <div class="row">
                        <div class="col">
                            <label for="buy" class="form-label">Buy Price</label>
                            <input type="text" class="form-control" id="buy" name="buy">
                        </div>
                        <div class="col">
                            <label for="sell" class="form-label">Sell Price</label>
                            <input type="text" class="form-control" id="sell" name="sell">
                        </div>
                        </div>
                        <div class="col">
                            <label for="quantity" class="form-label">quantity</label>
                            <input type="text" class="form-control" id="quantity" name="quantity">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        </div>

    </div>

    <style>
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
    </style>
@endsection