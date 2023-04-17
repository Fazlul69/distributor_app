@extends('master')

@section('content')
<div class="collection">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="mb-25"><a href="{{route('collection.index')}}">Daily Collection</a> 
                    <button type="button" class="btn btn-default btn-rounded print pull-right" data-bs-toggle="modal" data-bs-target="#collectionModal">+ Add Collection</button>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col"></div>
           <div class="col">
                <form class="form-inline" action="{{route('collection.search')}}" method="get">
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
                    <th scope="col">Date</th>
                    <th scope="col">Collector Name</th>
                    <th scope="col">Shop Name</th>
                    <th scope="col">Amount</th>
                    <th>Invoice</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($collections as $collection)
                    <tr>
                        <td>{{date('d-M-y', strtotime($collection->date))}}</td>
                        <td>{{$collection->stuff_name}}</td>
                        <td>{{$collection->customer->shop}}</td>
                        <td>{{$collection->amount}}</td>
                        <td>{{$collection->sales_invoice}}</td>
                        <td>
                        @if(auth()->user()->role == 2)
                        @else
                        <a class="svgimg" href="{{route('collection.edit',$collection->id)}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                                                </svg>
                                            </a>
                                            <form method="POST" id="delete-form-{{$collection->id}}" 
                                                    action="{{route('collection.delete',$collection->id)}}" style="display: none;">
                                                    @csrf
                                                    {{method_field('delete')}}
                                                    
                                            </form>
                                                <button onclick="if(confirm('Are you sure, You want to delete this?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{$collection->id}}').submit();
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
    <div class="modal fade" id="collectionModal" tabindex="-1" aria-labelledby="collectionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="collectionModalLabel">Collection Add</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('collection.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" id="date" name="date">
                    </div>
                    
                    <div class="mb-3">
                        <label for="stuff_name" class="form-label">Collector Name</label>
                        <input type="text" class="form-control" id="stuff_name" name="stuff_name" >
                    </div>
                    <div class="mb-3">
                        <label for="customer_id" class="form-label">Shop Name</label>
                        <select class="form-control " name="customer_id">
                            <option value="">Select a Customer</option>
                            @foreach($customers as $customer)
                            <option value="{{$customer->id}}">{{$customer->shop}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="text" class="form-control" id="amount" name="amount" >
                    </div>
                    <div class="mb-3">
                        <label for="sales_invoice" class="form-label">Invoice</label>
                        <input type="text" class="form-control" id="sales_invoice" name="sales_invoice" >
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