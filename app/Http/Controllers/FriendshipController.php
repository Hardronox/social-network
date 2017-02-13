<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendshipController extends Controller
{
	public function check($id)
	{
		if(Auth::user()->is_friends_with($id) === 1)
		{
			return [ "status" => "friends" ];
		}

		var_dump('<pre>', Auth::user()->is_friends_with($id), '</pre>');
		exit;
		if(Auth::user()->has_pending_friend_request_from($id))
		{
			return [ "status" => "pending" ];
		}
		if(Auth::user()->has_pending_friend_request_sent_to($id))
		{
			return [ "status" => "waiting" ];
		}
		return [ "status" => 0 ];
    }

	public function addFriend($id)
	{
		return Auth::user()->add_friend($id);
	}

	public function acceptFriend($id)
	{
		return Auth::user()->accept_friend($id);
	}
}
