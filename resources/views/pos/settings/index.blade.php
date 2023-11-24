@extends('master')

@section('content')
<div class="replace">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="mb-25"><a href="{{route('settings.index')}}">Settings</a> 
                    {{-- <button type="button" class="btn btn-default btn-rounded print pull-right" data-bs-toggle="modal" data-bs-target="#replaceModal">+ Add Replace</button> --}}
                </h2>
            </div>
        </div>
        @include('pos.message.message')
     
        @if(empty($details))
        <form action="{{route('settings.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Website Logo</label>
                        <input type="file" class="form-control" name="website_logo" id="">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Company Name</label>
                        <input type="text" class="form-control" name="company_name" id="" placeholder="Company Name">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" id="" placeholder="Address">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Mobile 1</label>
                        <input type="text" class="form-control" name="mobile_1" id="" placeholder="First Mobile No.">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Mobile 2</label>
                        <input type="text" class="form-control" name="mobile_2" id="" placeholder="Second Mobile No.">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Facebook Link</label>
                        <input type="text" class="form-control" name="facebook_link" id="" placeholder="Facebook Link">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Dashboard Logo</label>
                        <input type="file" class="form-control" name="dashboard_logo" id="">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Login Logo</label>
                        <input type="file" class="form-control" name="login_logo" id="">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email 1</label>
                        <input type="email" class="form-control" name="email_1" id="" placeholder="First Email">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email 2</label>
                        <input type="email" class="form-control" name="email_2" id="" placeholder="Second Email">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Whatsapp Link</label>
                        <input type="text" class="form-control" name="whatsapp_link" id="" placeholder="Whatsapp Link">
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
        @else
        @foreach ($details as $detail)    
        <form action="{{route('settings.update', $detail->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    
                    <div class="mb-3">
                        <label for="" class="form-label">Current Website Logo</label>
                        <img src="{{ asset('details/' . $detail->website_logo) }}" class="rounded" alt="Logo" width="60px" height="60px">
                    </div>
                
                    <div class="mb-3">
                        <label for="" class="form-label">New Website Logo</label>
                        <input type="file" class="form-control" name="website_logo" id="">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Company Name</label>
                        <input type="text" class="form-control" name="company_name" id="" placeholder="Company Name" value="{{$detail->company_name}}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" id="" placeholder="Address" value="{{$detail->address}}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Mobile 1</label>
                        <input type="text" class="form-control" name="mobile_1" id="" placeholder="First Mobile No." value="{{$detail->mobile_1}}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Mobile 2</label>
                        <input type="text" class="form-control" name="mobile_2" id="" placeholder="Second Mobile No." value="{{$detail->mobile_2}}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Facebook Link</label>
                        <input type="text" class="form-control" name="facebook_link" id="" placeholder="Facebook Link" value="{{$detail->facebook_link}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Current Dashboard Logo</label>
                        <img src="{{asset('details/'. $detail->dashboard_logo)}}" class="rounded" alt="Logo" width="60px" height="60px">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">New Dashboard Logo</label>
                        <input type="file" class="form-control" name="dashboard_logo" id="">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Current Login Logo</label>
                        <img src="{{asset('details/'. $detail->login_logo)}}" class="rounded" alt="Logo" width="60px" height="60px">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">New Login Logo</label>
                        <input type="file" class="form-control" name="login_logo" id="">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email 1</label>
                        <input type="email" class="form-control" name="email_1" id="" placeholder="First Email" value="{{$detail->email_1}}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email 2</label>
                        <input type="email" class="form-control" name="email_2" id="" placeholder="Second Email" value="{{$detail->email_2}}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Whatsapp Link</label>
                        <input type="text" class="form-control" name="whatsapp_link" id="" placeholder="Whatsapp Link" value="{{$detail->whatsapp_link}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-success w-100">Update</button>
                </div>
                <div class="col-md-5"></div>
            </div>
        </form>
        @endforeach
        @endif
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