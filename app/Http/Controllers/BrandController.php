<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use Image;
use File;

class BrandController extends Controller
{
    function brand(){
    	$brands = Brand::orderBy('id', 'desc')->paginate(10);
    	return view('admin.brand.index', compact('brands'));
    }

    function brand_create(){
    	return view('admin.brand.create');
    }

    function brand_store(Request $request){

    	$request->validate([
    		'name' => 'required',
    		'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    		]);

    	$brand = new Brand;

    	$brand->name = $request->name;
    	$brand->description = $request->description;

    	if (count($request->image) > 0) {
    		$image = $request->file('image');
    		$img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/brand/' .$img);
            Image::make($image)->save($location);
            $brand->image = $img;
    	}

    	$brand->save();

    	session()->flash('success', 'Brand insert seccessfully');
    	return redirect()->route('admin.brand');

    }

    function brand_edit($id){
    	$brand = Brand::find($id);
    	return view('admin.brand.edit', compact('brand'));
    }

    function brand_update(Request $request, $id){
    	$request->validate([
    		'name' => 'required',
    		'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    		]);

    	$brand = Brand::find($id);

    	$brand->name = $request->name;
    	$brand->description = $request->description;

    	if (count($request->image) > 0) {
    		if (File::exists('images/brand/'. $brand->image )) {
    			File::delete('images/brand/'. $brand->image);
    		}
    		$image = $request->file('image');
    		$img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/brand/' .$img);
            Image::make($image)->save($location);
            $brand->image = $img;
    	}

    	$brand->save();

    	session()->flash('success', 'Brand Update seccessfully');
    	return redirect()->route('admin.brand');
    }

    function brand_delete($id){

    	$brands = Brand::find($id);
    	if (!is_null($brands)) {

            if (File::exists('images/brand/'. $brands->image )) {
                File::delete('images/brand/'. $brands->image);
            }
            

    		$brands->delete();
    	}

    	session()->flash('success', 'Brand delete seccessfully');
    	return back();
    }
}
