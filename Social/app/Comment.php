<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';

	public function commentlike(){
		return $this->hasMany('App\Like', 'comment_id')->where('type','like');
	}
	public function commentdislike(){
		return $this->hasMany('App\Like', 'comment_id')->where('type','dislike');
	}
}
