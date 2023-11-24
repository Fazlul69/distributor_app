<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Company;
use App\Models\Missing;
use App\Models\ProductInput;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MissingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail = Detail::first();
        $vendors = Company::all();
        $missings = Missing::all();
        return view('pos.missing.index', compact('vendors', 'missings', 'detail'));
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
            'product_id' => 'required',
            'quantity' => 'required',
            'date' => 'required'
        ]);
        Missing::create($request->all());
        
        return redirect(route('missing.index'));
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
        $detail = Detail::first();

        $missings = Missing::find($id);
        return view('pos.missing.edit',compact('missings', 'detail'));
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
            'product_id' => 'required',
            'quantity' => 'nullable',
        ]);
        $missings = Missing::find($id);
        
        $missings->product_id = $request->product_id;
        $missings->quantity = $request->quantity;

        $missings->save();
        
        return redirect(route('missing.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Missing::find($id)->delete();
        return redirect()->back();
    }

    public function search(Request $request){

        $detail = Detail::first();

        $search_text = $_GET['query'];
        $productinputs = ProductInput::where('product_name','LIKE','%'.$search_text.'%');
        $data = DB::table('damages')
                ->join('product_inputs', 'product_inputs.product_name', '=', 'damages.product_id')
                ->where('product_name','LIKE','%'.$search_text.'%')
                ->get();
        $vendors = Company::all();
        return view('pos.damage.index', compact('vendors', 'detail'))->with('data', $data);
    }
}
