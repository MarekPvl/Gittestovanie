<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\Addfriendmail;
use App\User;
use App\Addfriend;
use Auth;
use Route;
use Validator;
use DB;

class FriendsController extends Controller
{
	public function Addfriend( Request $request ) {

		$user = User::where('id', $request->input( 'userid' ))->first();

		$addfrienddata = new Addfriend();

		$addfrienddata->userid          = $request->input( 'userid' );
		$addfrienddata->username        = $user->name;
		$addfrienddata->useravatar      = $user->avatar;
		$addfrienddata->requesterid     = Auth::user()->id;
		$addfrienddata->requestername   = Auth::user()->name;
		$addfrienddata->requesteravatar = Auth::user()->avatar;
		$addfrienddata->type            = 'Request';

		$addfrienddata->save();

		$email = User::where('id', $request->input( 'userid' ) )->first();

		Mail::to($email->email)->send(new Addfriendmail($addfrienddata));

		return redirect()->back();

	}

	public function Deleterequest() {

		Addfriend::where( 'requesterid', Auth::user()->id )->where( 'type', 'Request' )->Delete();
		Addfriend::where( 'userid', Auth::user()->id )->where( 'type', 'Request' )->Delete();

		return redirect()->back();

	}

	public function Deletefriend(){

		Addfriend::where( 'requesterid', Auth::user()->id )->where( 'type', 'Friends' )->Delete();
		Addfriend::where( 'userid', Auth::user()->id )->where( 'type', 'Friends' )->Delete();

		return redirect()->back();
	}

	public function Friendsrequestslist() {

		$Friendsrequests = Addfriend::where('type','Request')->where('userid', Auth::user()->id)->simplePaginate( 10 );

		return view( 'pages.friendsrequests', [ 'Friendsrequests' => $Friendsrequests ] );

	}

	public function Acceptfriend(Request $request) {

		$Friendsrequests = Addfriend::where( 'id',$request->input('userid') )->where( 'type', 'Request' )->first();

		$Friendsrequests->type = 'Friends';

		$Friendsrequests->save();

		return redirect()->back();

	}

	public function Rejectfriend(Request $request) {

		Addfriend::where( 'id',$request->input('userid') )->where( 'type', 'Request' )->delete();

		return redirect()->back();

	}
}
