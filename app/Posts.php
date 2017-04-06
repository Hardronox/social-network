<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    public $fillable=['user_id','text'];

	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
