<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Comment;
use Auth;
use Route;
use Validator;
use DB;


class CommentsController extends Controller {
	public function comment( Request $request ) {

		$validator = Validator::Make( $request->all(), [
			'comment' => 'regex:/^[\pL\s\-]+$/u|max:100',
		] );

		if ( $validator->fails() ) {
			return back()
				->withErrors( $validator )
				->withInput();
		}

		/*
		 **
		 *** Pridanie commentu
		 **
		 */


		$userId      = Auth::user()->id;
		$commentdata = new Comment();

		$commentdata->user_id   = $userId;
		$commentdata->name      = Auth::user()->name;
		$commentdata->avatar    = Auth::user()->avatar;
		$commentdata->status_id = $request->input( 'statusid' );
		$commentdata->comment   = $request->input( 'comment' . $request->input( 'statusid' ) );


		$commentdata->save();

		return redirect()->back()->withInput();
	}

}
