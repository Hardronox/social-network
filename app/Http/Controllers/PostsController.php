<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
	public function store(Request $request)
	{
		return Posts::create([
			'user_id'=>Auth::id(),
			'text'=> $request->text
		]);
    }
}
