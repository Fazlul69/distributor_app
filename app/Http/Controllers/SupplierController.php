<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Vendor;
use App\Models\Company;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::all();
        $vendors = Company::all();
        return view('pos.purchase.supplier.index')->with('suppliers', $suppliers)
                                        ->with('vendors', $vendors);
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
        $this->validate($request,[
            'supplier_name' => 'required',
            'supplier_mobile_no' => 'required',
            'supplier_email' => 'nullable',
            'vendor_id' => 'required',
            'payed' => 'nullable',
            'due' => 'nullable',
        ]);
        Supplier::create($request->all());
        
        return redirect(route('supplier.view'));
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
        $suppliers = Supplier::find($id);
        $vendors = Company::all();
        return view('pos.purchase.supplier.edit',compact('suppliers'))->with('vendors', $vendors);
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
        // $this->validate($request,[
        //     'supplier_name' => 'required',
        //     'supplier_mobile_no' => 'required',
        //     'supplier_email' => 'nullable',
        //     'payed' => 'nullable',
        //     'due' => 'nullable',
        // ]);
        $suppliers = Supplier::find($id);
        
        $suppliers->supplier_name = $request->supplier_name;
        $suppliers->supplier_mobile_no = $request->supplier_mobile_no;
        $suppliers->supplier_email = $request->supplier_email;
        $suppliers->payed = $request->payed;
        $suppliers->due = $request->due;

        $suppliers->save();
        
        return redirect(route('supplier.view'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Supplier::find($id)->delete();
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $search_text = $_GET['query'];

        $suppliers = Supplier::where('supplier_name','LIKE','%'.$search_text.'%')
                    ->orWhere('supplier_mobile_no','LIKE','%'.$search_text.'%')
                    ->paginate(120);
        $vendors = Company::where('name','LIKE','%'.$search_text.'%')
                    ->paginate(120);
        return view('pos.purchase.supplier.index')->with('suppliers',$suppliers)
                ->with('vendors',$vendors);
    }
}
