<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Expense;
use App\Models\Replace;
use App\Models\Collection;
use App\Models\ProductSale;
use App\Models\ProductInput;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail = Detail::first();
        $expenses = Expense::all();
        $collections = Collection::all();
        $productinputs = ProductInput::all();
        $productsales = ProductSale::all();
        return view('pos.dashboard', compact('productinputs','productsales','collections','expenses', 'detail'));
    }

    public function getdata(Request $request)
    {
        $data = ProductInput::distinct()->select('date','invoice','grand_total')
                ->whereYear('date', $request->year)
                ->whereMonth('date', $request->month)
                // ->where('date',$request->id)
                ->get();
    	return response()->json($data);
    }
    
    public function getcollection(Request $request)
    {
        $data = Collection::distinct()->select('date','sales_invoice','amount')
                ->whereYear('date', $request->year)
                ->whereMonth('date', $request->month)
                // ->where('date',$request->id)
                ->get();
    	return response()->json($data);
    }

    public function getexpense(Request $request)
    {
        $data = Expense::distinct()->select('date','details','amount')
                ->whereYear('date', $request->year)
                ->whereMonth('date', $request->month)
                // ->where('date',$request->id)
                ->get();
    	return response()->json($data);
    }

    public function getreplace(Request $request)
    {
        $data = Replace::distinct()->select('date','amount')
                ->whereYear('date', $request->year)
                ->whereMonth('date', $request->month)
                // ->where('date',$request->id)
                ->get();
    	return response()->json($data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
