<?php

$password = '12345678';
$passworsd_hashed = Hash::make($password);
echo $passworsd_hashed;

?>
<html ng-app>
<head>
	<title>Test Page</title>
	{{ HTML::style('css/normalize.css') }}
    {{ HTML::style('css/main.css') }}
    {{ HTML::style('css/mysitestyle.css') }} 
    {{ HTML::style('css/semantic.css') }}
    {{ HTML::style('css/jquery-ui.min.css') }}
</head>
<body ng-controller="sendMessageController">
<h1>Testing Area</h1>
<div>
	<p>--------------- Start ---------------<br> </p>
	<p>
	</p>

	<p><br>--------------- End ---------------</p>
</div>

	<script type="text/javascript" src="js/vendor/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/semantic.js"></script>
	<script type="text/javascript" src="js/plugins.js"></script>
	<script type="text/javascript" src="js/modal.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>

	{{-- angular js files --}}
</body>
</html>