<?php

namespace App\Http\Controllers;

use App\Models\Accounting\AccountingSession;
use Illuminate\Http\Request;

class AccountingSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function find($batch)
    {
        $accounting = AccountingSession::whereBatchId($batch)->first();
        return $accounting;
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
     * @param  \App\Models\Accounting\AccountingSession  $accountingSession
     * @return \Illuminate\Http\Response
     */
    public function show(AccountingSession $accountingSession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accounting\AccountingSession  $accountingSession
     * @return \Illuminate\Http\Response
     */
    public function edit(AccountingSession $accountingSession)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Accounting\AccountingSession  $accountingSession
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccountingSession $accountingSession)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accounting\AccountingSession  $accountingSession
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccountingSession $accountingSession)
    {
        //
    }
}
