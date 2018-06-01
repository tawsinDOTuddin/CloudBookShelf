<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile($username)
    {
    	$user = User::where('username', $username)->first();
    	return view('profile', compact('user'));
    }
}
