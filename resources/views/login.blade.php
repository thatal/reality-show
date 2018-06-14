<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Login - {{config('app.name')}}</title>	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('css/bootstrap-responsive.min.css')}}" rel="stylesheet" type="text/css" /><link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    
<link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('css/pages/signin.css')}}" rel="stylesheet" type="text/css"></head><body>
	
	<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<a class="brand" href="index.html">
				{{config('app.name')}}				
			</a>		
			
			<div class="nav-collapse">
				<ul class="nav pull-right">
					
					{{-- <li class="">						
						<a href="signup.html" class="">
							Don't have an account?
						</a>
						
					</li> --}}
					
					<li class="">						
						<a href="{{route('app.index')}}" class="">
							<i class="icon-chevron-left"></i>
							Back to Homepage
						</a>
						
					</li>
				</ul>
				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar --><div class="account-container">
	
	<div class="content clearfix">
		
		<form action="#" method="post">
		
			<h1>Admin Login</h1>
			@if (\Session::has('alert_message'))
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>Error!</strong> {!!\Session::get('alert_message')!!}
				</div>
			@endif
			{!!Form::open(['url' => route('admin.login.post')])!!}
				<div class="login-fields">
					
					<p>Please provide your details</p>
					
					<div class="field">
						<label for="username">Username</label>
						<input type="text" id="username" name="username" value="{{old('username')}}" placeholder="Username" class="login username-field" required />
						@if ($errors->has('username'))
							<span class="help-block">
								<strong>{{ $errors->first('username') }}</strong>
							</span>
						@endif
					</div> <!-- /field -->
					
					<div class="field">
						<label for="password">Password:</label>
						<input type="password" id="password" name="password" value="" placeholder="Password" class="login password-field" required/>
						@if ($errors->has('password'))
							<span class="help-block">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
						@endif
					</div> <!-- /password -->
					
				</div> <!-- /login-fields -->
				
				<div class="login-actions">
					
					<span class="login-checkbox">
						<input id="Field" name="remember" type="checkbox" class="field login-checkbox" value="1" tabindex="4" />
						<label class="choice" for="Field">Keep me signed in</label>
					</span>
										
					<button class="button btn btn-success btn-large">Sign In</button>
					
				</div> <!-- .actions -->
				{{Form::close()}}
			
			
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->{{-- <div class="login-extra">
	<a href="#">Reset Password</a>
</div> <!-- /login-extra --> --}}
<script src="{{asset('js/jquery-1.7.2.min.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script><script src="{{asset('js/signin.js')}}"></script></body></html>
