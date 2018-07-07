@if($user['gender']=='male')
	{{--}}<!DOCTYPE html>
	<html>
	<head>
		<title>Send email</title>
	</head>
	<body>
		<h2>
			Ahoj {{$user['name']}}, bol si úspešne zaregistrovaný na stránke {{ config('app.name') }}.
		</h2>
	</body>
	</html>--}}
	@component('mail::layout')
		{{-- Header --}}
		@slot('header')
			@component('mail::header', ['url' => config('app.url')])
				Potvrdenie registrácie
			@endcomponent
		@endslot
		{{-- Body --}}
		Ahoj {{$user['name']}}, bol si úspešne zaregistrovaný na stránke {{ config('app.name') }}.
		{{-- Subcopy --}}
		@isset($subcopy)
			@slot('subcopy')
				@component('mail::subcopy')
					{{ $subcopy }}
				@endcomponent
			@endslot
		@endisset
		{{-- Footer --}}
		@slot('footer')
			@component('mail::footer')
				© {{ date('Y') }} {{ config('app.name') }}.
			@endcomponent
		@endslot
	@endcomponent

@else
	{{--<!DOCTYPE html>
	<html>
	<head>
		<title>Send email</title>
	</head>
	<body>

		Ahoj {{$user['name']}}, bola si úspešne zaregistrovaná na stránke {{ config('app.name') }}.

	</body>
	</html>--}}
	@component('mail::layout')
		{{-- Header --}}
		@slot('header')
			@component('mail::header', ['url' => config('app.url')])
				Potvrdenie registrácie
			@endcomponent
		@endslot
		{{-- Body --}}
		Ahoj {{$user['name']}}, bola si úspešne zaregistrovaná na stránke {{ config('app.name') }}.
		{{-- Subcopy --}}
		@isset($subcopy)
			@slot('subcopy')
				@component('mail::subcopy')
					{{ $subcopy }}
				@endcomponent
			@endslot
		@endisset
		{{-- Footer --}}
		@slot('footer')
			@component('mail::footer')
				© {{ date('Y') }} {{ config('app.name') }}.
			@endcomponent
		@endslot
	@endcomponent
@endif