<?php

namespace App\Http\Controllers\Financial;

use Illuminate\Http\Request;
use App\Models\Financial\Liability;
use App\Models\Actor\Statement;
use App\Models\Financial\Payment;
use App\Models\Financial\Check;
use App\Models\Actor\Vendor;
use App\Models\Actor\User;

use App\Http\Controllers\Controller;
use Auth;

class PaymentController extends Controller
{
    public function create(Vendor $vendor=null){
        $checks = Check::whereNull('consume')->get();
        $vouchers = 1 +  Payment::max('voucher');
        if($vendor){
            // predefined
            $liability=Liability::find($vendor->id);
            return view('financials.Payments.create-control', compact('liability', 'checks', 'vouchers'));
        }

        $statements=Statement::orderBy('titleincome')->get();
        $vendors=Vendor::where('category', '!=', 'Owner')
                        ->orderBy('name')
                        ->get();
        $particulars = User::orderBy('name')->get();

        return view('financials.Payments.create', compact('statements', 'vendors', 'particulars', 'checks', 'vouchers' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $user = Auth::user();
        if($request->vouchers === 'vendor'){
            $input = $request->offsetUnset('particular');
        }else{
            $input = $request->offsetUnset('vendor_id');
        }

        if($request->category === '0'){
            // Cash
            $request->offsetUnset('cheque');
            if($request->has('aDue')){
                // Predefined
                if($request->amount >= $request->aDue){
                //check if all cheque paid
                    $check=Payment::whereLiabilityId($request->liability_id)
                                    ->whereCategory(1) //cheque
                                    ->whereIsActive(1) //active
                                    ->whereNull('deposite') //unSettle
                                    ->first();

                    if ( is_null($check) ) {
                        $liability= Liability::find($request->liability_id);
                        $liability ->update(['paid'=>now()]);
                    }
                }
            }
        }else{
            // Check
            //Overall
            $check= Check::find($request->cheque['check']);
            $check->update([
                'current' => $request->cheque['number'] + 1,
                'consume' => $request->cheque['number']===$check->end?now():null
            ]);
        }

         // Undefined transactions
         if(!$request->has('aDue')){
            $request->request->add(['paid'=>now()]);
            $liability = $user->liabilities()->create ($request->all());
            $request->request->add(['liability_id'=>$liability->id]);
        }

        $user->payment()->create ($request->all());
        if(!$request->has('aDue')){
            return redirect()->route('payment.voucher', ['id' => $liability->id]);
        }else{
            return Redirect()->route('liabilities.payable');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function voucher($id){
        $liability = Liability::find($id);
        return view('financials.Payments.voucher', compact('liability'));
    }

    public function show($id){
         $payments = Payment::whereLiabilityId( $id)
          ->get();
        $payable=Liability::find($id);
         return view('financials.Payments.show', compact('payments', 'payable'));
     }

    /**
     * Update the LiabilityInfo.
     * once fullypain update Liability
     */

    public function deposited($id){
        $li= Payment::find($id);
        $li->update([
                'deposite'=>now(),
                'deposite_by'=>Auth::user()->id
        ]);

        $l=Liability::find($li->liability_id);

        if($l->payable<=0){
            $l->update(['paid'=>now()]);
        }
        return redirect()->route('liabilities.payable');
    }
}
