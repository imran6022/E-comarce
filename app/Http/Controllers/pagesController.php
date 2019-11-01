<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class pagesController extends Controller
{
    function index(){
    	$products = Product::orderBy('id', 'desc')->paginate(9);
    	return view('pages.index', compact('products'));
    }

    function search(Request $request){
    	$search = $request->search;
    	$products = Product::orwhere('title', 'like', '%'.$search.'%')
    	->orwhere('description', 'like', '%'.$search.'%')
    	->orwhere('price', 'like', '%'.$search.'%')
    	->orderBy('id', 'desc')
    	->paginate(9);
    	return view('pages.products.search', compact('products', 'search'));
    }

    function products(){
    	$products = Product::orderBy('id', 'desc')->paginate(9);
    	return view('pages.products.index', compact('products'));
    }

    function products_show($slug){
    	$product = Product::where('slug', $slug)->first();
    	if (!is_null($product)) {
    		return view('pages.products.show', compact('product'));
    	}else{
    		session()->flash('success', 'Sorry There is no product');
    		return redirect()->route('products');
    	}
    	
    }
}
