<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
	public function notifications()
	{
		Auth::user()->unreadNotifications->markAsRead();
		return view('nots')->with('nots',Auth::user()->notifications);
    }
}
