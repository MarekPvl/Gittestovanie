
@component('mail::layout')
	{{-- Header --}}
	@slot('header')
		@component('mail::header', ['url' => config('app.url')])
			Potvrdenie registrácie
		@endcomponent
	@endslot
	{{-- Body --}}
		Používateľ {{$addfrienddata->requestername}} Vás práve požiadal o priateľstvo. <br> Potvrdiť alebo zamietnuť ho môžete cez menu vo svojom profile.
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

