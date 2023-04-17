<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductInput;
use App\Models\ProductSale;
use App\Models\Vendor;
use App\Models\Damage;
use App\Models\Item;
use App\Models\Company;
use App\Models\Missing;
use App\Models\Replace;
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
        $productsales = ProductSale::all();
        $vendors = Company::all();
        $damages = Damage::all();
        $items = Item::all();
        $items = Item::paginate(15);
        $missings = Missing::all();
        $replaces = Replace::all();
        return view('pos.stock.index', compact('productinputs', 'productsales', 'vendors', 'damages', 'missings','replaces'))->with('items', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
        $search_text = $_GET['query'];
        $items = Item::where('product_name','LIKE','%'.$search_text.'%')
        ->paginate(15);
        $productinputs = ProductInput::all();
        $productsales = ProductSale::all();
        $vendors = Company::all();
        $missings = Missing::all();
        $damages = Damage::all();
        $replaces = Replace::all();
        return view('pos.stock.index')->with('productinputs',$productinputs)
                ->with('vendors',$vendors)
                ->with('items',$items)
                ->with('missings',$missings)
                ->with('productsales',$productsales)
                ->with('damages',$damages)
                ->with('replaces', $replaces);
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

    //stock details
    public function details()
    {
        $productinputs = ProductInput::all();
        $vendors = Company::all();
        $items = Item::all();
        return view('pos.stock.index_two', compact('productinputs', 'vendors', 'items'));
    }

    public function detailsSearch(Request $request)
    {
        $search_text = $_GET['query'];
        $productinputs = ProductInput::where('product_name','LIKE','%'.$search_text.'%')
                    ->join('companies', 'product_inputs.vendor_id', '=', 'companies.id')
                    ->join('items', 'product_inputs.product_id', '=', 'items.product_name')
                    ->orWhere('companies.name','LIKE','%'.$search_text.'%')
                    ->orWhere('items.product_name','LIKE','%'.$search_text.'%')
                    ->paginate(15);
        $items = Item::all();
        $vendors = Company::all();
        return view('pos.stock.index_two')->with('productinputs',$productinputs)
                ->with('vendors',$vendors)
                ->with('items',$items);
    }
}
