<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Auth;
use Route;
use Validator;
use DB;

class UpdateController extends Controller
{
	public function update( Request $updata ) {


		/*
		 **
		 *** Validate data
		 **
		 */

		$validator = Validator::Make( $updata->all(), [
			'name'    => 'required|regex:/^[\pL\s\-]+$/u|max:30|unique:users,email,' . Auth::user()->id,
			'email'   => 'required|email|unique:users,email,' . Auth::user()->id,
			'birth'   => 'required|date|before:today',
			'gender'  => 'required|in:male,female',
			'city'    => 'required|regex:/^[\pL\s\-]+$/u|max:30',
			'country' => 'required|regex:/^[\pL\s\-]+$/u|max:30',

		] );

		if ( $validator->fails() ) {
			return back()
				->withErrors( $validator )
				->withInput();
		}

		/*
		 **
		 *** update users data
		 **
		 */
		$userId   = Auth::user()->id;
		$userdata = User::find( $userId );

		$userdata->name    = $updata->input( 'name' );
		$userdata->email   = $updata->input( 'email' );
		$userdata->birth   = $updata->input( 'birth' );
		$userdata->gender  = $updata->input( 'gender' );
		$userdata->city    = $updata->input( 'city' );
		$userdata->country = $updata->input( 'country' );

		$userdata->save();

		return redirect()->back();

	}

	public function image( Request $request ) {

		/*
		 **
		 *** upload/update image
		 **
		 */

		$validator = Validator::Make( $request->all(), [
			'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|Max:4096'
		] );

		if ( $validator->fails() ) {
			return back()
				->withErrors( $validator )
				->withInput();
		}

		$user     = Auth::user()->id;
		$userdata = User::find( $user );

		$avatarName = $user . '_avatar' . time() . '.' . request()->avatar->getClientOriginalExtension();

		$request->avatar->storeAs( 'avatars', $avatarName );

		$userdata->avatar = $avatarName;

		$userdata->save();

		return redirect()->back();

	}
}
