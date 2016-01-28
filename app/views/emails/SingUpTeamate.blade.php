<html> <head>
	<title></title>
</head>
<body>
	<h1>Hello <b> {{$name}}, </b></h1>
	<br>
	You are invited to join in a <b>TeamPrez</b> team. If you agree please click the button below to activate your account. <br/><br/><br/>
	<b>Your password:&nbsp;&nbsp;</b>{{$password}} <br><br/><br/>
	<i>**You can change your password from TeamPrez settings menu**</i> <br><br>
	Thank you for using our service.
	<br><br>
	
	<button><a href="{{ $link }}">JOIN</a></button>

	<br><br><br>	
	With regards -<br>
	TeamPrez support team
</body>
</html>