<?php

namespace App\Http\Controllers\Financial;

use App\Models\Actor\Vendor;
use App\Models\Financial\Check;
use App\Models\Financial\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class CheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checks=Check::all();
        return view('financials.check.index', compact('checks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendors=Vendor::whereCategory('Support')
        ->whereState(1)
        ->get();
        return view('financials.Check.create', compact('vendors'));
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
        $user->checks()->create ($request->all());
        return redirect('/checks')
        ->with('success', 'You Have Updated the Check');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Financial\Check  $check
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $check    = Check::find($id);
        $payments = Payment::where('cheque', 'like', '{"check":"'. $id .'","number":%')->get();
        return view ('financials.Check.show', compact('payments', 'check'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Financial\Check  $check
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vendors=Vendor::whereCategory('Support')
        ->whereState(1)
        ->get();

        $checks=Check::find($id);
        return view('financials.Check.edit', compact('checks', 'vendors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Financial\Check  $check
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $input = $request->all();
        Check::find($id)->fill($input)->save();
      return redirect('\checks');

      $check=Check::find($id);
      $payment=Payment::where('cheque', 'like', '{"check":"'. $id .'","number":"%')->first();

        $newCheck = $payment->cheque;
        $newCheck['number']=3456;

        $payment->update(['cheque'=> $newCheck]);
      return response()->json($payment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Financial\Check  $check
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Check::destroy($id);
      return redirect('/checks')
      ->with('success','You have Succesfully deleted your partylist..');
    }

    public function serve($id){
        $bank = Check::find($id);
        return Response($bank);
    }
}
