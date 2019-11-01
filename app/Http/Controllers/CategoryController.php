<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Image;
use File;

class CategoryController extends Controller
{
    function caregory(){
    	$categorys = Category::orderBy('id', 'desc')->paginate(10);
    	return view('admin.category.index', compact('categorys'));
    }

    function caregory_create(){
    	$mainCategory = Category::orderBy('name', 'desc')->where('parent_id', NULL)->get();
    	return view('admin.category.create', compact('mainCategory'));
    }

    function caregory_store(Request $request){
    	$request->validate([
    		'name' => 'required',
    		'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    		],
    		[
    		'name.required' => 'Please provide a category name',
    		]);

    	$category = new Category;

    	$category->name = $request->name;
    	$category->description = $request->description;
    	$category->parent_id = $request->parent_id;

    	if (count($request->image) > 0) {
    		$image = $request->file('image');
    		$img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/category/' .$img);
            Image::make($image)->save($location);
            $category->image = $img;
    	}

    	$category->save();

    	session()->flash('success', 'Category insert seccessfully');
    	return redirect()->route('admin.category');

    }

    function caregory_edit($id){
    	$mainCategory = Category::orderBy('name', 'desc')->where('parent_id', NULL)->get();
    	$categorys = Category::find($id);
    	return view('admin.category.edit', compact('categorys', 'mainCategory'));
    }

    function caregory_update(Request $request, $id){
    	$request->validate([
    		'name' => 'required',
    		'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    		],
    		[
    		'name.required' => 'Please provide a category name',
    		]);

    	$category = Category::find($id);

    	$category->name = $request->name;
    	$category->description = $request->description;
    	$category->parent_id = $request->parent_id;

    	if (count($request->image) > 0) {
    		if (File::exists('images/category/'. $category->image )) {
    			File::delete('images/category/'. $category->image);
    		}
    		$image = $request->file('image');
    		$img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/category/' .$img);
            Image::make($image)->save($location);
            $category->image = $img;
    	}

    	$category->save();

    	session()->flash('success', 'Category update seccessfully');
    	return redirect()->route('admin.category');
    }

    function caregory_delete($id){
    	$categorys = Category::find($id);
    	if (!is_null($categorys)) {

            $subCategory = Category::orderBy('name', 'desc')->where('parent_id', $categorys->id)->get();
            
            foreach ($subCategory as $sub) {
                if (File::exists('images/category/'. $sub->image )) {
                File::delete('images/category/'. $sub->image);
            }
            }

            if (File::exists('images/category/'. $categorys->image )) {
                File::delete('images/category/'. $categorys->image);
            }
            

    		$categorys->delete();
    	}

    	session()->flash('success', 'Category delete seccessfully');
    	return back();
    }

    function caregory_show($id){
        $category = Category::find($id);
        if (!is_null($category)) {
            return view('pages.category.show', compact('category'));
        }else{
            session()->flash('errors', 'Sorry !! There is no products');
        }
        return redirect('/');
    }

}
