@extends('layouts.ProfileMasterPage')

@section('title')
	 Who's on your team?
@stop

@section('content')
	<div id="choicecontainer">
		<h2 id="leaderimg" class="ui header">
		  {{ HTML::image('images/avater.png', 'avater', array('class' => 'ui avatar image')) }}
		  <div class="content">
		    {{ $name }}
		    <div class="sub header">{{ $email }}</div>
		  </div>
		</h2>

	<?php
		$namemsg = "Enter Teammate Name";
		$emailmsg = "Enter Teammate Email";
	?>	

	{{-- Form start --}}
  	{{ Form::open(array('url' => 'submit_step_four')) }}
		<div id="memberform">
			<div id="topform">
				<h2 class="ui header">
				  {{ HTML::image('images/avater.png', 'avater', array('class' => 'ui avatar image')) }}
				  <div class="content">
				    <div class="ui fluid large input
					{{$errors->has('membername1')? 'popmailmsg':'popmsg'}}" data-content='
				  	@if($errors->has('membername1'))
						{{ $errors->first('membername1');}}
					@else
						{{$namemsg}}
					@endif
				  	' data-position="top left">
				  	{{-- Name Input --}}
					  <input name="membername1" placeholder="Teammate's Name" type="text">
					</div>
					<div id="mateemail" class="ui large fluid input
					{{$errors->has('email1')? 'popmailmsg':'popmsg'}}" data-content='
				  	@if($errors->has('email1'))
						{{ $errors->first('email1');}}
					@else
						{{$emailmsg}}
					@endif
				  	' data-position="top left">
				  	{{-- Email Input --}}
					  <input name="email1" placeholder="Teammate's Email" type="text">
					</div>
				  </div>
				</h2>

				<h2 id="secondElement" class="ui header">
				  {{ HTML::image('images/avater.png', 'avater', array('class' => 'ui avatar image')) }}
				  <div class="content">
				    <div class="ui large fluid input
				    {{$errors->has('membername2')? 'popmailmsg':'popmsg'}}" data-content='
				  	@if($errors->has('membername2'))
						{{ $errors->first('membername2');}}
					@else
						{{$namemsg}}
					@endif
				  	' data-position="top left">
				  	{{-- Name Input --}}
					  <input name="membername2" placeholder="Teammate's Name" type="text">
					</div>
					<div id="mateemail" class="ui large fluid input
					{{$errors->has('email2')? 'popmailmsg':'popmsg'}}" data-content='
				  	@if($errors->has('email2'))
						{{ $errors->first('email2');}}
					@else
						{{$emailmsg}}
					@endif
				  	' data-position="top left">
				  	{{-- Email Input --}}
					  <input name="email2" placeholder="Teammate's Email" type="text">
					</div>
				  </div>
				</h2>
			</div>

			<div id="downform">
				<h2 class="ui header">
				  {{ HTML::image('images/avater.png', 'avater', array('class' => 'ui avatar image')) }}
				  <div class="content">
				    <div class="ui fluid large input
				    {{$errors->has('membername3')? 'popmailmsg':'popmsg'}}" data-content='
				  	@if($errors->has('membername3'))
						{{ $errors->first('membername3');}}
					@else
						{{$namemsg}}
					@endif
				  	' data-position="top left">
				  	{{-- Name Input --}}
					  <input name="membername3" placeholder="Teammate's Name" type="text">
					</div>
					<div id="mateemail" class="ui large fluid input
					{{$errors->has('email3')? 'popmailmsg':'popmsg'}}" data-content='
				  	@if($errors->has('email3'))
						{{ $errors->first('email3');}}
					@else
						{{$emailmsg}}
					@endif
				  	' data-position="top left">
				  	{{-- Email Input --}}
					  <input name="email3" placeholder="Teammate's Email" type="text">
					</div>
				  </div>
				</h2>

				<h2 id="secondElement" class="ui header">
				  {{ HTML::image('images/avater.png', 'avater', array('class' => 'ui avatar image')) }}
				  <div class="content">
				    <div class="ui large fluid input
				    {{$errors->has('membername4')? 'popmailmsg':'popmsg'}}" data-content='
				  	@if($errors->has('membername4'))
						{{ $errors->first('membername4');}}
					@else
						{{$namemsg}}
					@endif
				  	' data-position="top left">
				  	{{-- Name Input --}}
					  <input name="membername4" placeholder="Teammate's Name" type="text">
					</div>
					<div id="mateemail" class="ui large fluid input
					{{$errors->has('email4')? 'popmailmsg':'popmsg'}}" data-content='
				  	@if($errors->has('email4'))
						{{ $errors->first('email4');}}
					@else
						{{$emailmsg}}
					@endif
				  	' data-position="top left">
				  	{{-- Email Input --}}
					  <input name="email4" placeholder="Teammate's Email" type="text">
					</div>
				  </div>
				</h2>
			</div>
		</div>
  	</div>
@stop

@section('under_divider')
	<div id="welcomestp" class="ui small steps">
	  <div class="step">
	  	<i class="checkmark box icon"></i>
	    <div class="content">
	      <div class="title">Step 1</div>
	    </div>
	  </div>
	  <div class="step">
	    <i class="checkmark box icon"></i>
	    <div class="content">
	      <div class="title">Step 2</div>
	    </div>
	  </div>
	  <div class="step">
	    <i class="checkmark box icon"></i>
	    <div class="content">
	      <div class="title">Step 3</div>
	    </div>
	  </div>
	  <div class="active step">
	    <i class="minus square outline icon"></i>
	    <div class="content">
	      <div class="title">Step 4</div>
	    </div>
	  </div>
	</div>

	{{-- passing code value using hidden input --}}
	<input name="code" type="hidden" value="{{$code}}">

	<div class="ui divider"></div>
	<input class="stepsubmitbtn" type="submit" value="Get Started">
	{{ Form::close() }}
	{{-- form end --}}	
@stop