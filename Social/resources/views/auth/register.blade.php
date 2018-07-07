@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

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
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

	                    <!-- Pridane vlastne itemy-->

	                    <div class="form-group row">
		                    <label for="birth" class="col-md-4 col-form-label text-md-right">{{ __('Birth') }}</label>

		                    <div class="col-md-6">
			                    <input id="birth" type="date" class="form-control{{ $errors->has('birth') ? ' is-invalid' : '' }}" name="birth" value="{{ old('birth') }}" required autofocus>

			                    @if ($errors->has('birth'))
				                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('birth') }}</strong>
                                    </span>
			                    @endif
		                    </div>
	                    </div>

	                     <div class="form-group row {{ $errors->has('gender') ? ' has-error' : '' }}">
		                    <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>

		                    <div class="col-md-6">
			                    <select name="gender" class="col-md-4 form-control">
				                    <option value="male">Male</option>
				                    <option value="female">Female</option>
			                    </select>
			                    @if ($errors->has('gender'))
				                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
			                    @endif
		                    </div>
	                    </div>

	                    <div class="form-group row">
		                    <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

		                    <div class="col-md-6">
			                    <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}"      name="city" value="{{ old('city') }}" required autofocus>

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
			                    <input id="Country" type="text" class="form-control{{ $errors->has('Country') ? ' is-invalid' : '' }}"      name="country" value="{{ old('Country') }}" required autofocus>

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
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection