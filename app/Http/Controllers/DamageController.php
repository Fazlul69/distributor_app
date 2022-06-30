<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\ProductInput;
use App\Models\Damage;
use App\Models\Item;
use Illuminate\Support\Facades\DB;

class DamageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $damages = Damage::all();
        $vendors = Vendor::all();
        $productinputs = ProductInput::all();
        return view('pos.damage.index', compact('damages', 'vendors', 'productinputs'));
    }

    public function findDamageProduct(Request $request)
    {
        $productinputs=Item::select('product_name', 'id')->where('vendor_id',$request->id)->take(100)->get();
    	return response()->json($productinputs);
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
        Damage::create($request->all());
        
        return redirect(route('damage.index'));
    }

    public function search(Request $request){
        $search_text = $_GET['query'];
        $damages = Damage::all();
        $productinputs = ProductInput::where('product_name','LIKE','%'.$search_text.'%');
        $data = DB::table('damages')
                ->join('product_inputs', 'product_inputs.product_name', '=', 'damages.product_id')
                ->where('product_name','LIKE','%'.$search_text.'%')
                ->get();
        $vendors = Vendor::all();
        return view('pos.damage.index', compact('vendors'))->with('damages',$damages)->with('data', $data);
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
        $damages = Damage::find($id);
        return view('pos.damage.edit',compact('damages'));
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
        $damages = Damage::find($id);
        
        $damages->product_id = $request->product_id;
        $damages->quantity = $request->quantity;

        $damages->save();
        
        // Session::flash('success','Data insert successfully');
        return redirect(route('damage.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Damage::find($id)->delete();
        return redirect()->back();
    }
}
