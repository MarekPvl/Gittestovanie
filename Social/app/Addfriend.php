<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addfriend extends Model
{
    protected $table = 'addfriend';

	protected $fillable = [
		'userid'
	];
}
