<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Product_image;
use App\Category;
use App\Brand;
use Image;
use App\Http\Requests\FormValidation;

class ProductController extends Controller
{

	  function product(){
        $products = Product::orderBy('id', 'desc')->paginate(10);
        return view('admin.product.mamageProduct', compact('products'));
    }

    function product_create(){
    	$brands = Brand::orderBy('id', 'desc')->get();
    	return view('admin.product.create', compact('brands'));
    }

    function product_store(FormValidation $request){

    	$product = new Product;

    	$product->title = $request->title;
    	$product->description = $request->description;
    	$product->price = $request->price;
    	$product->quantity = $request->quantity;

    	$product->category_id = $request->category_id;
    	$product->brand_id = $request->brand_id;
    	$product->admin_id = 1;
    	$product->slug = str_slug($request->title);
    	$product->save();

        if(count($request->image) > 0){
            foreach ($request->image as $image) {
                    // $image = $request->file('image');
                    $img = time() . '.' . $image->getClientOriginalExtension();
                    $location = public_path('images/product/' .$img);
                    Image::make($image)->save($location);

                    $product_img = new Product_image;
                    $product_img->product_id = $product->id;
                    $product_img->image = $img;
                    $product_img->save();
            }
        }

    	return redirect()->route('admin.product')->with('success', 'Insert Successfully');
    }

    function product_edit($id){
        $product = Product::find($id);
        return view('admin.product.edit', compact('product'));
    }

    function product_update(Request $request, $id){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'category_id' => 'required',
            'brand_id' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = Product::find($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category_id;
    	$product->brand_id = $request->brand_id;
        $product->save();

        return redirect()->route('admin.product')->with('success', 'Update Successfully');
    }

    function product_delete($id){
        $product = Product::find($id);
        if (!is_null($product)) {
            $product->delete();
        }
        session()->flash('success', 'Product has deleted successfully ');
        return back();
    }
    
}
