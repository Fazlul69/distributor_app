@extends('master')

@section('content')
   <div class="dashbaord">
      <div class="container">
         <div class="row">
            @php
               $p_buy = $productinputs->unique('invoice')->sum('grand_total');
               $p_payed = $productinputs->unique('invoice')->sum('payed');
               $p_due = $p_buy-$p_payed;

               $s_sale = $productsales->unique('invoice')->sum('grand_total');
               $s_payed = $productsales->unique('invoice')->sum('payed');
               $s_due = $s_sale-$s_payed;
            @endphp

            <div class="col-md-2"></div>
            <div class="col-md-4 pur text-center">
               <h3>Purchase Part</h3>
               <p>Total Product Buy: {{$p_buy}} Tk</p>
               <p>Total Payed: {{$p_payed}} tk</p>
               <p>Total Due: {{$p_due}} TK</p>
            </div>
            <div class="col-md-4 sal">
               <h3>Sales Part</h3>
               <p>Total Sale: {{$s_sale}} Tk</p>
               <p>Total Payed by Customer: {{$s_payed}} Tk</p>
               <p>Total Due from Customer: {{$s_due}} Tk</p>
            </div>
            <div class="col-md-2"></div>
         </div>
      </div>
   </div>

@endsection