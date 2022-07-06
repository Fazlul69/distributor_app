@extends('master')

@section('content')
<div class="missing">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="mb-25"><a href="{{route('missing.index')}}">Missing Product</a> 
                    <button type="button" class="btn btn-default btn-rounded print pull-right" data-bs-toggle="modal" data-bs-target="#missingModal">+ Add Missing</button>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col"></div>
           <div class="col">
                <form class="form-inline" action="{{route('missing.search')}}" method="get">
                    <input class="form-control mr-sm-2" name="query" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
           <div class="col"></div>
        </div>
        <div class="lfGhq">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($missings as $missing)
                    <tr>
                        <td>{{$missing->item->product_name}}</td>
                        <td>{{$missing->quantity}}</td>
                        <td>{{date('d-M-y', strtotime($missing->date))}}</td>
                        <td>
                        <a class="svgimg" href="{{route('missing.edit',$missing->id)}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                                                </svg>
                                            </a>
                                            <form method="POST" id="delete-form-{{$missing->id}}" 
                                                    action="{{route('missing.delete',$missing->id)}}" style="display: none;">
                                                    @csrf
                                                    {{method_field('delete')}}
                                                    
                                            </form>
                                                <button onclick="if(confirm('Are you sure, You want to delete this?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{$missing->id}}').submit();
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

    <!-- Modal -->
    <div class="modal fade" id="missingModal" tabindex="-1" aria-labelledby="missingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="missingModalLabel">Missing Add</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('missing.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="mb-3">
                        <label for="vendor_id" class="form-label">Vendor</label>
                        <select class="form-control damageVendor" name="vendor_id">
                            <option value="">Select a Vendor</option>
                                @foreach($vendors as $vendor)
                                <option value="{{$vendor->id}}">{{$vendor->name}}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category Name</label>
                        <select class="form-control damageProductCat" name="category_id">
                            <option value="">Category</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="product_id" class="form-label">Product Name</label>
                        <select class="form-control damageProduct" name="product_id">
                            <option value="">Product</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="text" class="form-control" id="quantity" name="quantity" >
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" id="date" name="date">
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
        table{margin-top: 30px;}
        .done {
            margin-top: 10px;
        }
</style>
@endsection