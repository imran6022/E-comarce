<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class VarificationController extends Controller
{
    function varify($token){
    	$user = User::where('remember_token', $token)->first();
    	if (!is_null($user)) {
    		$user->status = 1;
    		$user->remember_token = NULL;
    		$user->save();
	    	session()->flash('success', 'You are register successfully !! Login now');
	    	return redirect('/login');
    	}else{
    		session()->flash('success', 'Your token is not matched !!');
    		return redirect('/');
    	}
    }
}
