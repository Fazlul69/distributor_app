<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Company;
use App\Models\Replace;
use Illuminate\Http\Request;

class ReplaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail = Detail::first();
        $replaces = Replace::all();
        $vendors = Company::all();
        return view('pos.replace.index', compact('replaces', 'vendors', 'detail'));
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
            'shop_name' => 'required',
            'invoice' => 'required',
            'vendor_id' => 'required',
            'product_id' => 'required',
            'sales_return' => 'required',
            'amount' => 'required',
            'date' => 'required',
        ]);
        Replace::create($request->all());
        
        return redirect(route('replace.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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

        $replaces = Replace::find($id);
        return view('pos.replace.edit',compact('replaces', 'detail'));
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
        $this->validate($request,[
            'sales_return' => 'nullable',
            'amount' => 'nullable',
        ]);
        $replaces = Replace::find($id);
        
        $replaces->sales_return = $request->sales_return;
        $replaces->amount = $request->amount;

        $replaces->save();
        
        return redirect(route('replace.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Replace::find($id)->delete();
        return redirect()->back();
    }
}
