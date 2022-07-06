<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\ProductInput;
use App\Models\Damage;
use App\Models\Item;
use App\Models\Company;
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
        $vendors = Company::all();
        $productinputs = ProductInput::all();
        return view('pos.damage.index', compact('damages', 'vendors', 'productinputs'));
    }

    public function findDamageProductCat(Request $request)
    {
        $items=Category::select('category_name', 'id')->where('vendor_id',$request->id)->take(100)->get();
    	return response()->json($items);
    }
    public function findDamageProduct(Request $request)
    {
        $data=Item::select('product_name', 'id')->where('category_id',$request->id)->take(100)->get();
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
        $this->validate($request,[
            'product_id' => 'required',
            'quantity' => 'required',
            'date' => 'required'
        ]);
        Damage::create($request->all());
        
        return redirect(route('damage.index'));
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

    public function search(Request $request){
        $search_text = $_GET['query'];
        $damages = DB::table('damages')
                ->join('items', 'items.id', '=', 'damages.product_id')
                ->where('items.product_name','LIKE','%'.$search_text.'%')
                ->get();
        $productinputs = ProductInput::all();
        
        $vendors = Company::all();
        $items = Item::all();
        return view('pos.damage.index', compact('vendors', 'damages', 'items'));
    }
}
