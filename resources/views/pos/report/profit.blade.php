@extends('master')

@section('content')
    <div class="profit">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="mb-25">Profit &amp; Loss 
                        <a href="#" class="btn btn-default btn-rounded print pull-right">
                            <i class="fa fa-print"></i> Print 
                        </a>
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <style>
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
            color: #444;
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