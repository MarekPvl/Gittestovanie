<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Mail\Log;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers;


class MailController extends Controller
{
    public function send(Request $request, $user){

	    Mail::to( $user['email'] )->send( new Log( $user ) );


		    /*$order = Order::findOrFail($orderId);

		    // Ship order...

		    Mail::to($request->user())->send(new OrderShipped($order));*/
    }
}
