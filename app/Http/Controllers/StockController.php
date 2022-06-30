<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductInput;
use App\Models\ProductSale;
use App\Models\Vendor;
use App\Models\Damage;
use App\Models\Item;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productinputs = ProductInput::all();
        $productinputs = ProductInput::paginate(10);
        $productsales = ProductSale::all();
        $vendors = Vendor::all();
        $damages = Damage::all();
        $items = Item::all();
        return view('pos.stock.index', compact('productinputs', 'productsales', 'vendors', 'damages'))->with('items', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
        $search_text = $_GET['query'];
        $productinputs = ProductInput::where('product_name','LIKE','%'.$search_text.'%')
                    ->join('vendors', 'product_inputs.vendor_id', '=', 'vendors.id')
                    ->orWhere('vendors.name','LIKE','%'.$search_text.'%')
                    ->paginate(15);
        $productsales = ProductSale::where('product_id','LIKE','%'.$search_text.'%')
                    ->paginate(15);
        $vendors = Vendor::all();
        $damages = Damage::where('product_id','LIKE','%'.$search_text.'%')
                    ->paginate(15);
        return view('pos.stock.index')->with('productinputs',$productinputs)
                ->with('vendors',$vendors)
                ->with('productsales',$productsales)
                ->with('damages',$damages);
    }
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
