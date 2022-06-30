<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EcomCategory;
use App\Models\SubCategory;

class EcomCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ecomcategories = EcomCategory::all();
        $subcategories = SubCategory::all();
        return view('ecom.category', compact('ecomcategories', 'subcategories'));
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
