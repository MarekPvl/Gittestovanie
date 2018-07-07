<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Addfriend;
use Auth;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
	    view()->composer( 'layouts/app', function ( $view ) {
		    $friendsrequests = Addfriend::where( 'userid', Auth::check() ? Auth::user()->id : '0' )->where( 'type', 'Request' )->get();
		    $view->with( 'friendsrequests', $friendsrequests );

	    } );
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
