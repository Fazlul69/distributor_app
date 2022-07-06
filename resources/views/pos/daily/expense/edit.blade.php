@extends('master')

@section('content')

    <div class="container expense-edit">
        <p><a href="{{route('expense.index')}}">Back</a> / <a href="#">Expense Edit</a></p>
        <div class="col-sm-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <form action="{{route('expense.update',$expenses->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="details" class="form-label">Details</label>
                            <input type="text" class="form-control" id="details" name="details" value="{{$expenses->details}}" >
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="text" class="form-control" id="amount" name="amount" value="{{$expenses->amount}}">
                        </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .expense-edit{padding-top: 20px;}
        .expense-edit p{
            margin-left: 10px;
        }
        .expense-edit a {
            color: #323232;
            text-decoration: none;
        }
    </style>

@endsection