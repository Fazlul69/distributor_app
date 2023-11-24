<?php

namespace App\Http\Controllers\Ecom;

use App\Models\Detail;
use App\Models\Product;
use App\Models\Ecomsale;
use App\Models\SubCategory;
use App\Models\EcomCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail = Detail::first();
        $ecomsales = Ecomsale::all();
        return view('ecom.invoice.index', compact('ecomsales', 'detail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detail = Detail::first();
        $ecomcategories = EcomCategory::all();
        return view('ecom.invoice.create', compact('ecomcategories', 'detail'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach($request->category_id as $key => $category_id)
        {
            $input = new Ecomsale();
            $input->brand = "0";
            $input->customer_name = $request->customer_name[0];
            $input->customer_mobile = $request->customer_mobile[0];
            $input->invoice = $request->invoice[0];
            $input->date = $request->date[0];
            $input->product_id = $request->product_id[$key]; 
            $input->quantity = $request->quantity[$key];
            $input->total = $request->total[$key];
            $input->grand_total = $request->grand_total;
            $input->grand_discount = $request->grand_discount;
            $input->payed = $request->payed;
            $input->due = $request->due;
            $input->save(); 
        }
        return redirect(route('ecom_invoice.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($invoice)
    {
        $detail = Detail::first();
        $ecomsales = Ecomsale::where([['invoice', '=', $invoice]])->get();
        return view('ecom.invoice.view', compact('ecomsales', 'detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail = Detail::first();
        $ecomsales = Ecomsale::find($id);
        return view('ecom.invoice.edit', compact('ecomsales', 'detail'));
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
        $ecomsales = Ecomsale::find($id);
        
        $ecomsales->payed = $request->payed;
        $ecomsales->due = $request->due;

        $ecomsales->save();
        
        return redirect(route('ecom_invoice.index'));
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

    public function ecomCategory(Request $request)
    {
        $data = SubCategory::distinct()->select('subcategory_name', 'id')->where('category_id',$request->id)->take(100)->get();
        return response()->json($data);
    }

    public function ecomSubCategory(Request $request)
    {
        $data = Product::distinct()->select('product_name', 'id')->where('subcategory_id',$request->id)->take(100)->get();
        return response()->json($data);
    }
    
    public function ecomproductsellprice(Request $request)
    {
        $data = Product::distinct()->select('sell')->where('id',$request->id)->first();
        return response()->json($data);
    }

    public function ecomproductquantity(Request $request)
    {
        $data = Product::distinct()->select('quantity')->where('id',$request->id)->first();
        return response()->json($data);
    }

    public function ecomsalequantity(Request $request)
    {
        $data = DB::table('ecomsales')->where('product_id',$request->id)->sum('quantity');
    	return response()->json($data);
    }


}
