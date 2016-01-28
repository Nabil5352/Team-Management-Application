<!DOCTYPE HTML>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" ng-app> <!--<![endif]-->
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Home &#124; TeamPrez</title>
	<meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    {{ HTML::style('css/normalize.css') }}
    {{ HTML::style('css/main.css') }}
	{{ HTML::style('css/mysitestyle.css') }} 
	{{ HTML::style('css/semantic.css') }}
	{{ HTML::script('js/vendor/modernizr-2.6.2.min.js') }}
</head>
<body>
	<!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->
	<!-- login modal -->
	<div id="wrapper">
		<div id="login" class="ui modal">
				<i class="icon close"></i>
				<div class="header">
					<h2 class="ui header">
						<i class="icon sign in "></i>
						Log In
					</h2>
				</div>

			<div class="content">
			{{-- Form start --}}
  			{{Form::open(array('route' => 'sessions.store'))}}
				<div class="ui form">
				  <h4 class="ui dividing header">Enter Your Username and Password</h4>
				  <div class="fields">
				    <div id="usernamefield" class="required field">
				      {{Form::label('email', 'Email:')}}
				      <div class="ui icon input">
				        <input id="email" name="email" placeholder="Email" type="email">
				        <i class="mail icon"></i>
				      </div>
				    </div>
				    <div id="passwordfield" class="required field">
				      {{Form::label('password', 'Password:')}}
				      <div class="ui icon input">
				        {{Form::password('password', array('placeholder'=>'Password'))}}
				        <i class="lock icon"></i>
				      </div>
				    </div>
				  </div>
				</div>

				<div class="actions">
					<div class="ui buttons">
					  <input class="ui button labeled icon positive" type="submit" value="Sign In" />
					  <div class="or"></div>
					  <input class="ui right labeled icon button negative" type="submit" value="Cancel" />
					</div>
				</div>
				{{-- <input class="stepsubmitbtn" type="submit" value="Continue"> --}}
				
			{{Form::close()}}
			{{-- form end --}}

			</div>
		</div>
		<!-- end of login modal -->

		<!-- top menu -->
		<div id="topmenu" class="ui menu stackable">
		 	<a href="{{URL::route('home')}}" class="ui small image item">
				<img id="logo" src="images/logo.png">
			</a>

			<a href="{{URL::route('home')}}" class="item">
				<i class="pointing right icon"></i> Get Started
			</a>

			<a href="{{URL::route('home')}}" class="item">
				<i class="file text icon"></i> Documentation
			</a>

			<a href="{{URL::route('home')}}" class="item">
				<i class="plane icon"></i> Take a Tour
			</a>
			
		  	<div id="loginbutton" class="ui basic inverted button">
			  	@if(Auth::check())
			  		<i class="icon sign out"></i>
			  		Log Out
			  	@else 
			  		<i class="icon sign in"></i>
			  		Log In
			  	@endif
			</div>
		</div>

		<!-- end of top menu -->
<?php
$gmailvaluefail = "class='ui left icon fluid input popmailmsg' data-content='Input a valid gmail address'";
$gmailvalue = "class='ui left icon fluid input popmsg' data-content='Sign up using gmail' data-variation='inverted'";

$othervaluefail = "class='ui left icon fluid input popmailmsg' data-content='Input a valid email address'";
$othervalue = "class='ui left icon fluid input popmsg' data-content='Sign up using any email' data-variation='inverted'";
?>
		<div class="pusher" >
			<div id="header">
				<div id="mainHead">
					<h2 class="ui icon header">
					  <i id="HeadLogo" class="users icon orange circular"></i>
					  <div class="content">
					  	TeamPrez
					    <div class="sub header">Management tool for Smart Project Managers</div>
					  </div>

					  
					</h2>

					<!-- sign up -->
					<div id="signUp">				
						{{Form::open(array('route' => 'sign-up-user'))}}
							<div id="insideSignup" class="ui center aligned segment">
								<div  
								@if(Session::has('fail'))
								     {{$gmailvaluefail}}
								@else
									{{$gmailvalue}}
								@endif
								data-position="top left">
								  <i id="gmailmailicon" class="google red icon"></i>
								  <input name="gmailmail" id="gmailmail" placeholder="Sign up using Gmail" type="email">
								</div>

								<div id="signdivider" class="ui horizontal divider">
								    Or
								</div>

								<div id="otherEmail" 
								@if(Session::has('fail'))
								     {{$othervaluefail}}
								@else
									{{$othervalue}}
								@endif
								data-position="top left">
									<input name="nongmailmail" id="nongmailmail" placeholder="name@example.com" type="email">
								</div>

								{{-- <div class="ui button right labeled basic small icon">
									<i class="right arrow icon"></i>
									Get Started						
								</div> --}}
								<input id="signupbtn" type="submit" value="Get Started">
							</div>	
						{{Form::close()}}	
					</div>
					<!-- end of sign up -->

					<!-- social media icons -->
					<div id="socialbars">
						<div class="ui circular facebook icon button">
						  <i class="facebook icon"></i>
						</div>
						<div class="ui circular twitter icon button">
						  <i class="twitter icon"></i>
						</div>
						<div class="ui circular linkedin icon button">
						  <i class="linkedin icon"></i>
						</div>
						<div class="ui circular google plus icon button">
						  <i class="google plus icon"></i>
						</div>
					</div>
					<!-- end of social media icons -->

					<div id="footerlinks" class="ui horizontal bulleted link list">
						<a class="item" href="{{URL::route('home')}}">
							Terms and Conditions
						</a>
						<a class="item" href="{{URL::route('home')}}">
						    Privacy Policy
						</a>
						<a class="item" href="{{URL::route('home')}}">
						    Contact Us
						</a>
						<div class="item">
						   &#169; TeamPrez {{ date("Y") }}
						</div>
					</div>
				</div>

				<img id="mainImage" src="images/cover.jpg" alt="Header Image"/>
			</div>
			
		</div>
	</div><!-- end wrapper -->
	<script>window.jQuery || document.write('<script src="{{ asset('js/vendor/jquery-2.1.1.min.js') }}"><\/script>')</script>
	{{ HTML::script('js/vendor/jquery-2.1.1.min.js') }}
	{{ HTML::script('js/semantic.js') }}
	{{ HTML::script('js/main.js') }}
	{{ HTML::script('js/modal.js') }}
	{{ HTML::script('js/plugins.js') }}
	{{ HTML::script('js/angular.min.js') }}
    {{ HTML::script('js/angular-route.min.js') }}
</body>
</html>