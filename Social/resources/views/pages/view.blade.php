@extends('layouts.app')



@section('content')
	@if(Auth::check() and $user['id'] === Auth::user()->id )
	<div class="container">
		<div class="row">
			<div class="col-md3 mt-4">
				<div class="float-left text-center ">
					<div>
						<span>
							<img class="rounded-circle image-user" src="{{URL::asset('storage/app/public/avatars/'.$user->avatar)}}" alt="{{$user->name}}" >
						</span>
					</div>
					<div>
						<h2 class=" header-width">{{$user->name}}</h2>
						<h3 class="font-weight-light">{{$user->gender}}</h3>
					</div>
				</div>
			</div>

			<div class="col-md-8 mt-4 ">
				<div class="float-right">
					<form class="margin-bottom" action="{{ url('newstatus') }}" method="POST">
						{{ csrf_field() }}
						<textarea class="form-control rounded-0 mb-3 {{ $errors->has('status') ? ' is-invalid' : '' }}" id="status" cols="60" rows="5" placeholder="Sem napíšte svoj status...(max 500 znakov)" name="status" maxlength="500"></textarea>

						@if ($errors->has('status'))
							<span class="invalid-feedback">
                                        <strong>{{ $errors->first('Country') }}</strong>
                                    </span>
						@endif

						<input type="submit" class="btn btn-primary float-right" name="submit" value="Pridať status" required>
						{{--{{ __('Pridať status') }}--}}
						</input>
					</form>

					@if( $statuses->isEmpty() )

						<div class="alert alert-info margin-top">
							Používateľ <strong>{{$user->name}}</strong> nemá žiadne statusy :(.
						</div>

					@else
						{{--}}@foreach($statuses as $status)
							<div class="alert alert-info ">
								<div class="row">
								<span>
									<img class="img-circle status-img" src="{{asset('storage/avatars/'.$status->avatar)}}" alt="">
								</span>
									<div class="flexbox">
										<p class="name">{{$status->name}}</p>
										<p class="time">{{ date('H:i', strtotime($status->created_at)) }}</p>
									</div>
								</div>
								<div>
									<p class="status">{{$status->status}}</p>
								</div>
							</div>

						@endforeach

{{ $statuses->links()}}--}}
						@foreach($statuses as $status)
							<div class="alert alert-info ">
								<div class="row">
								<span>
									<img class="img-circle status-img" src="{{URL::asset('storage/app/public/avatars/'.$status->avatar)}}" alt="">
								</span>
									<div class="flexbox">
										<p class="name">{{$status->name}}</p>
										<p class="time">{{ date('H:i', strtotime($status->created_at)) }}</p>
									</div>
								</div>
								<div>
									<p class="status">{{$status->status}}</p>
								</div>
							</div>
							{{--Likes on Statuses--}}
								<div class="row">
									<div class="like-button">
										{!! Form::open(['method' => 'POST', 'url' => 'like' ]) !!}
										<input name="statusid" type="hidden" value="{{$status->id}}">
										@if(count($status->like) > 0)
											<button class="like {{ (count($status->like()->where('user_id', '=', Auth::user()->id)->where('type', 'like')->get()))  ? 'like-users' : '' }}"
											        type="submit"><i class="fa fa-thumbs-down"></i>Páči sa mi to
												({{count($status->like)}})
											</button>
										@else
											<button class="like" type="submit">
												<i class="fa fa-thumbs-down"></i>Páči sa mi to
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
								@if($status->id == $comment->statusid )
									<div class="row comment-conntent">
										<span class="comment-img">
												<img class="img-circle comment-img mb-2" src="{{URL::asset('storage/app/public/avatars/'.$comment->avatar)}}" alt="">
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
													<i class="fa fa-thumbs-up"></i>Nepáči sa mi to
													({{count($comment->commentdislike)}})
												</button>
											@else
												<button class="like-comment" type="submit"><i
															class="fa fa-thumbs-up"></i>Nepáči sa mi to

												</button>
											@endif
											{!! Form::close() !!}
										</div>
									</div>
								@endif
							@endforeach


							<div class="row comment">
								<div>
									<img class="img-circle status-img" src="{{URL::asset('storage/app/public/avatars/'.Auth::user()->avatar)}}" alt="">
								</div>



								{{--Pridávanie komentárov--}}
								<div>
									<form action="{{ url('newcomment') }}" method="POST">
										{{ csrf_field() }}
										<input id="comment" type="text" class="form-control comment-input" name="comment{{$status->id}}" placeholder="Napíšte komentár..." autocomplete="off" data-single-click>
										<input name="statusid" type="hidden" value="{{$status->id}}">
										<input type="submit" style="visibility: hidden;" />
									</form>
								</div>

							</div>


						@endforeach

						{{ $statuses->links()}}

					@endif

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
							<img class="rounded-circle image-user" src="{{URL::asset('storage/app/public/avatars/'.$user->avatar)}}" alt="{{$user->name}}" >
						</span>
						</div>
						<div>
							<h2 class=" header-width">{{$user->name}}</h2>
							<h3 class="font-weight-light">{{$user->gender}}</h3>
							@guest

							@else
								@if( count($existsfriendsa) > '0' or count($existsfriendsb) > '0' )
									{!! Form::open(['method' => 'POST', 'url' => 'Deletefriend' ]) !!}
									<input name="userid" type="hidden" value="{{$user->id}}">
										<button class="add-friend" type="submit">
											<i class="fa fa-ban"></i>
											Odstrániť priateľa
										</button>
									{!! Form::close() !!}
								@elseif( count($existsfriendsrequesta) > '0' or count($existsfriendsrequestb) > '0'  )
									{!! Form::open(['method' => 'POST', 'url' => 'Deleterequest' ]) !!}
									<input name="userid" type="hidden" value="{{$user->id}}">
										<button class="add-friend" type="submit">
											<i class="fa fa-ban"></i>
											Zrušiť žiadosť o priateľstvo
										</button>
									{!! Form::close() !!}
								@else
									{!! Form::open(['method' => 'POST', 'url' => 'Addfriend' ]) !!}
									<input name="userid" type="hidden" value="{{$user->id}}">
										<button class="add-friend" type="submit">
											<i class="fa fa-user-plus"></i>
											Pridať priateľa
										</button>
									{!! Form::close() !!}
								@endif
							@endguest
						</div>
					</div>
				</div>

				<div class="col-md-8 mt-4 ">
					<div class="float-right">

						@if( $statuses->isEmpty() )

							<div class="alert alert-info margin-top">
								Používateľ <strong>{{$user->name}}</strong> nemá žiadne statusy :(.
							</div>

						@else
							@guest
								@foreach($statuses as $status)
									<div class="alert alert-info ">
										<div class="row">
									<span>
										<img class="img-circle status-img" src="{{URL::asset('storage/app/public/avatars/'.$status->avatar)}}" alt="">
									</span>
											<div class="flexbox">
												<p class="name">{{$status->name}}</p>
												<p class="time">{{ date('H:i', strtotime($status->created_at)) }}</p>
											</div>
										</div>
										<div>
											<p class="status">{{$status->status}}</p>
										</div>
									</div>

								@endforeach

								{{ $statuses->links()}}

							@else

								@foreach($statuses as $status)
									<div class="alert alert-info ">
											<div class="row">
								<span>
									<img class="img-circle status-img" src="{{URL::asset('storage/app/public/avatars/'.$status->avatar)}}" alt="">
								</span>
												<div class="flexbox">
													<p class="name">{{$status->name}}</p>
													<p class="time">{{ date('H:i', strtotime($status->created_at)) }}</p>
												</div>
											</div>
											<div>
												<p class="status">{{$status->status}}</p>
											</div>
										</div>

										{{--Likes on statuses--}}

									<div class="row">
										<div class="like-button">
											{!! Form::open(['method' => 'POST', 'url' => 'like' ]) !!}
											<input name="statusid" type="hidden" value="{{$status->id}}">
											@if(count($status->like) > 0)
												<button class="like {{ (count($status->like()->where('user_id', '=', Auth::user()->id)->where('type', 'like')->get()))  ? 'like-users' : '' }}"
												        type="submit"><i class="fa fa-thumbs-down"></i>Páči sa mi to
													({{count($status->like)}})
												</button>
											@else
												<button class="like" type="submit">
													<i class="fa fa-thumbs-down"></i>Páči sa mi to
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
												<img class="img-circle comment-img mb-2" src="{{URL::asset('storage/app/public/avatars/'.$comment->avatar)}}" alt="">
											</span>

												<div class="comment-post">


													<p class="comment-box">

														<span class="user-name">{{$comment->name}}</span>
														<span class="comment-text">{{$comment->comment}}</span>
													</p>

												</div>

											</div>

										{{--Likes on comments--}}

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
															<i class="fa fa-thumbs-up"></i>Nepáči sa mi to
															({{count($comment->commentdislike)}})
														</button>
													@else
														<button class="like-comment" type="submit"><i
																	class="fa fa-thumbs-up"></i>Nepáči sa mi to

														</button>
													@endif
													{!! Form::close() !!}
												</div>
											</div>
										@endif
									@endforeach


									<div class="row comment">
										<div>
											<img class="img-circle status-img" src="{{URL::asset('storage/app/public/avatars/'.Auth::user()->avatar)}}" alt="">
										</div>



{{--Pridávanie komentárov--}}
										<div>
											<form action="{{ url('newcomment') }}" method="POST">
												{{ csrf_field() }}
												<input id="comment" type="text" class="form-control comment-input" name="comment{{$status->id}}" placeholder="Napíšte komentár..." autocomplete="off" data-single-click>
												<input name="statusid" type="hidden" value="{{$status->id}}">
												<input type="submit" style="visibility: hidden;" />
											</form>
										</div>

									</div>


								@endforeach

								{{ $statuses->links()}}
							@endguest
						@endif

					</div>

				</div>
			</div>
		</div>
	@endif

@endsection