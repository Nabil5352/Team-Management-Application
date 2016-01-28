@extends('layouts.ProfileMasterPage')

@section('title')
	Who are you?
@stop

@section('content')
	<div>
	{{ HTML::image('images/cover.jpg', 'cover', array( 'id' => 'welImg', 'class' => 'ui middle aligned small rounded image' )) }}
	</div>

	<?php
		$fullnamepopmsg = "Enter Your Full Name";
		$passwordpopmsg = "Enter Your Password";
		$password_confirmpopmsg = "Re-Enter your password";
	?>	

	{{-- Form start --}}
  	{{Form::open(array('route' => 'submit_step_one'))}}	
		<div id="welcomUserForm">
			  	<div class="ui corner labeled fluid input
			  	{{$errors->has('fullname')? 'popmailmsg':'popmsg'}}" data-content='
			  	@if($errors->has('fullname'))
					{{ $errors->first('fullname');}}
				@else
					{{$fullnamepopmsg}}
				@endif
			  	' data-position="top left">
			  		{{-- Name Input --}}
				  <input name="fullname" {{(Input::old('fullname')) ? ' value="'.e(Input::old('fullname')).'" ' : "placeholder='Full name'"}} type="text">
				  <div class="ui corner label">
				    <i class="asterisk icon"></i>
				  </div>
				</div>
				<br>
				<div class="ui corner labeled fluid input
			  	{{$errors->has('password')? 'popmailmsg':'popmsg'}}" data-content='
			  	@if($errors->has('password'))
					{{ $errors->first('password');}}
				@else
					{{$passwordpopmsg}}
				@endif
			  	' data-position="top left">
					{{-- Password input --}}
				  <input name="password" placeholder="Password" type="password">
				  <div class="ui corner label">
				    <i class="asterisk icon"></i>
				  </div>
				</div>
				<br>
				<div class="ui corner labeled fluid input
			  	{{$errors->has('confirm_password')? 'popmailmsg':'popmsg'}}" data-content='
			  	@if($errors->has('confirm_password'))
					{{ $errors->first('confirm_password');}}
				@else
					{{$password_confirmpopmsg}}
				@endif
			  	' data-position="top left">
					{{-- Confirm Password --}}
				  <input name="confirm_password" placeholder="Confirm Password" type="password">
				  <div class="ui corner label">
				    <i class="asterisk icon"></i>
				  </div>
				</div>				
	  	</div>
@stop

@section('under_divider')
		<div id="welcomestp" class="ui small steps">
		  <div class="active step">
		    <i class="minus square outline icon"></i>
		    <div class="content">
		      <div class="title">Step 1</div>
		    </div>
		  </div>
		  <div class=" step">
		    <i class="minus square outline icon"></i>
		    <div class="content">
		      <div class="title">Step 2</div>
		    </div>
		  </div>
		  <div class="step">
		    <i class="minus square outline icon"></i>
		    <div class="content">
		      <div class="title">Step 3</div>
		    </div>
		  </div>
		  <div class="step">
		    <i class="minus square outline icon"></i>
		    <div class="content">
		      <div class="title">Step 4</div>
		    </div>
		  </div>
		</div>

		{{-- passing code value using hidden input --}}
		<input name="code" type="hidden" value="{{$code}}">

		<div class="ui divider"></div>
		<input class="stepsubmitbtn" type="submit" value="Continue">
		
	{{Form::close()}}
	{{-- form end --}}
@stop