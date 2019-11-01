<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cart;
use Auth;

class CartController extends Controller
{
    function cartStore(Request $request)
    {
    	$request->validate([
    		'product_id' => 'required'
    		],
    		[
    		'product_id.required' => 'Please give a product id'
    		]);

    	if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->first();
        }else{
            $cart = Cart::where('ip_address', request()->ip())
            ->where('product_id', $request->product_id)
            ->first();
        }
        

    	if (!is_null($cart)) {
    		$cart->increment('product_quantity');
    	}else{
    		$cart = new Cart();

	    	if (Auth::check()) {
	    		$cart->user_id = Auth::id();
	    	}
            $cart = new Cart();
	    	$cart->ip_address = request()->ip();
	    	$cart->product_id = $request->product_id;
	    	$cart->user_id = Auth::id();
	    	$cart->save();
    	}

    	
    	session()->flash('success', 'Product has added to cart !!');
    	return back();
    }


    function cart(){
        return view('pages.cart');
    }

    function cartUpdate(Request $request, $id){
        $cart = Cart::find($id);

        if (!is_null($cart)) {
            $cart->product_quantity = $request->product_quantity;
            $cart->save();
        }else{
            return redirect()->route('cart');
        }

        session()->flash('success', 'Cart item has update successfully !!');
        return back();
    }

    function cartDelete(Request $request, $id){
        $cart = Cart::find($id);

        if (!is_null($cart)) {
           $cart->delete();
        }else{
            return redirect('cart');
        }
        session()->flash('success', 'Cart item has delete successfully !!');
        return back();
    }


}
