<?php

namespace App\Http\Controllers\settings;

use App\Models\Detail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OutsideSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = Detail::all();
        return view('pos.settings.index', compact('details'));
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
        $details = new Detail();
       
        if ($request->hasFile('website_logo')) {
            $file = $request->file('website_logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('details/', $filename);
            $details->website_logo = $filename;
        } else {
            $details->website_logo = '';
        }
        if($request->hasFile('dashboard_logo')){
            $file = $request->file('dashboard_logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('details/',$filename);
            $details->dashboard_logo = $filename;
        }else{
            $details->dashboard_logo = '';
        }
        $details->company_name = $request->company_name;
        if($request->hasFile('login_logo')){
            $file = $request->file('login_logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('details/',$filename);
            $details->login_logo = $filename;
        }else{
            $details->login_logo = '';
        }
        $details->address = $request->address;
        $details->mobile_1 = $request->mobile_1;
        $details->mobile_2 = $request->mobile_2;
        $details->agent_1 = $request->agent_1;
        $details->agent_2 = $request->agent_2;
        $details->email_1 = $request->email_1;
        $details->email_2 = $request->email_2;
        $details->facebook_link = $request->facebook_link;
        $details->whatsapp_link = $request->whatsapp_link;
        $details->save();

        return redirect()->back()->with('success', 'Data Upload Successfully');
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
        $details = Detail::find($id);
        // Check if a new image was provided
        if ($request->hasFile('website_logo')) {
            $file = $request->file('website_logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('details/', $filename);
            $details->website_logo = $filename;
        }
        if($request->hasFile('dashboard_logo')){
            $file = $request->file('dashboard_logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('details/',$filename);
            $details->dashboard_logo = $filename;
        }
        $details->company_name = $request->company_name;
        if($request->hasFile('login_logo')){
            $file = $request->file('login_logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('details/',$filename);
            $details->login_logo = $filename;
        }
        $details->address = $request->address;
        $details->mobile_1 = $request->mobile_1;
        $details->mobile_2 = $request->mobile_2;
        $details->agent_1 = $request->agent_1;
        $details->agent_2 = $request->agent_2;
        $details->email_1 = $request->email_1;
        $details->email_2 = $request->email_2;
        $details->facebook_link = $request->facebook_link;
        $details->whatsapp_link = $request->whatsapp_link;
        $details->save();

        // Update other fields as needed

        $details->save();

        return redirect()->back()->with('success', 'Details updated successfully');
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
