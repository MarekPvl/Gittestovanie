@extends('layouts.app')

@section('content')




	@guest

		{{--Prihlasovací formulár--}}

		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6">
					<div class="card">
						<div class="card-header">{{ __('Login') }}</div>

						<div class="card-body">
							<form method="POST" action="{{ route('login') }}">
								@csrf

								<div class="form-group row">
									<label for="email"
									       class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

									<div class="col-md-7">
										<input id="email" type="email"
										       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
										       name="email"
										       value="{{ old('email') }}" required autofocus>

										@if ($errors->has('email'))
											<span class="invalid-feedback">
		                                        <strong>{{ $errors->first('email') }}</strong>
		                                    </span>
										@endif
									</div>
								</div>

								<div class="form-group row">
									<label for="password"
									       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

									<div class="col-md-7">
										<input id="password" type="password"
										       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
										       name="password" required>

										@if ($errors->has('password'))
											<span class="invalid-feedback">
		                                        <strong>{{ $errors->first('password') }}</strong>
		                                    </span>
										@endif
									</div>
								</div>

								<div class="form-group row">
									<div class="col-md-6 offset-md-4">
										<div class="checkbox">
											<label>
												<input type="checkbox"
												       name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
											</label>
										</div>
									</div>
								</div>

								<div class="form-group row mb-0">
									<div class="col-md-8 offset-md-4">
										<button type="submit" class="btn btn-primary">
											{{ __('Login') }}
										</button>

										<a class="btn btn-link" href="{{ route('password.request') }}">
											{{ __('Forgot Your Password?') }}
										</a>

									</div>
								</div>
							</form>
						</div>
					</div>
				</div>

				{{--Registračný formulár--}}

				<div class="col-md-6">
					<div class="card">
						<div class="card-header">{{ __('Register') }}</div>

						<div class="card-body">
							<form method="POST" action="{{ route('register') }}">
								@csrf

								<div class="form-group row">
									<label for="name"
									       class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

									<div class="col-md-7">
										<input id="name" type="text"
										       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
										       name="name"
										       value="{{ old('name') }}" required autofocus>

										@if ($errors->has('name'))
											<span class="invalid-feedback">
		                                        <strong>{{ $errors->first('name') }}</strong>
		                                    </span>
										@endif
									</div>
								</div>

								<div class="form-group row">
									<label for="email"
									       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

									<div class="col-md-7">
										<input id="email" type="email"
										       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
										       name="email"
										       value="{{ old('email') }}" required>

										@if ($errors->has('email'))
											<span class="invalid-feedback">
		                                        <strong>{{ $errors->first('email') }}</strong>
		                                    </span>
										@endif
									</div>
								</div>

								<div class="form-group row">
									<label for="password"
									       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

									<div class="col-md-7">
										<input id="password" type="password"
										       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
										       name="password" required>

										@if ($errors->has('password'))
											<span class="invalid-feedback">
		                                        <strong>{{ $errors->first('password') }}</strong>
		                                    </span>
										@endif
									</div>
								</div>

								<div class="form-group row">
									<label for="password-confirm"
									       class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

									<div class="col-md-7">
										<input id="password-confirm" type="password" class="form-control"
										       name="password_confirmation" required>
									</div>
								</div>

								<!-- Pridane vlastne itemy-->

								<div class="form-group row">
									<label for="birth"
									       class="col-md-4 col-form-label text-md-right">{{ __('Birth') }}</label>

									<div class="col-md-7">
										<input id="birth" type="date"
										       class="form-control{{ $errors->has('birth') ? ' is-invalid' : '' }}"
										       name="birth"
										       value="{{ old('birth') }}" required autofocus>

										@if ($errors->has('birth'))
											<span class="invalid-feedback">
										<strong>{{ $errors->first('birth') }}</strong>
									</span>
										@endif
									</div>
								</div>

								<div class="form-group row {{ $errors->has('gender') ? ' has-error' : '' }}">
									<label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>

									<div class="col-md-8">
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
									<label for="city"
									       class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

									<div class="col-md-7">
										<input id="city" type="text"
										       class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}"
										       name="city"
										       value="{{ old('city') }}" required autofocus>

										@if ($errors->has('city'))
											<span class="invalid-feedback">
		                                        <strong>{{ $errors->first('city') }}</strong>
		                                    </span>
										@endif
									</div>
								</div>

								<div class="form-group row">
									<label for="country"
									       class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

									<div class="col-md-7">
										<input id="Country" type="text"
										       class="form-control{{ $errors->has('Country') ? ' is-invalid' : '' }}"
										       name="country" value="{{ old('Country') }}" required autofocus>

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

	@else
		<div class="container">
			<div class="row">
				<div class="col-md3 mt-4">
					<div class="float-left text-center ">
						<div>
						<span>
							<img class="rounded-circle image-user"
							     src="{{URL::asset('storage/avatars/'.Auth::user()->avatar)}}" alt="{{Auth::user()->name}}">
						</span>
						</div>
						<div>
							<h2 class=" header-width">{{Auth::user()->name}}</h2>
							<h3 class="font-weight-light">{{Auth::user()->gender}}</h3>
						</div>
					</div>
				</div>

				<div class="col-md-8 mt-4 ">
					<div class="float-right">
						<form class="margin-bottom" action="{{ url('newstatus') }}" method="POST">
							{{ csrf_field() }}
							<textarea
									class="form-control rounded-0 mb-3 {{ $errors->has('status') ? ' is-invalid' : '' }}"
									id="status" cols="60" rows="5" placeholder="Sem napíšte svoj status...(max 500 znakov)"
									name="status"
									maxlength="500"></textarea>

							@if ($errors->has('status'))
								<span class="invalid-feedback">
                                        <strong>{{ $errors->first('Country') }}</strong>
                                    </span>
							@endif

							<input type="submit" class="btn btn-primary float-right" name="submit" value="Pridať status"
							       required>
							{{--{{ __('Pridať status') }}--}}
							</input>
						</form>

						@if( $test->isEmpty() )

							<div class="alert alert-info margin-top">
								Používateľ <strong>{{Auth::user()->name}}</strong> nemá žiadne statusy :(.
							</div>

						@else
							{{--<script>--}}
								{{--function switch_div(show) {--}}
									{{--document.getElementById("show_"+show).style.display = "block";--}}
									{{--document.getElementById("show_"+((show==1)?2:1)).style.display = "none";--}}
								{{--}--}}
							{{--</script>--}}

							{{--<div class="show" onclick="switch_div(1);">--}}
								{{--1--}}
							{{--</div>--}}
							{{--<div class="show" onclick="switch_div(2);">--}}
								{{--2--}}
							{{--</div>--}}

							@foreach($statuses as $status)
							{{--<div class="content" id="show_2">--}}
							{{--<div class="content" id="show_1">--}}


								<div class="alert alert-info ">
									<div class="row">
								<span>
									<img class="img-circle status-img"
									     src="{{URL::asset('storage/app/public/avatars/'.$status->avatar)}}" alt="">
								</span>
										<div class="flexbox">
											<p class="name">{{$status->name}}</p>
											<p class="time">{{ date('H:i', strtotime($status->created_at)) }}</p>
										</div>
									</div>
									<div>
										<p class="status">{!! htmlspecialchars($status->status) !!} </p>
									</div>
								</div>
								{{--Likes on Statuses--}}
								<div class="row">
									<div class="like-button">
										{!! Form::open(['method' => 'POST', 'url' => 'like' ]) !!}
										<input name="statusid" type="hidden" value="{{$status->id}}">
										@if(count($status->like) > 0)
											<button class="like {{ (count($status->like()->where('user_id', '=', Auth::user()->id)->where('type', 'like')->get()))  ? 'like-users' : '' }}"
											        type="submit"><i class="fa fa-thumbs-up"></i>Páči sa mi to
												({{count($status->like)}})
											</button>
										@else
											<button class="like" type="submit">
												<i class="fa fa-thumbs-up"></i>Páči sa mi to
											</button>
										@endif
										{!! Form::close() !!}

									</div>

									<div class="dislike-button">
										{!! Form::open(['method' => 'POST', 'url' => 'dislike' ]) !!}
										<input name="statusid" type="hidden" value="{{$status->id}}">
										@if(count($status->dislike) > 0)
											<button class="like {{ (count($status->dislike()->where('user_id', '=', Auth::user()->id)->where('type', 'dislike')->get()))  ? 'like-users' : '' }}"
											        type="submit"><i class="fa fa-thumbs-down"></i>Nepáči sa mi to
												({{count($status->dislike)}})
											</button>
										@else
											<button class="like" type="submit">
												<i class="fa fa-thumbs-down"></i>Nepáči sa mi to
											</button>
										@endif
										{!! Form::close() !!}
									</div>
								</div>

								{{--Zobrazovanie komentarov--}}
								@foreach($comments as $comment)
									@if($status->id == $comment->status_id )
										<div class="row comment-conntent">
										<span class="comment-img">
												<img class="img-circle comment-img mb-2"
												     src="{{URL::asset('storage/app/public/avatars/'.$comment->avatar)}}" alt="">
											</span>

											<div class="comment-post">


												<p class="comment-box">

													<span class="user-name">{{$comment->name}}</span>
													<span class="comment-text">{{$comment->comment}}</span>
												</p>

											</div>

										</div>

										<div class="row">
											<div class="like-button-comment">
												{!! Form::open(['method' => 'POST', 'url' => 'like' ]) !!}
												<input name="commentid" type="hidden" value="{{$comment->id}}">
												@if(count($comment->commentlike) > 0)
													<button class="like-comment {{ (count($comment->commentlike()->where('user_id', '=', Auth::user()->id)->where                                                                                       ('type','like')->get()))  ? 'like-comment-users' : '' }}"
													        type="submit">
														<i class="fa fa-thumbs-up"></i>Páči sa mi to
														({{count($comment->commentlike)}})
													</button>
												@else
													<button class="like-comment" type="submit"><i
																class="fa fa-thumbs-up"></i>Páči sa mi to
													</button>
												@endif
												{!! Form::close() !!}
											</div>
											<div class="dislike-button-comment">
												{!! Form::open(['method' => 'POST', 'url' => 'dislike' ]) !!}
												<input name="commentid" type="hidden" value="{{$comment->id}}">
												@if(count($comment->commentdislike) > 0)
													<button class="like-comment {{ (count($comment->commentdislike()->where('user_id', '=', Auth::user()->id)->where                                                                                       ('type','dislike')->get()))  ? 'like-comment-users' : '' }}"
													        type="submit">
														<i class="fa fa-thumbs-down"></i>Nepáči sa mi to
														({{count($comment->commentdislike)}})
													</button>
												@else
													<button class="like-comment" type="submit"><i
																class="fa fa-thumbs-down"></i>Nepáči sa mi to

													</button>
												@endif
												{!! Form::close() !!}
											</div>
										</div>
									@endif

								@endforeach


								<div class="row comment">
									<div>
										<img class="img-circle status-img"
										     src="{{URL::asset('storage/app/public/avatars/'.Auth::user()->avatar)}}" alt="">
									</div>


									{{--Pridávanie komentárov--}}
									<div>
										<form action="{{ url('newcomment') }}" method="POST">
											{{ csrf_field() }}
											<input id="comment" type="text" class="form-control comment-input"
											       name="comment{{$status->id}}" placeholder="Napíšte komentár..."
											       autocomplete="off" data-single-click>
											<input name="statusid" type="hidden" value="{{$status->id}}">
											<input type="submit" style="visibility: hidden;"/>

										</form>
									</div>

								</div>
			{{--</div>--}}

			{{--</div>--}}
							@endforeach

							{{ $statuses->links()}}

						@endif
					</div>
				</div>
			</div>
		</div>
	@endguest



@endsection

