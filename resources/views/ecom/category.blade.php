@extends('master')
@section('content')
    <div class="container cat">
        <button class="btn btn-success cat_btn" data-bs-toggle="modal" data-bs-target="#catModal">Add Category</button>
        <button class="btn btn-success cat_btn" data-bs-toggle="modal" data-bs-target="#subcatModal">Add Subcategory</button>
        <div class="card">
            <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Category</th>
                    <th scope="col">Subcategory</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subcategories as $item)
                            <tr>
                                <td>{{ $item->ecomcategory->category_name}}</td>
                                <td>{{$item->subcategory_name}}</td>
                            </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>

        <!-- category Modal -->
        <div class="modal fade" id="catModal" tabindex="-1" aria-labelledby="catModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="catModalLabel">Add New Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('ecomcat.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="mb-3">
                                <label for="category_name" class="form-label">Category Name</label>
                                <input type="test" class="form-control" id="category_name" name="category_name" placeholder="Category Name">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- subcategory Modal -->
        <div class="modal fade" id="subcatModal" tabindex="-1" aria-labelledby="subcatModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="subcatModalLabel">Add New Subcategory</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('ecomcat.substore')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="col">
                                <label for="category_id" class="form-label">Category</label>
                                <select class="form-control" name="category_id">
                                    <option value="">Select a Category</option>
                                        @foreach($ecomcategories as $item)
                                        <option value="{{$item->id}}">{{$item->category_name}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="subcategory_name" class="form-label">Sub Category</label>
                                <input type="test" class="form-control" id="subcategory_name" name="subcategory_name" placeholder="SubCategory Name">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <style>
        .cat_btn{margin-top: 30px;margin-bottom: 20px;}
    </style>
@endsection