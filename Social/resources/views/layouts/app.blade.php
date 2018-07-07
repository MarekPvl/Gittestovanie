<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
		            {{ config('app.name', 'Laravel') }}
	            </a>

	            {{--Upravene menu o zoznam pouzivatelov--}}

	            <a class="nav-link" id="color-list" href="{{ url('Users') }}">
		                {{ __('Zoznam používateľov') }}
	            </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else

                            <li class="nav-item dropdown menu-width">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle float-right" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
	                                {{ Auth::user()->name }}
	                                @if(count($friendsrequests) > 0)
		                                <span class="badge badge-pill badge-danger">{{count($friendsrequests)}}</span>
	                                @else
									@endif

	                                <span class="avatar" >
		                                <img class="profile-img" src="{{URL::asset('storage/app/public/avatars/'.Auth::user()->avatar)}}" alt="{{Auth::user()->name}}">
								 </span>
									{{--<span class="caret"></span>--}}
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	                            <!-- Ziadosti o priatelstvo-->
	                                <a class="dropdown-item" href="{{ url('Friendsrequests') }}">
		                                {{ __('Žiadosti o priateľstvo') }}
		                                @if(count($friendsrequests) > 0)
		                                <span class="badge badge-pill badge-danger">{{count($friendsrequests)}}</span>
										@else
		                                @endif
	                                </a>
	                             <!-- Uprava profilu-->
	                                <a class="dropdown-item" href="{{ url('user/profile') }}">
		                                {{ __('Upraviť profil') }}
	                                </a>

	                                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

