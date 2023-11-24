<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Detail;
use App\Models\Expense;
use App\Models\Customer;
use Mockery\Matcher\Not;
use App\Models\Collection;
use Illuminate\Http\Request;

class DailyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function collection()
    {
        $detail = Detail::first();
        $collections = Collection::all();
        $customers = Customer::all();
        return view('pos.daily.collection.index', compact('collections', 'customers', 'detail'));
    }
    public function collection_store(Request $request)
    {
        $this->validate($request,[
            'stuff_name' => 'required',
            'customer_id' => 'required',
            'amount' => 'required',
            'sales_invoice' => 'required',
            'date' => 'required'
        ]);
        Collection::create($request->all());
        
        return redirect(route('collection.index'));
    }
    public function collection_edit($id)
    {
        $detail = Detail::first();
        $collections = Collection::find($id);
        return view('pos.daily.collection.edit', compact('collections', 'detail'));
    }
    public function collection_update(Request $request, $id)
    {
        $this->validate($request,[
            'stuff_name' => 'required',
            'amount' => 'required',
        ]);
        $collections = Collection::find($id);
        
        $collections->stuff_name = $request->stuff_name;
        $collections->amount = $request->amount;

        $collections->save();
        
        return redirect(route('collection.index'));
    }
    public function collection_destroy($id)
    {
        Collection::find($id)->delete();
        return redirect()->back();
    }
    public function collection_search()
    {
        //
    }


    //expense
    public function expense()
    {
        $detail = Detail::first();
        $expenses = Expense::all();
        return view('pos.daily.expense.index', compact('expenses', 'detail'));
    }
    public function expense_store(Request $request)
    {
        $this->validate($request,[
            'details' => 'required',
            'amount' => 'required',
            'date' => 'required'
        ]);
        Expense::create($request->all());
        
        return redirect(route('expense.index'));
    }
    public function expense_edit($id)
    {
        $detail = Detail::first();
        $expenses = Expense::find($id);
        return view('pos.daily.expense.edit', compact('expenses', 'detail'));
    }
    public function expense_update(Request $request, $id)
    {
        $this->validate($request,[
            'details' => 'required',
            'amount' => 'required',
        ]);
        $expenses = Expense::find($id);
        
        $expenses->details = $request->details;
        $expenses->amount = $request->amount;

        $expenses->save();
        
        return redirect(route('expense.index'));
    }
    public function expense_destroy($id)
    {
        Expense::find($id)->delete();
        return redirect()->back();
    }
    public function expense_search()
    {
        //
    }

    //note
    public function note()
    {
        $detail = Detail::first();
        $notes = Note::all();
        return view('pos.daily.note.index', compact('notes', 'detail'));
    }

    public function note_store(Request $request)
    {
        $this->validate($request,[
            'details' => 'required',
            'amount' => 'required',
            'date' => 'required'
        ]);
        Note::create($request->all());
        
        return redirect(route('note.index'));
    }
    public function note_edit($id)
    {
        $detail = Detail::first();
        $notes = Note::find($id);
        return view('pos.daily.note.edit', compact('notes', 'detail'));
    }
    public function note_update(Request $request, $id)
    {
        $this->validate($request,[
            'details' => 'required',
            'amount' => 'required',
        ]);
        $notes = Note::find($id);
        
        $notes->details = $request->details;
        $notes->amount = $request->amount;

        $notes->save();
        
        return redirect(route('note.index'));
    }
    public function note_destroy($id)
    {
        Note::find($id)->delete();
        return redirect()->back();
    }
    public function note_search()
    {
        //
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
