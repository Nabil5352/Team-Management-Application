<!DOCTYPE HTML>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html>
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Confirm &#124; TeamPrez</title>
	<meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    {{ HTML::style('css/normalize.css') }}
    {{ HTML::style('css/main.css') }}
	{{ HTML::style('css/mysitestyle.css') }} 
	{{ HTML::style('css/semantic.css') }}
</head>
<body id="emailmessagebody">
	<!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->

<div id="wrapper" class="pusher">	
	<img id="confirmlogo" src="images/logo.png">

	<!-- message 2 confirm email start -->
	@if(Session::has('success'))
		<div id="warningmsg" class="ui negative message">
		  <div class="header">
		    <h3>Thank you for your registration.</h3>
		  </div>
		  	<p>We've sent you an email to confirm you. <b>Please check your email inbox.</b></p>
		  	<p id="redirecttxt">You will be redirected</p>
      		<p>If you are not automatically redirected. <a href="{{URL::route('home')}}">Click here</a></p>
		  <br>
		</div>
	@endif
	<!-- message 2 confirm email end -->


	{{-- <!-- After email confirmation start -->
	@if(Session::has('confirmedmail'))
	<div id="activemail" class="ui positive message">
	  <div class="header">
	    <h3>CONGRATULATIONS!!</h3>
	  </div>
	  <p>You are ready to setup your profile.</p>
	  <p id="activeredirecttxt">You will be redirected</p>
	  <p>If you are not automatically redirected. <a href="{{URL::to('welcome')}}">Click here</a></p>
	</div>
	@endif
	<!-- After email confirmation end --> --}}
</div><!-- end wrapper -->
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-2.1.1.min.js"><\/script>')</script>
	{{ HTML::script('js/vendor/jquery-2.1.1.min.js') }}
	{{ HTML::script('js/semantic.js') }}
	{{ HTML::script('js/plugins.js') }}
	{{ HTML::script('js/modal.js') }}
	{{ HTML::script('js/main.js') }}
	{{ HTML::script('js/angular.min.js') }}
    {{ HTML::script('js/angular-route.min.js') }}

    <script>
	    var timeout = 10; // in seconds

		var msgContainer = $('#warningmsg').find('#redirecttxt'),
		    msg = $('<span />').appendTo(msgContainer),
		    dots = $('<span />').appendTo(msgContainer); 

		var timeoutInterval = setInterval(function() {

		   timeout--;

		   msg.html(' in ' + timeout + ' seconds');

		   if (timeout == 0) {
		      clearInterval(timeoutInterval);
		      window.location.replace("{{URL::route('home')}}");
		   } 

		}, 1000);

		setInterval(function() {

		  if (dots.html().length == 3) {
		      dots.html('');
		  }

		  dots.html(function(i, oldHtml) { return oldHtml += '.' });
		}, 500);
    </script>
</body>
</html>