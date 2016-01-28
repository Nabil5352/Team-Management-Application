@extends('layouts.ProfileMasterPage')

@section('title')
	Welcome to TeamPrez
@stop

@section('content')
	<div id="welcomeVideo" class="ui video" data-source="youtube" data-id="i_mKY2CQ9Kk" data-image="{{asset('images/cover.jpg')}}"></div>
@stop

@section('under_divider')
	<div id="welcomebtn" class="ui right labeled black icon button">
		<i class="right arrow orange icon"></i>
		<a href="{{ URL::route('setprofile_step_1', $code) }}">Continue</a>
	</div>
@stop