@extends('layouts.ProfileMasterPage')

@section('title')
	How should we set up your team?
@stop

@section('content')
	<div id="choicecontainer">
		<div id="SignUpTopText">
			<h2>You're the first person to set up a TeamPrez account with this email</h2>
			<h3>Does your company own "YOURemail.COM"?</h3>

		</div>

		<div id="choicemenu">
			<div id="leftChoice">
			  <div class="image">
			    {{ HTML::image('images/singleUser.png', 'singleaccountpic', array('class' => 'ui middle aligned small image')) }}
			  </div>
			  <br>
				{{ Form::open(array('url' => 'submit_step_two')) }}
				<input name="code" type="hidden" value="{{$code}}">
				{{ Form::token() }}

				<input type="submit" id="step2submitbtn1" name="personal" value="No, Personal Email"></input>

				{{ Form::close() }}
			</div>

			<div id="rightChoice">
			  <div class="image">
			    {{ HTML::image('images/CorporateUser.png', 'corporateaccountpic', array('class' => 'ui middle aligned small image')) }}
			  </div>
			  <br>
				{{ Form::open(array('url' => 'submit_step_two')) }}
				<input name="code" type="hidden" value="{{$code}}">
				{{ Form::token() }}

				<input type="submit" id="step2submitbtn2" name="corporate" value="Yes, Corporate Email"></input>

				{{ Form::close() }}
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
	  <div class="active step">
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

	<div class="ui divider"></div>

@stop