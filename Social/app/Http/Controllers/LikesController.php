<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Pagination\Paginator;

use App\Status;
use App\User;
use App\Comment;
use App\Like;
use App\Addfriend;
use Auth;
use Route;
use Validator;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\Addfriendmail;

class LikesController extends Controller
{
	public function like( Request $request ) {

		$validator = Validator::Make( $request->all(), [
			'statusid'  => 'integer',
			'commentid' => 'integer',
		] );

		if ( $validator->fails() ) {
			return back()
				->withErrors( $validator )
				->withInput();
		}

		$userId = Auth::user()->id;

		$likecheck           = Like::where( 'user_id', $userId )->where( 'type', 'like' )->where( 'status_id',
			$request->input( 'statusid' ) )->first();
		$dislikecheck        = Like::where( 'user_id', $userId )->where( 'type', 'dislike' )->where( 'status_id',
			$request->input( 'statusid' ) )->first();
		$commemntlikecheck   = Like::where( 'user_id', $userId )->where( 'type', 'like' )->where( 'comment_id',
			$request->input( 'commentid' ) )->first();
		$commentdislikecheck = Like::where( 'user_id', $userId )->where( 'type', 'dislike' )->where( 'comment_id',
			$request->input( 'commentid' ) )->first();
		$likedata            = new Like();

		if ( $request->input( 'commentid' ) == null ) {
			if ( is_null( $likecheck ) ) {

				if ( isset( $dislikecheck ) ) {
					$dislikecheck->delete();

					$likedata->user_id = $userId;
					$likedata->name    = Auth::user()->name;
					$likedata->avatar  = Auth::user()->avatar;

					if ( $request->input( 'statusid' ) == null ) {
						$likedata->status_id = 0;
					} else {
						$likedata->status_id = $request->input( 'statusid' );
					};

					if ( $request->input( 'commentid' ) == null ) {
						$likedata->comment_id = 0;
					} else {
						$likedata->comment_id = $request->input( 'commentid' );
					}

					$likedata->type = 'like';


					$likedata->save();


					return redirect()->back();
				} else {
					$likedata->user_id = $userId;
					$likedata->name    = Auth::user()->name;
					$likedata->avatar  = Auth::user()->avatar;

					if ( $request->input( 'statusid' ) == null ) {
						$likedata->status_id = 0;
					} else {
						$likedata->status_id = $request->input( 'statusid' );
					};

					if ( $request->input( 'commentid' ) == null ) {
						$likedata->comment_id = 0;
					} else {
						$likedata->comment_id = $request->input( 'commentid' );
					}

					$likedata->type = 'like';

					$likedata->save();

					return redirect()->back();
				}

			} elseif ( is_null( $dislikecheck ) ) {

				Like::where( 'user_id', $userId )->where( 'type', 'like' )->where( 'status_id',
					$request->input( 'statusid' ) )->delete();

				return redirect()->back();

			} else {

				$dislikecheck->delete();

				return redirect()->back();
			}
		} else {
			if ( is_null( $commemntlikecheck ) ) {
				if ( isset( $commentdislikecheck ) ) {
					$commentdislikecheck->delete();

					$likedata->user_id = $userId;
					$likedata->name    = Auth::user()->name;
					$likedata->avatar  = Auth::user()->avatar;

					if ( $request->input( 'statusid' ) == null ) {
						$likedata->status_id = 0;
					} else {
						$likedata->status_id = $request->input( 'statusid' );
					};

					if ( $request->input( 'commentid' ) == null ) {
						$likedata->comment_id = 0;
					} else {
						$likedata->comment_id = $request->input( 'commentid' );
					}

					$likedata->type = 'like';

					$likedata->save();

					return redirect()->back();
				} else {
					$likedata->user_id = $userId;
					$likedata->name    = Auth::user()->name;
					$likedata->avatar  = Auth::user()->avatar;

					if ( $request->input( 'statusid' ) == null ) {
						$likedata->status_id = 0;
					} else {
						$likedata->status_id = $request->input( 'statusid' );
					};

					if ( $request->input( 'commentid' ) == null ) {
						$likedata->comment_id = 0;
					} else {
						$likedata->comment_id = $request->input( 'commentid' );
					}

					$likedata->type = 'like';

					$likedata->save();

					return redirect()->back();
				}

			} elseif ( is_null( $commentdislikecheck ) ) {

				Like::where( 'user_id', $userId )->where( 'type', 'like' )->where( 'comment_id',
					$request->input( 'commentid' ) )->delete();

				return redirect()->back();

			} else {

				$commentdislikecheck->delete();

				return redirect()->back();
			}
		}
	}


