<?php

namespace App\Http\Controllers\Financial;

use App\Models\Financial\Payroll;
use App\Models\Actor\User;
use App\Models\Actor\Role;
use App\Models\Financial\Liability;
use App\Models\Financial\Payment;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Auth;
class PayrollController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

       $employees=User::whereNotIn('role_id',[1,3])
                    ->paginate(15);

       return view('financials.Payrolls.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
       $employee  =User::find($id);
        return view('financials.Payrolls.create', compact('employee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $user = Auth::user();
        $liability = $user->liabilities()->save(
            new Liability([
                'fs_id'  => 3,
                'amount' => $request->payrol['NP'],
                'particular' => $request->particular,
                'paid'   => now()
           ])
       );

       $payment = $user->payment()->save(
            new Payment([
                'category'     => 0,
                'liability_id' => $liability->id,
                'amount'       => $request->payrol['NP'],
                'breakdown'    => $request->payrol
            ])
        );
        return redirect()->route('payrolls.payslip', ['id' => $payment->id]);
    }

    public function payslip($id){
        $payment = Payment::find($id);
        $breakdown = $payment->breakdown;
        return view('financials.payrolls.payslip', compact('payment', 'breakdown'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $liability= Liability::whereId($id)->with('payment')->first();
        return view('financials.Payrolls.show', compact('liability'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function edit(salary $salary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, salary $salary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function destroy(salary $salary)
    {
        //
    }
}
