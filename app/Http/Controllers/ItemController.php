<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Item;
use App\Models\Detail;
use App\Models\Company;
use App\Models\Vendor; 
use App\Models\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
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
        $items = Item::all();
        $items = Item::paginate(10);
        return view('pos.item.index', compact('vendors', 'items', 'detail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        

        try {
            // Validate the value...
            $this->validate($request,[
                'vendor_id' => 'required',
                'category_id' => 'nullable',
                'product_name' => 'required',
                'buy_price' => 'nullable',
                'sell_price' => 'nullable',
                'discount_price' => 'nullable',
                'mrp' => 'nullable',
            ]);
    
            Item::create($request->all());
            return redirect(route('item.view'));
        } catch (Exception $e) {
            echo $e->getMessage();
        }
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

    public function search(Request $request)
    {
        $detail = Detail::first();

        $search_text = $_GET['query'];

        $items = Item::where('product_name','LIKE','%'.$search_text.'%')
                    ->paginate(15);
        $vendors = Vendor::all();
        $categories = Category::all();
        return view('pos.item.index', compact('detail'))->with('items',$items)
                ->with('vendors',$vendors)
                ->with('categories',$categories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = Item::find($id);
        $detail = Detail::first();
        return view('pos.item.edit',compact('items', 'detail'));
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
        $items = Item::find($id);
        
        $items->product_name = $request->product_name;
        $items->buy_price = $request->buy_price;
        $items->sell_price = $request->sell_price;
        $items->discount_price = $request->discount_price;
        $items->mrp = $request->mrp;

        $items->save();
        
        return redirect(route('item.view'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Item::find($id)->delete();
        return redirect()->back();
    }
}
