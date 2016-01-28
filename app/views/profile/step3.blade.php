@extends('layouts.ProfileMasterPage')

@section('title')
	 What's your team called?
@stop

@section('content')
	<div id="choicecontainer">
		<div class="ui circular image dimmmerimg">
		  <div class="ui dimmer">
		    <div class="content">
		      <div class="center">
		      	Fullname
		      </div>
		    </div>
		  </div>
		  {{ HTML::image('images/avater.png', 'cover', array('class' => 'ui middle aligned tiny image' )) }}
		</div>

	<?php
	$primarymsg = "Enter a team name";
	?>	

	{{-- Form start --}}
	{{ Form::open(array('url' => 'submit_step_three')) }}
		<div id="teamname">
			<div class="ui big icon input {{$errors->has('teamname')? 'popmailmsg':'popmsg'}}" data-content='
			  	@if($errors->has('teamname'))
					{{ $errors->first('teamname');}}
				@else
					{{$primarymsg}}
				@endif
			  	' data-position="top left">
			  <input name="teamname" {{(Input::old('teamname')) ? ' value="'.e(Input::old('teamname')).'" ' : "placeholder='Your team name'"}} type="text">
			  <i class="users icon"></i>
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
	  <div class="active step">
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
	{{ Form::close() }}
	{{-- form end --}}
@stop