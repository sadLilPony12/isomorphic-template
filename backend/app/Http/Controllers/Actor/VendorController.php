<?php

namespace App\Http\Controllers\Actor;
use App\Models\Actor\Vendor;
use Illuminate\Http\Request;
use App\Classes\Brochure;
use App\Models\Actor\ProductBrand;
use App\Models\Actor\TagVendorProduct;
use App\Models\Actor\User;
use App\Models\Financial\Liability;
use App\Models\Financial\StatementOfAccount;
use Yajra\DataTables\DataTables;

use Auth;
use Session;
use App\Http\Controllers\Controller;

class VendorController extends Controller{
    public function index()
        {
            $vendors=Vendor::where('category','!=','Owner')
                            ->where('name', 'like', '%'.\Request::get('key').'%')
                            -> paginate(10);
            $vendors->appends(['key' => \Request::get('key')]);
            return view('Actors.vendor.index', compact('vendors'));
        }

    public function register()
        {
            $cart= new Brochure(null);
            $cart->info($vendor->id, $vendor->fullname, $vendor->category);

            session()->put('brochure', $cart);
            return redirect()->route('vendors.brochure',  ['id'=>$id]);
        }
   
    public function brochure(Vendor $vendor)
        {
            $products = ProductBrand::where('supplierObj', 'like', '%"'.$vendor->id.'":%')
                                    ->get();

            $products = collect($products)->sortBy('product.generic.name');
            return view('Actors.vendor.brochure', compact('vendor','products'));
        }

    public function AddToCart(Request $request, $id)
        {
            $product = ProductBrand::find($id);

            $oldCart=Session::has('brochure')?Session::get('brochure'):null;
            $cart= new Brochure($oldCart);
            $srp=is_null($request->srp)?$product->srp :$request->srp;

            $cart->add($product, $srp ,$product->id);
            $request->session()->put('brochure', $cart);
            $count = count($cart->items);
            return response()->json(array('count'=> $count), 200);
        }

    public function products($search=null)
        {
            $oldCart=Session::has('brochure')?Session::get('brochure'):null;
            $newItems[]=null;
            if(is_null( $oldCart)){
                return $this->index();
            }elseif(is_null($oldCart->items)){
                $newItems = TagVendorProduct::whereVendorId($oldCart->info['id'])->get()->pluck('product_id');
            }else{
                $oldItems = TagVendorProduct::whereVendorId($oldCart->info['id'])->get()->pluck('product_id');
                $items = array_keys( $oldCart->items);
                $newItems = array_merge($oldItems->toArray(),$items);
            }

            $products=ProductBrand::with('generic')
                                    ->whereNotIn('id',$newItems)
                                    ->where(function ($q) {
                                        $q->whereHas('generic', function($generic){
                                                $generic->where('name', 'like', '%'.\Request::get('key').'%');
                                        })
                                        ->orWhere('name', 'like', '%'.\Request::get('key').'%');
                                    })
                                    ->paginate(12);

            return view('Actors.vendor.products', compact('products'));
        }

    public function tag_Cart()
        {
            $oldCart = Session::get('brochure');
        // return response()->json($oldCart);

            $cart= new Brochure($oldCart);

            return view('Actors.vendor.tag-cart', compact('cart'));
        }

    public function getReduceByOne($id)
        {
            $oldCart = Session::has('brochure') ? Session::get('brochure'):null;
            $cart = new Brochure($oldCart);
            $cart->reduceByOne($id);

            Session::put('brochure', $cart);
            return redirect()->route('vendors.tag-cart');
        }

    public function getRemoveItem($id) 
        {
            $oldCart = Session::has('brochure') ? Session::get('brochure'):null;
            $cart = new Brochure($oldCart);
            $cart->removeItem($id);
            Session::put('brochure', $cart);
            return redirect()->route('vendors.tag-cart');
        }

