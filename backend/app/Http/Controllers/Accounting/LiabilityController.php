<?php

namespace App\Http\Controllers\Financial;

use Illuminate\Http\Request;
use App\Models\Financial\Liability;
use App\Models\Financial\Payment;
use App\Models\Actor\Statement;
use App\Models\Actor\User;
use App\Models\Supply\Purchase;
use App\Models\Supply\PurchaseItem;
use App\Models\Actor\Vendor;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Auth;

class LiabilityController extends Controller
{
    public function payable(){
    $liabilities = Liability::whereIsActive(1)
            ->whereNull('paid')
            ->whereHas('statement', function($statement){
                $statement->where('classification', 'Liabilities')
                        ->orWhere('classification', 'Expenses');
            })
            ->whereHas('vendor', function($vendor){
                $vendor->where('name', 'like', '%'.\Request::get('key').'%');
            })
            ->orWhereHas('payment', function($payment){
                $payment->whereNull('deposite')->whereCategory(1);
            })
            ->paginate(15);

        return view('financials.Liabilities.payable', compact('liabilities'));
    }

    public function tag($id){
        $vendor= Vendor::find($id);
        $purchases= Purchase::whereVendorId($id)
                                ->whereNotNull('received')
                                ->whereNull('liability_id')
                                ->get();

        return view('financials.Liabilities.tag', compact('purchases', 'vendor'));
    }

    public function Settledbill(){
        $liabilities = Liability::whereIsActive(1)
                    ->where(function ($q) {
                        $q->whereHas('vendor', function($vendor){
                            $vendor->where('name', 'like', '%'.\Request::get('key').'%');
                        })
                        ->orWhereHas('particulars', function($particulars){
                            $particulars->where('fname', 'like', '%'.\Request::get('key').'%');
                        });
                    })
                    ->whereMonth('paid', '=', now())
                    ->get();

        $checks=Payment::whereCategory(1)
                        ->whereMonth('deposite', '=', now())
                        ->whereHas('liability', function($liability){
                            $liability->whereNull('paid');
                        })
                        ->get();

        $partials=Payment::whereCategory(0)
                        ->whereHas('liability', function($liability){
                            $liability->whereNull('paid');
                        })
                        ->get();

        return view('financials.Liabilities.settledBill', compact('checks','liabilities', 'partials'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $statements=Statement::orderBy('titleincome')->get();
        $vendors=Vendor::where('category', '!=', 'Owner')
                        ->orderBy('name')
                        ->get();
        return view('financials.Liabilities.create', compact('statements', 'vendors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $user = Auth::user();
        $liability = $user->liabilities()->create ($request->all());
      //taging of Purchase Order
        if($request->has('po')) {
            foreach($request->po as $key){
              Purchase::find($key)->update(['liability_id'=>$liability->id]);
            }
        }
        return redirect()->route('liabilities.payable')->with('success', 'Successfully created a Account Payable');
    }

    public function update(Request $request, $id){
        return $request;

    }
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
       $purchase=PurchaseItem::wherehas('po', function ($po) use($id){
            $po->where('liability_id', $id);
        })
         ->get();
        return view('financials.Liabilities.show', compact('purchase', 'id'));
    }
}
