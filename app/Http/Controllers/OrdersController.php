<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;
use App\Payment;
use App\Order;
use App\Cart;
use PDF;

//checkout start
class OrdersController extends Controller
{	
    public function index(){
    	$payments = Payment::orderBy('id', 'desc')->get();
    	return view('pages.checkouts', compact('payments'));
    }

    function store(Request $request){
    	$this->validate($request, [
    		'name' => 'required',
    		'phone_no' => 'required',
    		'shipping_address' => 'required',
    		'payment_id' => 'required',
    		]);

    	$order = new Order;
    	if ($request->payment_method_id != 2) {
    		if ($request->payment_id == null || empty($request->payment_id)) {
    			session()->flash('sticky_error', 'Please give transaction ID for your payment');
    			return back();
    		}
    	}

    	$order->name = $request->name;
    	$order->phone_no = $request->phone_no;
    	$order->email = $request->email;
    	$order->shipping_address = $request->shipping_address;
    	$order->payment_id = $request->payment_id;
    	$order->transaction_id = $request->transaction_id;
    	$order->ip_address = request()->ip();

    	$order->save();

    	foreach (Cart::totalCarts() as $cart) {
    		$cart->order_id = $order->id;
    		$cart->save();

    	}
    	session()->flash('success', 'your order has taken successfully !! Please wait admin confirmation.');
    	return redirect('/');

    }

// checkout end


//order start
    function order(){
        $Orders = Order::orderBy('id', 'desc')->get();
        return view('admin.order.order', compact('Orders'));
    }

    function order_show($id){
        $order = Order::find($id);
        $order->is_seenb_by_admin = 1;
        $order->save();
        return view('admin.order.show', compact('order'));
    }

    function order_complete($id)
    {
        $order = Order::find($id);
        if ($order->is_compleed) {
            $order->is_compleed = 0;
        }else{
            $order->is_compleed = 1;
        }

        $order->save();

        session()->flash('success', 'Order Completed !!');
        return back();
    }

     function order_paid($id)
    {
        $order = Order::find($id);
        if ($order->is_paid) {
            $order->is_paid = 0;
        }else{
            $order->is_paid = 1;
        }

        $order->save();

        session()->flash('success', 'Order Paid !!');
        return back();
    }


    function chargeUpdate(Request $request, $id){
        $order = Order::find($id);

        $order->shipping_charge = $request->shipping_charge;
        $order->custom_discount = $request->custom_discount;

        $order->save();

        session()->flash('success', 'Order charge & discount has change !!');
        return back();
    }


    function InvoiceGenerate($id){
        $order = Order::find($id);

        // return view('admin.order.invoice', compact('order'));
        $pdf = PDF::loadView('admin.order.invoice', compact('order'));
        return $pdf->stream('invoice.pdf');
    }

//order end

}
