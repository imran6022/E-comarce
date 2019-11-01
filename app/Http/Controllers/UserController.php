<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\User;
use Auth;


class UserController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    function dashboard()
    {
    	$user = Auth::user();
    	return view('pages.user.dashboard', compact('user'));
    }

    function Profile()
    {
    	$user = Auth::user();
    	return view('pages.user.profile', compact('user'));
    }

    function updateProfile(Request $request)
    {
    	$user = Auth::user();

    	$request->validate([
    		'first_name' => 'required', 'string', 'max:255',
            'username' => 'required', 'string', 'max:255',
            'phone_no' => 'required', 'unique:users' . $user->id,
            'street_address' => 'required',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users' . $user->id,
            'password' =>  'string', 'min:8', 'confirmed',
    		]);

    	$user->first_name = $request->first_name;
    	$user->last_name = $request->last_name;
    	$user->username = $request->username;
    	$user->phone_no = $request->phone_no;
    	$user->email = $request->email;
    	$user->street_address = $request->street_address;
    	$user->password = Hash::make($request->password);
    	// $user->ip_address = request()->ip();

    	$user->save();

    	session()->flash('success', 'user profile has updated !!');
    	return redirect()->route('user.profile');
    }

}
