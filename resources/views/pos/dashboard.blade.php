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

            <div class="col-md-6">
               <div class="ledger">
                  <h3>Ledger Generate</h3>
                  <div class="lDeqw">
                     <div class="row phide">
                        <div class="col-md-6">
                           <div class="row">
                              <div class="col">
                                 <label for="">Year</label>
                                 <label for=""></label>
                                 <label for="">Month</label>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col">
                                 <select class="year" name="" id="">
                                    <option value="">Select Year</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                    <option value="2031">2031</option>
                                    <option value="2032">2032</option>
                                    <option value="2033">2033</option>
                                    <option value="2034">2034</option>
                                    <option value="2035">2035</option>
                                    <option value="2036">2036</option>
                                    <option value="2037">2037</option>
                                    <option value="2038">2038</option>
                                    <option value="2039">2039</option>
                                    <option value="2040">2040</option>
                                    <option value="2041">2041</option>
                                 </select>
                                 <input type="text" class="yearstore hide">
                                 <select class="month" name="" id="">
                                    <option value="">Select Month</option>
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">Jun</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <button class="cal cal_generate">Calculate</button>
                        </div>
                        <div class="col-md-3">
                           <a href="#" class="printbtn" onClick="window.print()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill " viewBox="0 0 16 16">
                           <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                           <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                           </svg>Print</a>
                        </div>
                     </div>
                    
                     <div class="printable">
                        <div class="row">
                           <table class="table table-bordered lg_table">
                              <thead>
                                 <tr>
                                    <th>Date</th>
                                    <th>Particulars</th>
                                    <th>Invoice No</th>
                                    <th>Debit</th>
                                    <th>Credit</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 
                              </tbody>
                           </table>
                        </div>
                        <div class="row calculationPart">
                           <p class="pBalance hide"></p>
                           <p class="cBalance hide"></p>
                           <p class="exBalance hide"></p>
                           <p class="repBalance hide"></p>
                           <div class="col"></div>
                           <div class="col">
                           <p class="finalBalance"></p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="row phide">
                  <div class="col-md-6 pur text-center">
                     <h3>Purchase Part</h3>
                     <p>Total Product Buy: {{$p_buy}} Tk</p>
                     <p>Total Payed: {{$p_payed}} tk</p>
                     <p>Total Due: {{$p_due}} TK</p>
                  </div>
                  <div class="col-md-6 sal">
                     <h3>Sales Part</h3>
                     <p>Total Sale: {{$s_sale}} Tk</p>
                     <p>Total Payed by Customer: {{$s_payed}} Tk</p>
                     <p>Total Due from Customer: {{$s_due}} Tk</p>
                  </div>
               </div>
            </div>
            
         </div>
         <div class="row">
            
         </div>
      </div>
   </div>

   <style>
      .table{
         margin-top: 20px;
      }
      .hide{display: none;}
      .cal{
         margin-top: 26px;
         border-radius: 7px;
         padding: 2px 7px;
      }
      .finalBalance {
        margin-left: 120px;
      }
      .printbtn{
         color: #000;
         border: 1px solid #3233;
         padding: 7px 30px !important;
         border-radius: 6px;
         display: flex;
         margin-top: 18px;
      }
      .bi.bi-printer-fill {
         margin-top: 4px;
      }
      @media print
      {
         .phide, footer{display: none;}
         .content-wrapper .dashbaord .container .row {
            text-align: center;
            width: 140% !important;
         }
         .ledger h3 {
            margin-left: 300px;
         }
         table th, table td{
            border: 1px solid #000;
         }
      }
   </style>

@endsection