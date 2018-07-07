<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Status extends Model
{

	protected $table = 'status';

	public function like(){
		return $this->hasMany('App\Like', 'status_id')->where('type','like');
	}
	public function dislike(){
		return $this->hasMany('App\Like', 'status_id')->where('type','dislike');
	}
}