	public function dislike( Request $request ) {


		$validator = Validator::Make( $request->all(), [
			'statusid'  => 'integer',
			'commentid' => 'integer',

		] );

		if ( $validator->fails() ) {
			return back()
				->withErrors( $validator )
				->withInput();
		}

		$userId              = Auth::user()->id;
		$likecheck           = Like::where( 'user_id', $userId )->where( 'type', 'like' )->where( 'status_id',
			$request->input( 'statusid' ) )->first();
		$dislikecheck        = Like::where( 'user_id', $userId )->where( 'type', 'dislike' )->where( 'status_id',
			$request->input( 'statusid' ) )->first();
		$commentlikecheck    = Like::where( 'user_id', $userId )->where( 'type', 'like' )->where( 'comment_id',
			$request->input( 'commentid' ) )->first();
		$commentdislikecheck = Like::where( 'user_id', $userId )->where( 'type', 'dislike' )->where( 'comment_id',
			$request->input( 'commentid' ) )->first();
		$likedata            = new Like();

		if ( $request->input( 'commentid' ) == null ) {
			if ( is_null( $dislikecheck ) ) {

				if ( isset( $likecheck ) ) {
					$likecheck->delete();

					$likedata->user_id = $userId;
					$likedata->name    = Auth::user()->name;
					$likedata->avatar  = Auth::user()->avatar;

					if ( $request->input( 'statusid' ) == null ) {
						$likedata->status_id = 0;
					} else {
						$likedata->status_id = $request->input( 'statusid' );
					};

					if ( $request->input( 'commentid' ) == null ) {
						$likedata->comment_id = 0;
					} else {
						$likedata->comment_id = $request->input( 'commentid' );
					}

					$likedata->type = 'dislike';


					$likedata->save();


					return redirect()->back();
				} else {
					$likedata->user_id = $userId;
					$likedata->name    = Auth::user()->name;
					$likedata->avatar  = Auth::user()->avatar;

					if ( $request->input( 'statusid' ) == null ) {
						$likedata->status_id = 0;
					} else {
						$likedata->status_id = $request->input( 'statusid' );
					};

					if ( $request->input( 'commentid' ) == null ) {
						$likedata->comment_id = 0;
					} else {
						$likedata->comment_id = $request->input( 'commentid' );
					}

					$likedata->type = 'dislike';

					$likedata->save();

					return redirect()->back();
				}

			} elseif ( is_null( $likecheck ) ) {

				Like::where( 'user_id', $userId )->where( 'type', 'dislike' )->where( 'status_id',
					$request->input( 'statusid' ) )->delete();

				return redirect()->back();

			} else {

				$likecheck->delete();

				return redirect()->back();
			}
		} else {
			if ( is_null( $commentdislikecheck ) ) {

				if ( isset( $commentlikecheck ) ) {

					$commentlikecheck->delete();

					$likedata->user_id = $userId;
					$likedata->name    = Auth::user()->name;
					$likedata->avatar  = Auth::user()->avatar;

					if ( $request->input( 'statusid' ) == null ) {
						$likedata->status_id = 0;
					} else {
						$likedata->status_id = $request->input( 'statusid' );
					};

					if ( $request->input( 'commentid' ) == null ) {
						$likedata->comment_id = 0;
					} else {
						$likedata->comment_id = $request->input( 'commentid' );
					}

					$likedata->type = 'dislike';


					$likedata->save();

					return redirect()->back();
				} else {
					$likedata->user_id = $userId;
					$likedata->name    = Auth::user()->name;
					$likedata->avatar  = Auth::user()->avatar;

					if ( $request->input( 'statusid' ) == null ) {
						$likedata->status_id = 0;
					} else {
						$likedata->status_id = $request->input( 'statusid' );
					};

					if ( $request->input( 'commentid' ) == null ) {
						$likedata->comment_id = 0;
					} else {
						$likedata->comment_id = $request->input( 'commentid' );
					}

					$likedata->type = 'dislike';

					$likedata->save();

					return redirect()->back();
				}

			} elseif ( is_null( $commentlikecheck ) ) {

				Like::where( 'user_id', $userId )->where( 'type', 'dislike' )->where( 'comment_id',
					$request->input( 'commentid' ) )->delete();

				return redirect()->back();

			} else {

				$commentlikecheck->delete();

				return redirect()->back();
			}
		}
	}
}
