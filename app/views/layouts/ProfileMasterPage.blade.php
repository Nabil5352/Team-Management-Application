<!DOCTYPE HTML>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" ng-app> <!--<![endif]-->
<html>
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Welcome &#124; TeamPrez</title>
	<meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    {{ HTML::style('css/normalize.css') }}
    {{ HTML::style('css/main.css') }}
	{{ HTML::style('css/mysitestyle.css') }} 
	{{ HTML::style('css/semantic.css') }}
</head>
<body id="welcomebody">
	<!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->

<div id="wrapper" class="pusher" >

	<div id="welcomesegment" class="ui piled segment">
		<div id="container">
		  	<h2 class="ui header">	  	
			  <div class="content">
			  	@yield('title')
			    <div class="sub header">TeamPrez will help to manage everything you need</div>
			  </div>
			</h2>

			<h2 class="ui horizontal divider">
			    <i class="pin icon"></i>
			</h2>

			@yield('content')

		  	<div class="ui divider"></div>

		  	@yield('under_divider')
		</div>
	</div>

</div><!-- end wrapper -->
	<script>window.jQuery || document.write('<script src="{{ asset('js/vendor/jquery-2.1.1.min.js') }}"><\/script>')</script>
	{{ HTML::script('js/vendor/jquery-2.1.1.min.js') }}
	{{ HTML::script('js/semantic.js') }}
	{{ HTML::script('js/plugins.js') }}
	{{ HTML::script('js/modal.js') }}
	{{ HTML::script('js/main.js') }}
	{{ HTML::script('js/angular.min.js') }}
    {{ HTML::script('js/angular-route.min.js') }}
</body>
</html>