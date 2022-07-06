@extends('master')

@section('content')

    <div class="container collection-edit">
        <p><a href="{{route('collection.index')}}">Back</a> / <a href="#">Collection Edit</a></p>
        <div class="col-sm-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <form action="{{route('collection.update',$collections->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="stuff_name" class="form-label">Collector Name</label>
                            <input type="text" class="form-control" id="stuff_name" name="stuff_name" value="{{$collections->stuff_name}}" >
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="text" class="form-control" id="amount" name="amount"  value="{{$collections->amount}}">
                        </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .missing-edit{padding-top: 20px;}
        .missing-edit p{
            margin-left: 10px;
        }
        .missing-edit a {
            color: #323232;
            text-decoration: none;
        }
    </style>

@endsection