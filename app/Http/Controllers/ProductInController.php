<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Detail;
use App\Models\Vendor;
use App\Models\Company;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\ProductInput;
use Illuminate\Http\Request;

class ProductInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail = Detail::first();
        $productinputs = ProductInput::all();
        $productinputs = ProductInput::paginate(50);
        $vendors = Company::all();
        return view('pos.purchase.invoice.index', compact('detail'))->with('productinputs', $productinputs)->with('vendors', $vendors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detail = Detail::first();
        $productinputs = ProductInput::all();
        $vendors = Company::all();
        $suppliers = Supplier::all();
        $categories = Category::all();

        // Generate a unique invoice number
        $lastProductInput = ProductInput::orderBy('id', 'desc')->first();
        $lastInvoiceNumber = $lastProductInput ? $lastProductInput->invoice : 'INV0000'; // Assuming an initial invoice format

        // Increment the last invoice number
        $newInvoiceNumber = 'INV' . str_pad((int)filter_var($lastInvoiceNumber, FILTER_SANITIZE_NUMBER_INT) + 1, 4, '0', STR_PAD_LEFT);

        return view('pos.purchase.invoice.create', compact('detail', 'suppliers', 'categories', 'productinputs', 'newInvoiceNumber'))->with('vendors', $vendors);
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
            'supplier_name' => 'required',
        ]);
        foreach ($request->product_id as $key => $product_id) {
            $input = new ProductInput();
            $input->product_id = $product_id;
            $input->invoice = $request->invoice[0];
            $input->supplier_name = $request->supplier_name[0];
            $input->category_id = $request->category_id[$key];
            $input->company_price = $request->company_price[$key];
            $input->discount_price = $request->discount_price[$key];
            $input->sell_price = $request->sell_price[$key];
            $input->mrp = $request->mrp[$key];
            $input->quantity = $request->quantity[$key];
            $input->total = $request->total[$key];
            $input->date = $request->date[0];
            $input->vendor_id = $request->vendor_id[0];
            $input->grand_total = $request->grand_total;
            $input->grand_discount = $request->grand_discount;
            $input->payed = $request->payed;
            $input->due = $request->due;
            $input->save();
        }
        return redirect(route('pinput.view'));
    }

    public function findVendor()
    {
        $vendors = Company::all();
        return response()->json($vendors);
    }

    public function findvendorwisecategory(Request $request)
    {
        $data = Category::select('category_name', 'id')->where('vendor_id', $request->id)->take(100)->get();
        return response()->json($data);
    }

    public function findCatWiseProduct(Request $request)
    {
        $data = Item::select('product_name', 'id')->where('category_id', $request->id)->take(100)->get();
        return response()->json($data);
    }
    public function dealerPrice(Request $request)
    {
        $data = Item::select('buy_price')->where('id', $request->id)->first();
        return response()->json($data);
    }
    public function tradePrice(Request $request)
    {
        $data = Item::select('sell_price')->where('id', $request->id)->first();
        return response()->json($data);
    }
    public function discountPrice(Request $request)
    {
        $data = Item::select('discount_price')->where('id', $request->id)->first();
        return response()->json($data);
    }
    public function mrpPrice(Request $request)
    {
        $data = Item::select('mrp')->where('id', $request->id)->first();
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($invoice)
    {
        $vendors = Company::all();
        $detail = Detail::first();

        $productinputs = ProductInput::where([['invoice', '=', $invoice]])->get();
        // dd($productsales);
        return view('pos.purchase.invoice.view', compact('vendors', 'detail'))->with('productinputs', $productinputs);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productinputs = ProductInput::find($id);
        $detail = Detail::first();

        return view('pos.purchase.invoice.edit', compact('productinputs', 'detail'));
    }
    public function datesearch(Request $request)
    {
        $detail = Detail::first();

        $search_text = $_GET['query'];

        $productinputs = ProductInput::where('product_name', 'LIKE', '%' . $search_text . '%')
            ->orWhere('date', 'LIKE', '%' . $search_text . '%')
            ->paginate(120);
        $vendors = Company::where('name', 'LIKE', '%' . $search_text . '%')
            ->paginate(120);
        return view('pos.purchase.invoice.index', compact('detail'))->with('productinputs', $productinputs)
            ->with('vendors', $vendors);
    }
    public function invoicesearch(Request $request)
    {
        $detail = Detail::first();

        $search_text = $_GET['query'];

        $productinputs = ProductInput::where('invoice', 'LIKE', '%' . $search_text . '%')
            ->paginate(120);
        $vendors = Company::where('name', 'LIKE', '%' . $search_text . '%')
            ->paginate(120);
        return view('pos.purchase.invoice.index', compact('detail'))->with('productinputs', $productinputs)
            ->with('vendors', $vendors);
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
        $productinputs = ProductInput::find($id);

        $productinputs->payed = $request->payed;
        $productinputs->due = $request->due;

        $productinputs->save();

        return redirect(route('pinput.view'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productinput = ProductInput::find($id);
        $productinput->delete();
        return redirect(route('pinput.view'));
    }
}
