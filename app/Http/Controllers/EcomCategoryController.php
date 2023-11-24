<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\SubCategory;
use App\Models\EcomCategory;
use Illuminate\Http\Request;

class EcomCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail = Detail::first();
        $ecomcategories = EcomCategory::all();
        $subcategories = SubCategory::all();
        return view('ecom.category', compact('ecomcategories', 'subcategories', 'detail'));
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
            'category_name' => 'required',
        ]);
        $ecomcategories = EcomCategory::create($request->all());
        
        return redirect(route('ecomcat.index'));
    }
    public function substore(Request $request)
    {
        $this->validate($request,[
            'category_id' => 'required',
            'subcategory_name' => 'required'
        ]);
        SubCategory::create($request->all());
        
        return redirect(route('ecomcat.index'));
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
