<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use Validator;
use App\OrderDetail;
use App\Product;
use App\Table;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Alert;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('user_id',auth()->id())->orderBy('id','desc')->with('orderItems.product')->paginate(5);

        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($table)
    {
        $tavolina = Table::find($table);
        return view('orders.create',compact('tavolina'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $table)
    {
        $validator = Validator::make(json_decode($request->vlerat), [ 
            'input.*.prod_id'=>'required|unique',
            'input.*.sasia'=>'required',
            // 'input.*.T_id'=>'required',
        ]);

        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $input = json_decode($request->vlerat); 

        if(empty($input)) {
            return redirect('/orders')->with('error','Order Not Created');
        }
        // dd($input[0]->prod_id);

        //kthen nga e fundit pasi esht order by desc
        $orders = Order::orderBy('id','desc')->first(); 

        // dd($input);
        
        $order = new Order;
        $order->user_id = auth()->id();
        $order->T_id =$table;
        $orderSaved = $order->save();

            // Shtohen order_details ne Order
            foreach($input as $orderItem) {
                $input = array_merge((array)$orderItem,['order_id' => $order->id]);
                
                $orderDetails = OrderDetail::create($input);
                $product = Product::findOrFail($orderItem->prod_id);


                //Zbrit gjendjen nga inventari
                $product->gjendja = $product->gjendja - $orderItem->sasia;
                if($product->gjendja === 0) {
                    $product->shfaq = 0;
                }
                $product->save();
            }

        return redirect('/orders/'.($orders->id+1).'')->with('success','Order Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders = Order::where('id',$id)->with('orderItems.product')->get();
        $orders = $orders->find($id)->orderItems;

        $user = DB::table('users')->join('orders','users.id','=','orders.user_id')->where('orders.id',$id)->first();

        return view('orders.show',compact('orders','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
