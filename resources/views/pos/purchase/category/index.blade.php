@extends('master')

@section('content')
    <div class="customer">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="mb-25"><a href="{{ route('category.view') }}">Category</a>
                        <button type="button" class="btn btn-default btn-rounded print pull-right" data-bs-toggle="modal"
                            data-bs-target="#customerModal">+ Add Category</button>
                    </h2>
                </div>
            </div>
            <div class="">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Vendor</th>
                                <th scope="col">Category</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->vendor->name ?? null }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>
                                        <a class="svgimg" href="{{ route('category.edit', $category->id) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                                            </svg>
                                        </a>
                                        <form method="POST" id="delete-form-{{ $category->id }}"
                                            action="{{ route('category.delete', $category->id) }}" style="display: none;">
                                            @csrf
                                            {{ method_field('delete') }}
                                        </form>
                                        <button
                                            onclick="if(confirm('Are you sure, You want to delete this?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{ $category->id }}').submit();
                                                }else{
                                                event.preventDefault();
                                                }
                                                "class="btn"
                                            href="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
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

    <!-- customer add modal start -->

    <div class="modal fade" id="customerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="vendor_id" class="form-label">Vendor</label>
                                <select class="form-control" name="vendor_id">
                                    <option value="">Select a Vendor</option>
                                    @foreach ($vendors as $vendor)
                                        <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="category_name" class="form-label">Product Category</label>
                                <input type="text" class="form-control" id="category_name" name="category_name"
                                    placeholder="Category Name" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary done">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- customer modal end -->

    {{-- 
   <style>
       .customer{
           padding-top: 60px;
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
        .table > :not(caption) > * > * {padding: 1.5px 0.5rem;}
        .done {
            margin-top: 10px;
        }
   </style> --}}
@endsection
