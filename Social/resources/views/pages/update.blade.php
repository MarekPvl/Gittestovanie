@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-edit">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form class="inputs" method="POST" action="{{ url('update') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $userdata->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $userdata->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

	                    <!-- *
	                         **
	                         ***Pridane vlastne itemy
	                         -->

	                    <div class="form-group row">
		                    <label for="birth" class="col-md-4 col-form-label text-md-right">{{ __('Birth') }}</label>

		                    <div class="col-md-6">
			                    <input id="birth" type="date" class="form-control{{ $errors->has('birth') ? ' is-invalid' : '' }}" name="birth" value="{{ $userdata->birth }}" required autofocus>

			                    @if ($errors->has('birth'))
				                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('birth') }}</strong>
                                    </span>
			                    @endif
		                    </div>
	                    </div>

	                     <div class="form-group row {{ $errors->has('gender') ? ' has-error' : '' }}">
		                    <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
							@if( $userdata->gender == "male")
			                    <div class="col-md-6">
				                    <select name="gender" class="col-md-4 form-control" selected="{{ $userdata->gender }}">
					                    <option value="male" selected>Male</option>
					                    <option value="female">Female</option>
				                    </select>
				                    @if ($errors->has('gender'))
					                    <span class="help-block">
	                                        <strong>{{ $errors->first('gender') }}</strong>
	                                    </span>
				                    @endif
			                    </div>
	                    </div>
						@else
		                    <div class="col-md-6">
			                    <select name="gender" class="col-md-4 form-control" selected="{{ $userdata->gender }}">
				                    <option value="male">Male</option>
				                    <option value="female" selected>Female</option>
			                    </select>
			                    @if ($errors->has('gender'))
				                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
			                    @endif
		                    </div>
                </div>
						@endif
	                    <div class="form-group row">
		                    <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

		                    <div class="col-md-6">
			                    <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}"      name="city" value="{{ $userdata->city}}" required autofocus>

			                    @if ($errors->has('city'))
				                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
			                    @endif
		                    </div>
	                    </div>

	                    <div class="form-group row">
		                    <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

		                    <div class="col-md-6">
			                    <input id="Country" type="text" class="form-control{{ $errors->has('Country') ? ' is-invalid' : '' }}" name="country" value="{{ $userdata->country }}" required autofocus>

			                    @if ($errors->has('Country'))
				                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('Country') }}</strong>
                                    </span>
			                    @endif
		                    </div>
	                    </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Uložiť zmeny') }}
                                </button>
                            </div>
                        </div>
                    </form>

	            <span class="edit-picture"><img class="edit-img"
	                                            src="{{URL::asset('storage/app/public/avatars/'.Auth::user()->avatar)}}"
	                                            alt="{{Auth::user()->name}}"></span>

		            <div class="form-group row file">
			            <label for="name" class="col-form-label text-md-right file-label">{{ __('Profilový obrázok') }}</label>

			            <form method="POST" action="{{  url('image') }}" enctype="multipart/form-data">
			            <div class="col-md-6">
				            {{ csrf_field() }}
					            <input id="avatar" type="file" class="file-input form-control{{ $errors->has('avatar') ? ' is-invalid' : '' }}" name="avatar" value="{{ $userdata->avatar }}" required autofocus>
					            <input class="file-button" type="submit" value="Vložiť fotku" name="submit">

					            @if ($errors->has('avatar'))
						            <span class="invalid-feedback">
		                                        <strong>{{ $errors->first('avatar') }}</strong>
		                                    </span>
				            @endif
			            </div>
				        </form>
		            </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
