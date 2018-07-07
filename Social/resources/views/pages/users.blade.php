@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">{{ __('Zoznam používateľov') }}</div>

					<div class="card-body">
						<div class="container">

							<table class="table table-striped table-bordered">
								<tr>

									<th><strong>Foto</strong></th>
									<th><strong>Meno používateľa</strong></th>
									<th><strong>Dátum registrácie</strong></th>
								</tr>

								@foreach($users as $user)
									<tr>
										<td><span class="avatar">
		                                <a href="{{ route('user.view',['name' => $user->name]) }}"><img
					                                class="profile-img"
					                                src="{{URL::asset('storage/app/public/avatars/'.$user->avatar)}}"
					                                alt="{{$user->name}}"></a>
	                                </span></td>

										<td><a class="text-dark"
										       href="{{ route('user.view',['name' => $user->name]) }}">{{ $user->name }}</a>
										</td>
										<td>{{ date('d.m.Y', strtotime($user->created_at)) }}</td>
									</tr>

								@endforeach
							</table>

							{{ $users->links()}}


							{{-- <table class="table table-striped table-bordered">
								 <tr>
									 @foreach(array_keys($payments[0]) as $column_name)
										 <th><strong>{{ $column_name }}</strong></th>
									 @endforeach
								 </tr>

								 @foreach($payments as $payment)
									 <tr>
										 @foreach($payment as $value)
											 <td>{{ $value }}</td>
										 @endforeach
									 </tr>
								 @endforeach
							 </table>--}}

						</div>

					</div>

				</div>
			</div>
		</div>
	</div>
	</div>
@endsection
