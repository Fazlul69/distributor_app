<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Detail;
use App\Models\Company;
use App\Models\Replace;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Salenote;
use App\Models\Supplier;
use App\Models\Collection;
use App\Models\ProductSale;
use App\Models\ProductInput;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductSaleController extends Controller
{
    
    public function index()
    {
        // $productsales = ProductSale::all();
        $detail = Detail::first();
        $collections = Collection::all();
        $replaces = Replace::all();
        $productsales = ProductSale::distinct()->orderBy('invoice')->get();
        $productsales = ProductSale::paginate(50);
        return view('pos.sale.invoice.index', compact('replaces','collections', 'detail'))->with('productsales', $productsales);
    }

    
    public function create()
    {
        $detail = Detail::first();

        $vendors = Company::all();
        $suppliers = Supplier::all();
        $customers = Customer::all();
        return view('pos.sale.invoice.create', compact('suppliers', 'customers', 'detail'))->with('vendors', $vendors);
    }

    public function findCategory(Request $request)
    {
        $data = Category::select('category_name', 'id')->where('vendor_id', $request->id)->take(100)->get();
        return response()->json($data);
    }

    public function findProduct(Request $request)
    {
        $productinputs=Item::select('product_name', 'id')->where('category_id',$request->id)->take(100)->get();
        
        $data = Item::select('product_name', 'id')->where('category_id', $request->id)->take(100)->get();

    	return response()->json($data);

    }

    public function purchaseProduct(Request $request)
    {
        $p_quantity=ProductInput::select('quantity')->where('product_id',$request->id)->first();
    	return response()->json($p_quantity);
    }
    public function saleProduct(Request $request)
    {
        $s_quantity=DB::table('product_sales')->where('product_id',$request->id)->sum('quantity');
    	return response()->json($s_quantity);
    }
    public function sellPrice(Request $request)
    {
        $s_price=Item::select('tp')->where('id',$request->id)->first();
		
    	return response()->json($s_price);
    }
   
    public function store(Request $request)
    {
        // dd($request->all());
        foreach($request->vendor_id as $key => $vendor_id)
        {
            $input = new ProductSale();
            $input->vendor_id = $vendor_id;
            $input->invoice = $request->invoice[0];
            $input->date = $request->date[0];
            $input->customer_id = $request->customer_id[0];
            $input->product_id = $request->product_name[$key]; 
            $input->quantity = $request->quantity[$key];
            $input->total = $request->total[$key];
            $input->grand_total = $request->grand_total;
            $input->grand_discount = $request->grand_discount;
            $input->payed = $request->payed;
            $input->due = $request->due;
            $input->save(); 
        }
        return redirect(route('sales.index'));
    }

    public function show($invoice)
    {
        $detail = Detail::first();

        $customers = Customer::all();
        $productsales = ProductSale::where([['invoice', '=', $invoice]])->get();
        // dd($productsales);
        $vendors = Company::all();
        return view('pos.sale.invoice.view',compact('customers', 'vendors', 'detail'))->with('productsales', $productsales);
    }
    public function show_two($invoice)
    {
        $detail = Detail::first();

        $customers = Customer::all();
        $productsales = ProductSale::where([['invoice', '=', $invoice]])->get();
        // dd($productsales);
        $vendors = Company::all();
        return view('pos.sale.invoice.view_two',compact('customers', 'vendors', 'detail'))->with('productsales', $productsales);
    }
    

    public function findCustomerInView(Request $request)
    {
        $saleInvoice=ProductSale::distinct()->select('invoice')->where('customer_id',$request->id)->take(100)->get();
        return response()->json($saleInvoice);
    }

    public function findVendorFromSale(Request $request)
    {
        $saleVendor=Salenote::distinct()->select('vendor_id')->where('invoice',$request->id)->take(100)->get();

        $data = DB::table('companies')
        ->join('product_sales', 'product_sales.vendor_id', '=', 'companies.id')
        ->distinct()->select('vendor_id')->where('invoice',$request->id)
        ->select('companies.name', 'product_sales.vendor_id')
        ->get();
        // dd($data);
    	return response()->json($data);
    }

    public function findSaleDue(Request $request)
    {
        $due=ProductSale::distinct()->select('grand_total')->where('invoice',$request->id)->first();
    	return response()->json($due);
    }
    public function findSaleDate(Request $request)
    {
        $data = ProductSale::distinct()->select('date')->where('invoice',$request->id)->first();
    	return response()->json($data);
    }
    
    public function findCollection(Request $request)
    {
        $data=Collection::distinct()->select('amount')->where('sales_invoice',$request->id)->first();

    	return response()->json($data);
    }

    public function edit($id)
    {
        $detail = Detail::first();

        $productsales = ProductSale::find($id);
        return view('pos.sale.invoice.edit', compact('productsales', 'detail'));
    }

    public function update(Request $request, $id)
    {
    
        $productsales = ProductSale::find($id);
        
        $productsales->payed = $request->payed;
        $productsales->due = $request->due;

        $productsales->save();
        
        return redirect(route('sales.index'));
    }

    public function datesearch(Request $request)
    {
        $detail = Detail::first();

        $search_text = $_GET['query'];

        $productinputs = ProductInput::where('product_name','LIKE','%'.$search_text.'%')
                    ->orWhere('date','LIKE','%'.$search_text.'%')
                    ->paginate(120);
        $productsales = ProductSale::where('product_id','LIKE','%'.$search_text.'%')
                    ->orWhere('date','LIKE','%'.$search_text.'%')
                    ->paginate(120);
        $vendors = Company::where('name','LIKE','%'.$search_text.'%')
                    ->paginate(120);
        return view('pos.sale.invoice.index', compact('detail'))->with('productinputs',$productinputs)
                ->with('vendors',$vendors)
                ->with('productsales',$productsales);
    }
    public function invoicesearch(Request $request)
    {
        $detail = Detail::first();

        $search_text = $_GET['query'];

        $productinputs = ProductInput::where('invoice','LIKE','%'.$search_text.'%')
                    ->paginate(120);
        $productsales = ProductSale::where('invoice','LIKE','%'.$search_text.'%')
                    ->paginate(120);
        $vendors = Company::where('name','LIKE','%'.$search_text.'%')
                    ->paginate(120);
        return view('pos.sale.invoice.index', compact('detail'))->with('productinputs',$productinputs)
                ->with('vendors',$vendors)
                ->with('productsales',$productsales);
    }
    public function cussearch(Request $request)
    {
        $detail = Detail::first();

        $search_text = $_GET['query'];

        $productinputs = ProductInput::where('invoice','LIKE','%'.$search_text.'%')
                    ->paginate(120);
        $productsales = ProductSale::where('invoice','LIKE','%'.$search_text.'%')
                    ->join('customers', 'product_sales.customer_id', '=', 'customers.id')
                    ->orWhere('customers.customer_name','LIKE','%'.$search_text.'%')
                    ->orWhere('customers.cus_mobile','LIKE','%'.$search_text.'%')
                    ->paginate(120);
        $vendors = Company::where('name','LIKE','%'.$search_text.'%')
                    ->paginate(120);
        $customers = Customer::where('customer_name','LIKE','%'.$search_text.'%')
                    ->orWhere('cus_mobile','LIKE','%'.$search_text.'%')
                    ->paginate(120);
        return view('pos.sale.invoice.index', compact('detail'))->with('productinputs',$productinputs)
                ->with('vendors',$vendors)
                ->with('productsales',$productsales);
    }

    public function destroy($id)
    {
        return redirect(route('sales.index'));
    }

    // Note

    public function notestore(Request $request)
    {
            $request->validate([
                'vendor_id'      => 'required',
                'customer_id'      => 'required',
                'invoice'     => 'required',
                'subtotal' => 'nullable',
                'payed'    => 'required',
                'due'    => 'required',
              ]);
      
            $input = new Salenote();
            $input->vendor_id = $request->vendor_id;
            $input->customer_id = $request->customer_id;
            $input->invoice = $request->invoice;
            $input->subtotal = '0';
            $input->payed = $request->payed;
            $input->due = $request->due;
            $input->save(); 

        return response()->json(['success'=>'Done']);

    }
}
