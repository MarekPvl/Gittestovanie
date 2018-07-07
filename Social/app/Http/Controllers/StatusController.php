<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Status;
use Auth;
use Route;
use Validator;
use DB;

class StatusController extends Controller {
	public function status( Request $request ) {

		$validator = Validator::Make( $request->all(), [
			//'status' => 'required|regex:/^[\pL\s\-]+$/u|max:500',
		] );

		if ( $validator->fails() ) {
			return back()
				->withErrors( $validator )
				->withInput();
		}

		/*
		 **
		 *** update data
		 **
		 */

		$userId = Auth::user()->id;

		$userdata = new Status();


		$userdata->userid = $userId;
		$userdata->name   = Auth::user()->name;
		$userdata->avatar = Auth::user()->avatar;
		$userdata->status = $request->input( 'status' );

		$userdata->save();

		return redirect()->back();

	}


}
