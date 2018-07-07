@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">{{ __('Žiadosti o priateľstvo') }}</div>

					<div class="card-body">
						<div class="container">

							<table class="table table-striped table-bordered">
								<tr>

									<th><strong>Foto</strong></th>
									<th><strong>Meno používateľa</strong></th>
									<th><strong>Dátum odoslania</strong></th>
									<th><strong>Prijať/Odmietnuť</strong></th>

								</tr>

								@foreach($Friendsrequests  as $Friendsrequest )
									<tr>
										<td><span class="avatar">
		                                <a href="{{ route('user.view',['name' => $Friendsrequest->requestername]) }}"><img
					                                class="profile-img"
					                                src="{{URL::asset('storage/app/public/avatars/'.$Friendsrequest->requesteravatar)}}"
					                                alt="{{$Friendsrequest->requestername}}"></a>
	                                </span></td>

										<td><a class="text-dark"
										       href="{{ route('user.view',['name' => $Friendsrequest->requestername]) }}">{{ $Friendsrequest->requestername }}</a>
										</td>
										<td>{{ date('d.m.Y', strtotime($Friendsrequest->created_at)) }}</td>

											<td class="row friends-button ">
												{!! Form::open(['method' => 'POST', 'url' => 'Acceptfriend' ]) !!}
												<input name="userid" type="hidden" value="{{$Friendsrequest->id}}">
												<button type="submit" class="btn btn-success btn-sm">Prijať</button>
												{!! Form::close() !!}
												&nbsp
												{!! Form::open(['method' => 'POST', 'url' => 'Rejectfriend' ]) !!}
												<input name="userid" type="hidden" value="{{$Friendsrequest->id}}">
												<button type="submit" class="btn btn-danger btn-sm">Zamietnuť</button>
												{!! Form::close() !!}

											</td>
										</div>
									</tr>

								@endforeach
							</table>

							{{ $Friendsrequests->links()}}

						</div>

					</div>

				</div>
			</div>
		</div>
	</div>
	</div>
@endsection
