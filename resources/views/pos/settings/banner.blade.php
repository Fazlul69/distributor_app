@extends('master')

@section('content')
<div class="replace">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="mb-25"><a href="{{route('banner.index')}}">Website Carousel</a> 
                    {{-- <button type="button" class="btn btn-default btn-rounded print pull-right" data-bs-toggle="modal" data-bs-target="#replaceModal">+ Add Replace</button> --}}
                </h2>
            </div>
        </div>
        @include('pos.message.message')
        <div class="row">
            <form action="{{route('banner.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Carousel</label>
                            <input type="file" class="form-control" name="image" id="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Serial No.</label>
                            <input type="text" class="form-control" name="serial" id="" placeholder="1,2 or 3">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5"></div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-success w-100">Save</button>
                    </div>
                    <div class="col-md-5"></div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <table class="table table-primary">
                    <thead>
                        <th>Serial</th>
                        <th>Image</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($banners as $banner)
                            <tr>
                                <td>{{$banner->serial}}</td>
                                <td><img src="{{asset('banner/'. $banner->image)}}" alt="" height="200px"></td>
                                <td>
                                    <form action="{{route('banner.delete', $banner->id)}}" method="post">
                                        @csrf
                                        {{method_field('delete')}}
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash" style="color: danger"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-2"></div>
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