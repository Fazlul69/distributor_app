<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use Session;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors=Vendor::all();
        return view('pos.purchase.vendor.index')->with('vendors',$vendors);
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
            'name' => 'required',
            'image' => 'nullable',
            'email' => 'nullable',
            'mobile' => 'nullable',
            'unpaid' => 'nullable',
        ]);

        $vendors = new Vendor();
        
        $vendors->name = $request->name;
        $vendors->email = $request->email;
        $vendors->mobile = $request->mobile;
        $vendors->unpaid = $request->unpaid;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/footer/',$filename);
            $vendors->image = $filename;
        }else{
            //return $request;
            $vendors->image = '';
        }
        
        $vendors->save();
        
        return redirect(route('vendor.view'));
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
        $vendors = Vendor::find($id);
        return view('pos.purchase.vendor.edit',compact('vendors'));
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
            'name' => 'required',
            'email' => 'nullable',
            'mobile' => 'nullable',
            'unpaid' => 'nullable',
        ]);
        $vendors = Vendor::find($id);
        
        $vendors->name = $request->name;
        $vendors->email = $request->email;
        $vendors->mobile = $request->mobile;
        $vendors->unpaid = $request->unpaid;

        $vendors->save();
        
        // Session::flash('success','Data insert successfully');
        return redirect(route('vendor.view'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Vendor::find($id)->delete();
        return redirect()->back();
    }
}
