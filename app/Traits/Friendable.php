<?php

namespace App\Traits;

use App\Friendships;
use App\User;

trait Friendable{

	public function addFriend($requested_id)
	{
		//security
		if ($this->id === $requested_id)
			return 0;

		if ($this->hasPendingFriendRequestSentTo($requested_id))
			return 'Already sent a friend request';

		if ($this->isFriendsWith($requested_id))
			return 'Already friends';
		// /security

		$friendship=Friendships::create([
			'requester'=>$this->id,
			'user_requested'=>$requested_id
		]);

		if ($friendship)
			return response()->json($friendship,200);


		return response()->json('fail',501);

	}


	public function acceptFriend($requester)
	{
		if ($this->hasPendingFriendRequestFrom($requester) === 0)
			return 0;

		$friendship= Friendships::where([
			'requester'=>$requester,
			'user_requested'=>$this->id,
		])->first();

		if ($friendship){
			$friendship->update([
				'status'=>1
			]);

			return response()->json('Ok',200);
		}


		return response()->json('fail',501);
	}


	public function friends()
	{
		$friends= Friendships::where('status', '=', 1)
								->where('requester', '=', $this->id)
								->orWhere('user_requested', '=', $this->id)
								->get();



		return response()->json($friends,501);
	}


	public function pendingFriendRequests()
	{
		$users=[];

		$friends= Friendships::where('status', '=', 0)
			->where('user_requested', '=', $this->id)
			->get();


		foreach ($friends as $friend) {
			array_push($users, User::find($friend->requester));
		}

		return $users;
	}


	public function pendingFriendRequestsSent()
	{
		$users=[];

		$friends= Friendships::where('status', '=', 0)
			->where('requester', '=', $this->id)
			->get();

		foreach ($friends as $friend) {
			array_push($users, User::find($friend->requester));
		}

		return $users;
	}


	public function friendsIds()
	{
		return collect($this->friends())->pluck('id');
	}


	public function pendingFriendsRequestIds()
	{
		return collect($this->pendingFriendRequests())->pluck('id')->toArray();
	}


	public function pendingFriendRequestsSentIds()
	{
		return collect($this->pendingFriendRequestsSent())->pluck('id')->toArray();
	}


	public function isFriendsWith($user_id)
	{
		if (in_array($user_id, $this->friendsIds()->toArray()))
			return 1;
		else
			return 0;
	}


	public function hasPendingFriendRequestFrom($user_id)
	{
		if (in_array($user_id, $this->pendingFriendsRequestIds()))
			return 1;
		else
			return 0;
	}


	public function hasPendingFriendRequestSentTo($user_id)
	{
		if (in_array($user_id, $this->pendingFriendRequestsSentIds()))
			return 1;
		else
			return 0;
	}
}