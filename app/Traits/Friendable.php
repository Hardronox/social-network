<?php

namespace App\Traits;

use App\Friendships;

trait Friendable{

	public function addFriend($requested_id)
	{
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
}