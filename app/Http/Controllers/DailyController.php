<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collection;
use App\Models\Expense;
use App\Models\Note;

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
        return view('pos.daily.collection.index', compact('collections'));
    }
    public function collection_store()
    {
        //
    }
    public function collection_edit()
    {
        //
    }
    public function collection_update()
    {
        //
    }
    public function collection_destroy()
    {
        //
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
    public function expense_store()
    {
        //
    }
    public function expense_edit()
    {
        //
    }
    public function expense_update()
    {
        //
    }
    public function expense_destroy()
    {
        //
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

    public function note_store()
    {
        //
    }
    public function note_edit()
    {
        //
    }
    public function note_update()
    {
        //
    }
    public function note_destroy()
    {
        //
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
