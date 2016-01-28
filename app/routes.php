<?php

Route::get('/', array(
	'before' => 'checkAuth',
	'as' => 'home',
	'uses' => 'HomeController@showWelcome'
));

Route::post('create', array(
	'before' => 'csrf',
	'as' => 'sign-up-user',
	'uses' => 'HomeController@createUser'
));

// show confirm message after sign up
Route::get('confirm', array(
	'as' => 'confirm_sign_up_msg',
	'uses' => 'HomeController@showSignUpConfirmMessage'
));

// confirm user
Route::get('confirm/{code}', array(
	'as' => 'confirm_user_sign_up',
	'uses' => 'HomeController@confirmUser'
));

// welcome user
	Route::get('welcome/{code}', array(
	'as' => 'welcome',
	'uses' => 'HomeController@welcomeUser'
));
// step1 view
Route::get('step1/{code}', array(
	'as' => 'setprofile_step_1',
	'uses' => 'HomeController@setprofile_step1'
));
// step1 submit
Route::post('submit_step_one', array(
	'before' => 'csrf',
	'as' => 'submit_step_one',
	'uses' => 'HomeController@postStepOne' 
));	
// step2 view
Route::get('step2/{code}', array(
	'as' => 'setprofile_step2',
	'uses' => 'HomeController@setprofile_step2'
));
// step2 submit
Route::post('submit_step_two', array(
	'before' => 'csrf',
	'as' => 'submit_step_two',
	'uses' => 'HomeController@postStepTwo' 
));

// step3 view
Route::get('step3/{code}', array(
	'as' => 'setprofile_step3',
	'uses' => 'HomeController@setprofile_step3'
));
// step3 submit
Route::post('submit_step_three', array(
	'before' => 'csrf',
	'as' => 'submit_step_three',
	'uses' => 'HomeController@postStepThree' 
));

// step4 view
Route::get('step4/{code}', array(
	'as' => 'setprofile_step4',
	'uses' => 'HomeController@setprofile_step4'
));
//step4 submit
Route::post('submit_step_four', array(
	'before' => 'csrf',
	'as' => 'submit_step_four',
	'uses' => 'HomeController@postStepFour' 
));

Route::post('editmember', array(
	'before' => 'csrf',
	'as' => 'editmember',
	'uses' => 'HomeController@editMember' 
));

// show confirm message after sending invitation to teammate
Route::get('confirm-teammate', array(
	'as' => 'confirm-teammate-sign-up-msg',
	'uses' => 'HomeController@showTeammateSignUpConfirmMessage'
));

// confirm teammate
Route::get('confirm-teammate/{code}', array(
	'as' => 'confirm-teammate-sign-up',
	'uses' => 'HomeController@confirmTeammate'
));

// login OR logout
// Route::get('login', 'SessionsController@create');
Route::get('logout', array(
	'as' => 'logout',
	'uses' => 'SessionsController@destroy'
));

Route::resource('sessions', 'SessionsController', ['only' => ['index', 'create', 'store']]);

// dashboard
Route::get('dashboard/{userToken}', array(
	'before' => 'auth',
	'as' => 'dashboard',
	'uses' => 'HomeController@dashboard'
));

// send messge
Route::post('send_message', array(
	'before' => 'csrf',
	'as' => 'send_message',
	'uses' => 'HomeController@sendMessage' 
));

// Route::get('memberforinbox', function(){
// 	return User::where('id', '!=', Auth::id())->get();
// });

// Route::get('test/{id}', array(
// 	'as' => 'test',
// 	'uses' => 'FunctionController@testindex'
// ));

Route::get('test/', function(){
	return View::make('test');
});

Route::get('deletetask/{task_id}', 'TaskController@delete_subtask');

Route::post('addnewmember', array(
	'as' => 'addnewmember',
	'uses' => 'HomeController@addMember'
));

Route::post('upload', array(
	'before' => 'csrf',
	'as' => 'upload-file',
	'uses' => 'HomeController@fileUpload'
));

Route::post('create_milestone', array(
	'before' => 'csrf',
	'as' => 'create_milestone',
	'uses' => 'HomeController@createMilestone'
));

Route::get('projects/{team_id}', ['as' => 'projects.index', 'uses' => 'ProjectController@index']);

Route::resource('projects', 'ProjectController', ['except' => ['index']]);
Route::resource('tasks', 'TaskController');
Route::resource('subtasks', 'SubtaskController');