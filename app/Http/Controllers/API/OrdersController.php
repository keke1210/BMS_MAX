<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Http\Request\StoreOrders;
use Validator;
use App\OrderDetail;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('user_id',auth()->id())->with('orderItems.product')->get();

        return response()->json($orders->toArray(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [ 
            'input.*.prod_id'=>'required|distinct',
            'input.*.sasia'=>'required'
        ]);

        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $input = $request->all(); 
        
        //return response()->json($input, 200);
        
        $order = new Order;
        $order->user_id = auth()->id();
        $orderSaved = $order->save();
    
            foreach($input as $orderItem) {
                $input = array_merge($orderItem,['order_id' => $order->id]);
                $orderDetails = OrderDetail::create($input);
            }
            
        
        return response()->json($order::where('id',$order->id)->with('orderItems.product')->get(), 200);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders = Order::where('id',$id)->where('user_id',auth()->id())->with('orderItems.product')->get();
        
        return response()->json($orders->toArray() ,200);
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
        // Add orderItems to the actual Order

        $validator = Validator::make($request->all(), [ 
            'input.*.prod_id'=>'required',
            'input.*.sasia'=>'required'
        ]);

        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $input = $request->all(); 
        
        $order = Order::find($id);
    
            foreach($input as $orderItem) {
                $input = array_merge($orderItem,['order_id' => $order->id]);
                $orderDetails = OrderDetail::create($input);
            }
        
        
        return response()->json($order::where('id',$order->id)->with('orderItems.product')->get(), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /** fshin Orderin bashke me Detaje */

        $orderDetail = OrderDetail::where('order_id',$id);
        $order = Order::find($id);

        if(is_null($order)) {
            return response()->json(['error'=>'Order not found'],401);
        }

        //fshin Detajet e orderit
        $orderDetail->delete();
        
        //Fshin orderin
        $order->delete();

        return response()->json(['success'=>'Order deleted'],204);
    }
}
