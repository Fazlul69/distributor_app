@extends('master')

@section('content')

    <div class="container category-edit">
        <p><a href="{{route('category.view')}}">Category</a> / <a href="">Edit Category</a></p>
        <div class="col-sm-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <form action="{{route('category.update',$categories->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="mb-3">
                                <label for="category_name" class="form-label">Category Name</label>
                                <input type="text" class="form-control" id="category_name" name="category_name" value="{{$categories->category_name}}">
                            </div>
                            <button type="submit" class="btn btn-primary done">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .category-edit{padding-top: 20px;}
        .category-edit p{
            margin-left: 10px;
        }
        .category-edit a {
            color: #323232;
            text-decoration: none;
        }
        .done{margin-top: 10px;}
    </style>

@endsection