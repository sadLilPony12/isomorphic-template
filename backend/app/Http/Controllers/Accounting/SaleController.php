<?php

namespace App\Http\Controllers\Financial;

use App\Models\Financial\Sale; 
use App\Models\Financial\SaleItem;
use App\Models\Actor\Customer;
use App\Models\Actor\ServiceOffer;
use App\Models\Actor\ServiceRender;
use App\Models\Actor\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect,Response;
use Session;
use Auth;

class SaleController extends Controller
{
    public function index(Customer $customer)
        {
            return view('financials.sales.transactions', compact('customer'));
        }
    public function AddToCart(ServiceOffer $serviceoffer)
        {
            return response()->json($serviceoffer);
        }
  
    public function receipt(Request $request, Sale $sale)
        {
            // return $sale;
            $jsonString = file_get_contents(base_path('public/storage/settings.json'));
            $data = json_decode($jsonString, true);
    
            // Get setting
            $access= $data['configuration']['companySettings']['setting']['is_license'];
            if($access){
                $credentials= $data['configuration']['companySettings']['credentials'];
                return view('financials.sales.receipt', compact('sale', 'credentials'));
                return response()->json($credentials);
            }

            return redirect()->to('/login');
        }
    public function transaction(Customer $customer)
        {
            return view('financials.sales.transaction', compact('customer'));
        }
    public function compile(Customer $customer)
        {
            return 'Compile';
        }
    public function store(Request $request, User $user)
        {
            $sale = $user->sale()->save(
                new Sale([
                    'customer_id' => $request->customer_id,
                    'cash'        => $request->cash,
                    'amount'      => $request->amount,
                    'category'    => 'Cash',
                    'approved'    => $request->approved,
                    'remarks'     => $request->remarks
                ])
            );

            $sale->refresh();

            foreach($_REQUEST as $k => $price){
                if(is_int($k)){
                    $sale->saleitem()->save(
                        new SaleItem([
                            'service_id'=> $k,
                            'srp'       => $price,
                        ])
                    );
                }
            } 

            $response = array(
                    'type' => 'get',
                    'url' => route('sales.receipt', ['sale' => $sale->id]),
                    'success' => true);

            return Response::json($response);
        }
   
    public function find(Sale $sale)
        {
            return $sale;
        }
}
