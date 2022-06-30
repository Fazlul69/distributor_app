<?php

namespace App\Http\Controllers\Ecom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\EcomCategory;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $ecomcategories = EcomCategory::all();
        $subcategories = SubCategory::all();
        return view('ecom.product', compact('products', 'ecomcategories', 'subcategories'));
    }

    public function getSubCat(Request $request)
    {
        $data = SubCategory::select('subcategory_name', 'id')->where('category_id', $request->id)->take(100)->get();
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
            'subcategory_id' => 'required',
            'brand' => 'required',
            'product_name' => 'required',
            'image' => 'required',
            'description' => 'required',
            'buy' => 'required',
            'sell' => 'required',
            'quantity' => 'required',
        ]);

        $products = new Product();
        
        $products->subcategory_id = $request->subcategory_id;
        $products->brand = $request->brand;
        $products->product_name = $request->product_name;
        $products->description = $request->description;
        $products->buy = $request->buy;
        $products->sell = $request->sell;
        $products->quantity = $request->quantity;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/',$filename);
            $products->image = $filename;
        }else{
            //return $request;
            $products->image = '';
        }
        
        $products->save();
        
        return redirect(route('product.index'));
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
        $products = Product::find($id);
        return view('ecom.product_edit',compact('products'));
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
            'brand' => 'required',
            'product_name' => 'required',
            'description' => 'required',
            'buy' => 'required',
            'sell' => 'required',
            'quantity' => 'required',
        ]);

        $products =  Product::find($id);
        
        $products->brand = $request->brand;
        $products->product_name = $request->product_name;
        $products->description = $request->description;
        $products->buy = $request->buy;
        $products->sell = $request->sell;
        $products->quantity = $request->quantity;

        
        $products->save();
        
        return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->back();
    }
}
