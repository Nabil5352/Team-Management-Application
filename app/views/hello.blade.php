<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>

</head>
<body>
	@if(Auth::check())
		{{'Confirmed'}}
	@elseif(!Auth::check())
		{{'Not confirmed'}}
	@endif

	@if(Session::get('flash_message'))
		<div class="flash">
			{{Session::get('flash_message')}}
		</div>
	@endif
</body>
</html>
