<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

use App\Status;
use App\User;
use App\Comment;
use App\Addfriend;
use Auth;
use Route;
use Validator;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\Addfriendmail;


class PageController extends Controller {
	public function profile() {
		/*
		 **
		 *** Users profile
		 **
		 */
		$userId   = Auth::user()->id;
		$userdata = User::find( $userId );

		return view( 'pages.update' )->with( 'userdata', $userdata );
	}

	public function users() {
		/*
		 **
		 *** Users list
		 **
		 */

		$users = User::simplePaginate( 10 );

		return view( 'pages.users', [ 'users' => $users ] );

	}

	public function view( $name ) {

		$user = User::where( 'name', $name )->first();
		if ( isset( $user ) ) {
			$statuses = Status::where( 'userid', $user->id )->where( 'avatar', $user->avatar )->latest()->paginate( 3 );

			$comments = Comment::all();

			$test = Status::all();

			$existsfriendsrequesta = Addfriend::where( 'requesterid',
				Auth::check() ? Auth::user()->id : '0' )->where( 'userid', $user->id )->where( 'type',
				'Request' )->get();
			$existsfriendsrequestb = Addfriend::where( 'userid',
				Auth::check() ? Auth::user()->id : '0' )->where( 'requesterid', $user->id )->where( 'type',
				'Request' )->get();
			$existsfriendsa        = Addfriend::where( 'requesterid',
				Auth::check() ? Auth::user()->id : '0' )->where( 'userid', $user->id )->where( 'type',
				'Friends' )->get();
			$existsfriendsb        = Addfriend::where( 'userid',
				Auth::check() ? Auth::user()->id : '0' )->where( 'requesterid', $user->id )->where( 'type',
				'Friends' )->get();


			return view( 'pages.view', [
				'statuses'              => $statuses,
				'user'                  => $user,
				'test'                  => $test,
				'comments'              => $comments,
				'existsfriendsrequesta' => $existsfriendsrequesta,
				'existsfriendsa'        => $existsfriendsa,
				'existsfriendsrequestb' => $existsfriendsrequestb,
				'existsfriendsb'        => $existsfriendsb
			] );
		}

		return abort( '404' );

	}

}

/* Eroors , Controllers, Modely ako prepajat tabulky, Validacia lepsia, Zvalidovat aj to co posielam cez hidden input napr status-id */

/*
 * Ked to priatelstvo poziada opacne tak to neregistruje
 PRIDAT MOJE STATUSY a VSETKy statusy

*/

