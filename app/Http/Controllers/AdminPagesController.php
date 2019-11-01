<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;


class AdminPagesController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    function index(){
    	$orders = Order::orderBy('id', 'desc')->get();
    	return view('admin.index', compact('orders'));
    }

  
}
