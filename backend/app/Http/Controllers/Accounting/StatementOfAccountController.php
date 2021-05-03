<?php

namespace App\Http\Controllers\Financial;

use Illuminate\Http\Request;
use App\Models\Sale\RequestInfo;
use App\Models\Actor\User;
use App\Models\Actor\Vendor;
use App\Models\Financial\StatementOfAccount;

use Auth;
use App\Http\Controllers\Controller;

class StatementOfAccountController extends Controller{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
       
        $month = is_null(\Request::get('month'))?now():\Request::get('month');
        $year  = is_null(\Request::get('year'))?now():\Request::get('year');
        $key  = is_null(\Request::get('key'))?null:\Request::get('key');
        $soas=StatementOfAccount::whereMonth('created_at',  $month)
                                ->whereYear('created_at',  $year)
                                // ->whereNotNull('terminate')
                                ->whereHas('vendor', function($vendor) use($key){
                                    $vendor->where('name', 'like', '%'.$key.'%');
                                })
                                ->orWhereHas('receivables')
                                ->paginate(15);
        return view('financials.StatementOfAccounts.index', compact('soas', 'month', 'year'));
    }

    public function note(){
        // return 'Statement Of Account'; 
        $key  = is_null(\Request::get('key'))?null:\Request::get('key');
         $soas=StatementOfAccount::whereNull('terminate')
                                ->whereHas('vendor', function($vendor) use($key){
                                    $vendor->where('name', 'like', '%'.$key.'%');
                                })
                                ->paginate(15);
        return view('financials.StatementOfAccounts.notesoa', compact('key', 'soas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Vendor $vendor){
      return view('financials.StatementOfAccounts.create', compact('receivables', 'vendor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $user=Auth::user();
        $total=0;
        foreach($_REQUEST as $key => $value){
            if(is_int($key)){
                $total += $value;
            }
        }

       $soa= $user->SOA()->save(
                new StatementOfAccount([
                    'vendor_id'=> $request->vendor_id,
                    'amount'=>$total,
                    'due' =>$request->due
                ])
        );

        $soa->refresh;

        foreach($_REQUEST as $key => $value){
            if(is_int($key)){
            //   $ro= RequestOrder::find($key);
            //   $ro->update([
            //         'soa_id'=>$soa->id
            //     ]);
            }
        }
        return redirect()->route('statementofaccounts.show', $soa->id);
        return view('financials.StatementOfAccounts.show', compact('soa'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $soa=StatementOfAccount::find($id);

        //   return response()->json($soa);
        return view('financials.StatementOfAccounts.show', compact('soa'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function noteReceivable($id){
        $soa=StatementOfAccount::whereState(1)
                                ->whereId($id)
                                ->paginate(15);
        return view('financials.StatementOfAccounts.notereceivables', compact ('soa'));
    }

}
