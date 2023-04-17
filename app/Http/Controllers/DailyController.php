<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collection;
use App\Models\Expense;
use App\Models\Note;
use App\Models\Customer;
use Mockery\Matcher\Not;

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
        $collections = Collection::all();
        $customers = Customer::all();
        return view('pos.daily.collection.index', compact('collections', 'customers'));
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
        $collections = Collection::find($id);
        return view('pos.daily.collection.edit', compact('collections'));
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
        $expenses = Expense::all();
        return view('pos.daily.expense.index', compact('expenses'));
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
        $expenses = Expense::find($id);
        return view('pos.daily.expense.edit', compact('expenses'));
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
        $notes = Note::all();
        return view('pos.daily.note.index', compact('notes'));
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
        $notes = Note::find($id);
        return view('pos.daily.note.edit', compact('notes'));
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
