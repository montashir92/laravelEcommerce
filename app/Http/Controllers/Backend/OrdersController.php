<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use PDF;

class OrdersController extends Controller
{
    
    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->get();
        return view('backend.pages.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function completed($id)
    {
        $order = Order::find($id);
        if($order->is_complete){
            $order->is_complete = 0;
        }else{
           $order->is_complete = 1; 
        }
        $order->save();
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function paid($id)
    {
        $order = Order::find($id);
        if($order->is_paid){
            $order->is_paid = 0;
        }else{
           $order->is_paid = 1; 
        }
        $order->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        $order->is_seen_by_admin = 1;
        $order->save();
        return view('backend.pages.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function invoice($id)
    {
        $order = Order::find($id);
        
        $pdf = PDF::loadView('backend.pages.orders.invoice', compact('order'));
        return $pdf->stream('invoice.pdf');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCharge(Request $request, $id)
    {
        $order = Order::find($id);
        $order->shipping_charge = $request->shipping_charge;
        $order->customer_discount = $request->customer_discount;
        $order->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $order = Order::find($request->id);
        if(!is_null($order)){
           $order->delete(); 
        }
        
        return back()->with('success', 'Order Deleted Successfully..');
    }
}
