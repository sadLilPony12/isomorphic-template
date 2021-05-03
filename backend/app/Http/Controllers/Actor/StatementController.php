<?php

namespace App\Http\Controllers\Actor;

use App\Models\Actor\Statement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatementController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
        {
            $financialStatements=statement::all();
            return view('Actors.Statement.index', compact('financialStatements'));
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
        {
            $financialStatements=statement::all();
        return view('Actors.Statement.create', compact('financialStatements'));
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)    
        {
            $request->request->add(['user_id' =>Auth::user()->id]);
            Statement::create ($request->all());
            return redirect('/financialStatements')
            ->with('success', 'You Have Updated the Financial Statement');
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\FinancialStatement  $financialStatement
     * @return \Illuminate\Http\Response
     */
    public function show(FinancialStatement $financialStatement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FinancialStatement  $financialStatement
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $statement =Statement::find($id);
        return view('Actors.Statement.edit',compact('statement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FinancialStatement  $financialStatement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $input = $request->all();
        Statement::find($id)->fill($input)->save();
        return redirect('/financialStatements')
            ->with('success','You have updated the Vendor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FinancialStatement  $financialStatement
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id){
        Statement::destroy($id);
        return redirect('/financialStatements')
                ->with('success','You have Succesfully deleted your Financial Statement...');
    }
}
