<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail = Detail::first();
        $customers = Customer::all();
        $customers = Customer::paginate(10);
        return view('pos.customer.index', compact('detail'))->with('customers', $customers);
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

    public function search(Request $request){
        $detail = Detail::first();
        $search_text = $_GET['query'];
        $customers = Customer::where('cus_mobile','LIKE','%'.$search_text.'%')
                                ->orWhere('customer_name','LIKE','%'.$search_text.'%')
                                ->paginate(15);
        return view('pos.customer.index', compact('detail'))->with('customers',$customers);
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
            'customer_name' => 'required',
            'cus_mobile' => 'required',
            'shop' => 'required',
            'cus_email' => 'nullable',
            'cus_address' => 'required',
            'payed' => 'nullable',
            'due' => 'nullable',
        ],
    );
        
        $customers = Customer::create($request->all());
        
        // Session::flash('success','Data insert successfully');
        return redirect(route('customer.view'));
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
        $customers = Customer::find($id);
        return view('pos.customer.edit',compact('customers', 'detail'));
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
            'customer_name' => 'required',
            'cus_mobile' => 'required',
            'shop' => 'required',
            'cus_email' => 'nullable',
            'cus_address' => 'required',
            'payed' => 'nullable',
            'due' => 'nullable',
        ]);
        $customers = Customer::find($id);
        
        $customers->customer_name = $request->customer_name;
        $customers->cus_mobile = $request->cus_mobile;
        $customers->shop = $request->shop;
        $customers->cus_email = $request->cus_email;
        $customers->cus_address = $request->cus_address;
        $customers->payed = $request->payed;
        $customers->due = $request->due;

        $customers->save();
        
        // Session::flash('success','Data insert successfully');
        return redirect(route('customer.view'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::find($id)->delete();
        return redirect()->back();
    }
}