    public function create()
        {
            $users=User::whereRole_id(3)->get();
            return view('Actors.vendor.create', compact('users'));
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
        {
            Vendor::create ($request->all());
            Session::forget('brochure');
            return redirect('/vendors')
            ->with('success', 'You Have Updated the Vendor');
        }
     
    public function edit($id)
        {
            $users=User::whereRole_id(3)->get();
            $vendors=Vendor::find($id);
            return view('Actors.vendor.edit',compact('vendors', 'users'));
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
        {
            $vendors=Vendor::find($id);
            $input = $request->all();
            $vendors->fill($input)->save();
            return redirect('/vendors')
                    ->with('success','You have updated the Vendor');
        }

    public function history(Request $request)
        {
            $vendor=Vendor::find($request->id);
            Session::put('vendor_id', $vendor->id);
            return view('Actors.vendor.history', compact('vendor'));
        }

    /**
     * read all data by json format
     */
    public function purchase(Request $request)
        {
            $requestOrders = RequestOrder::whereNotNull('delivered')
                        ->whereVendorId($request->vendor)
                        ->whereNotNull('SOA_id')
                        ->whereMonth('created_at', '>=', $request->month)
                        ->whereYear('created_at', '=', $request->year)
                        ->get();

            $count=1;
            $amount=0;
            $output = '<thead>'.
                        '<tr>'.
                            '<th>#</th>'.
                            '<th>Requested By</th>'.
                            '<th>Qty</th>'.
                            '<th>Date</th>'.
                            '<th>Amount</th>'.
                            '<th>Paid</th>'.
                        '</tr>'.
                    '</thead>'.
                    '<tbody>';

            foreach($requestOrders as $requestOrder){
                $amount += $requestOrder->amount;
                $output.='<tr>'.
                            '<td>'.$count ++.'</td>'.
                            '<td>'.$requestOrder->requestedBy->fullname.'</td>'.
                            '<td>'.$requestOrder->pqnty.'</td>'.
                            '<td>'.$requestOrder->delivered->format('M d, Y').'</td>'.
                            '<td>'.number_format($requestOrder->amount).'</td>'.
                            '<td>'.$requestOrder->paid.'</td>'.
                        '</tr>';
            }

            $output.='<tr>'.
                        '<td>&nbsp;</td>'.
                        '<td>&nbsp;</td>'.
                        '<td>&nbsp;</td>'.
                        '<td class="float-right">Total</td>'.
                        '<td>'.number_format($amount).'</td>'.
                        '<td>&nbsp;</td>'.
                    '</tr>'.
                '</tbody>';

            return Response($output);


            echo "<pre>";
            print_r($purchases);
            exit();

            return DataTables::of($purchases)
                ->AddColumn('action', function($purchases){
                    '<a onClick="showData('.$purchases->id.')" class="btn btn-sm btn-success">Show</a>'.' '.
                    '<a onClick="editDorms('.$purchases->id.')" class="btn btn-sm btn-success">Edit</a>'.' '.
                    '<a onClick="destroy('.$purchases->id.')" class="btn btn-sm btn-success">Delete</a>';
                })->make(true);

            return response()->json([
                'data' => $purchase,
                'schedules' => $schedules
            ]);
        }

    public function lovegift(Request $request)
        {
            $liabilities = Liability::whereVendorId($request->vendor)
                        ->whereMonth('created_at', '>=', $request->month)
                        ->whereYear('created_at', '=', $request->year)
                        ->get();

            $output = '<thead>'.
                        '<tr>'.
                            '<th>#</th>'.
                            '<th>Statement</th>'.
                            '<th>requested</th>'.
                            '<th>Paid</th>'.
                            '<th>Amount</th>'.
                        '</tr>'.
                    '</thead>'.
                    '<tbody>';

            if($liabilities){
                $count=1;
                $amount=0;
                foreach ($liabilities as $liability) {
                    $amount += $liability->amount;
                    $output.='<tr>'.
                                '<td>'.$count ++.'</td>'.
                                '<td>'.$liability->statement->titleincome.'</td>'.
                                '<td>'.$liability->created_at.'</td>'.
                                '<td>'.$liability->paid.'</td>'.
                                '<td>'.number_format($liability->amount).'</td>'.
                            '</tr>';
                    }
                    $output.='<tr>'.
                                '<td>&nbsp;</td>'.
                                '<td>&nbsp;</td>'.
                                '<td>&nbsp;</td>'.
                                '<td class="float-right">Total</td>'.
                                '<td>'.number_format($amount).'</td>'.
                            '</tr>';
                return Response($output);
                }
        }

    public function notereceivable(Request $request)
        {
            $liabilities = StatementOfAccount::whereVendorId($request->vendor)
                            ->whereMonth('created_at', '>=', $request->month)
                            ->whereYear('created_at', '=', $request->year)
                            ->get();

            if($liabilities){
            $count=1;
            $amount=0;
            $output = '<thead>'.
                            '<tr>'.
                                '<th>#</th>'.
                                '<th>Due</th>'.
                                '<th>Billed</th>'.
                                '<th>Amount</th>'.
                                '<th>Date</th>'.
                                '<th>Paid</th>'.
                                '<th>Casher</th>'.
                            '</tr>'.
                        '</thead>'.
                        '<tbody>';
            foreach ($liabilities as $liability) {
                $amount += $liability->amount;
                $output.='<tr>'.
                            '<td>'.$count ++.'</td>'.
                            '<td>'.$liability->due->format('M d, Y').'</td>'.
                            '<td>'.number_format($liability->billed).'</td>'.
                            '<td>'.number_format($liability->amount).'</td>'.
                            '<td>'.$liability->created_at.'</td>'.
                            '<td>'.$liability->terminate.'</td>'.
                            '<td>'.$liability->staff->fullname.'</td>'.
                        '</tr>';
                }
                $output.='<tr>'.
                            '<td>&nbsp;</td>'.
                            '<td>&nbsp;</td>'.
                            '<td>&nbsp;</td>'.
                            '<td>&nbsp;</td>'.
                            '<td class="float-right">Total</td>'.
                            '<td>&#8369;'.number_format($amount).'</td>'.
                            '<td>&nbsp;</td>'.
                        '</tr>'.
                        '</tbody>';
            return Response($output);
            }
        }
}
