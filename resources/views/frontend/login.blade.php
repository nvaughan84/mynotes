@extends('frontend/layout')
@section('main_content')


	<div class="row">
		
			<div class="login__box panel columns medium-8 medium-offset-2 small-12">
								
					<div class="column medium-6">						
						<p>
							Login or sign up using your preferred method
						</p>
						<div class="column medium-12">
							<a class="login__button login__button--facebook" href="/fb-login">Facebook</a>
						</div>
						<div class="column medium-12">
							<a class="login__button login__button--google" href="/google-login">Google</a>
						</div>

						<div class="columns medium-12">
							<a class="" href="">Sign up using your email</a>
						</div>
					
					</div>




					

					<div class="column medium-6">

						@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
	
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						
							<div class="column medium-12">
								<h3>Login</h3>
								<input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="email">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Remember Me
									</label>
								</div>
							</div>				

						
							<div class="column medium-12">
								<input type="password" class="form-control" name="password" placeholder="password">
								<a class="btn btn-link right " href="{{ url('/password/email') }}">Forgot Your Password?</a>	
							</div>	

							<div class="column medium-12">
								<button type="submit" class="btn btn-primary right">Login</button>
														
							</div>							
					</form>

				</div>
			</div>
		
	</div>


@endsection