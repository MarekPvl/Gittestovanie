<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Mail\Log;
use Illuminate\Http\Request;

use App\Status;
use App\Like;
use Auth;
use Route;
use Validator;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     * Zakomentovany auth controct !!!!!!
     */


    /*public function __construct()
    {
        $this->middleware('auth');
    }*/


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     * @param $name
     */
    public function index()
    {
	    $statuses = Status::latest()->Paginate(3);
	    $test = Status::all();
	    $comments = Comment::all();
	    $likes = Like::all();
	    $likecount = Like::where('type', 'like')->get();
	    $dislikecount = Like::where('type', 'dislike')->get();
	    $numberofdislikes = 0;
	    $numberoflikes = 0;

	    return view('home', ['statuses' => $statuses, 'test' => $test, 'comments' => $comments, 'likecount' => $likecount,
	                         'dislikecount' => $dislikecount, 'likes' => $likes, 'numberoflikes' => $numberoflikes,
	                         'numberofdislikes' => $numberofdislikes ]);

    }


}
