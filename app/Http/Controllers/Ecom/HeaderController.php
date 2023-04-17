<?php

namespace App\Http\Controllers\Ecom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EcomCategory;
use App\Models\SubCategory;
use App\Models\Product;

class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->get();
        $ecomcategories = EcomCategory::all();
        $subcategories = SubCategory::all();
        return view('welcome', compact('products', 'ecomcategories', 'subcategories'));
    }

    public function getEcomCat(Request $request)
    {
        $data = SubCategory::select('subcategory_name', 'id')->where('category_id', $request->id)->take(100)->get();
        return response()->json($data);
    }

    // public function frontView()
    // {
    //     $products = Product::all();
    //     return view('layouts.', compact('products'));
    // }

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
        $products = Product::find($id);
        $ecomcategories = EcomCategory::all();
        return view('layouts.productview', compact('products', 'ecomcategories'));
    }

    public function categoryshow(Request $request)
    {
        $products = Product::where('subcategory_id', $request->id)->take(100)->get();
        $ecomcategories = EcomCategory::all();
        return view('layouts.category_wise_productview', compact('products', 'ecomcategories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
