<?php

namespace App\Http\Controllers\Financial;

use App\Models\Actor\User;
use App\Models\Financial\Receivable;
use App\Models\Financial\StatementOfAccount;
use App\Models\Financial\Check;
use Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReceivableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $receivables= Receivable::whereSoaId($id)->get();
        return view('financials.Receivables.index', compact('receivables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $checks = Check::whereNull('consume')->get();
        $representatives=User::whereRoleId(3)->get();
        $balance=StatementOfAccount::find($id);
        return view('financials.Receivables.create', compact('representatives', 'balance', 'checks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        if(!$request->category){
            // Cash
            $request->offsetUnset('cheque');
        }

        //balance
        if($request->amount >= $request->nr && $request->nr > 0){
            $soa = StatementOfAccount::find($request->soa_id);
            $soa->state = false;
            $soa->save();
        }

        $re = $user->receivable()->create ($request->all());
        return  redirect()->route('statementofaccounts.note');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receivable  $receivable
     * @return \Illuminate\Http\Response
     */
    public function show( $id){
        $soa =StatementOfAccount::find($id);
        return view('financials.Receivables.show', compact('soa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receivable  $receivable
     * @return \Illuminate\Http\Response
     */
    public function edit(Receivable $receivable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receivable  $receivable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receivable $receivable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receivable  $receivable
     * @return \Illuminate\Http\Response
     */
    public function cashout($id)
    {
         $receivable=Receivable::find($id);
         $receivable->update(['cashout' => now()]);
         //terminate the statement_of_accounts
            $ro = StatementOfAccount::find($receivable->soa_id);
            $ro->update(['terminate' => now()]);

         return redirect()->back()->with('success', 'Succesfully converted check into cash.');
    }
}
