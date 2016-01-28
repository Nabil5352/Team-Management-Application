@include('modals')

<?php
	$usr = Auth::user();
	$user_id = $usr->id;
	$team_id = $usr->team_id;
	$user_email = $usr->email;
	$usrToken = $usr->token;

	// teammates info
	$team_info = App::make('FunctionController')->fetchTeammates($team_id);

	// tasks info
	$task_info = App::make('FunctionController')->fetchTasks($team_id);
	$tasks_info = App::make('FunctionController')->tasksOverview($team_id);

	// file info
	$file_info = App::make('FunctionController')->fetchFiles($team_id);
	$files_info = App::make('FunctionController')->filesOverview($team_id);

	// milestone
	$milestone_info = App::make('FunctionController')->milestoneInfo($team_id);
	$milestone_query = App::make('FunctionController')->milestoneExist($team_id);
	$milestone_count = $milestone_query[0]['count(distinct milestones.project_id)'];
	$milestones_info = App::make('FunctionController')->milestoneOverview($team_id);
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" ng-app> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Dashboard &#124; TeamPrez</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    {{ HTML::style('css/normalize.css') }}
    {{ HTML::style('css/main.css') }}
    {{ HTML::style('css/mysitestyle.css') }} 
    {{ HTML::style('css/semantic.css') }}
    {{ HTML::style('css/jquery-ui.min.css') }}
</head>
<body id="workspacebody">
	<!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->
<div>
	{{-- workspacegrid start --}}
	<div id="workspacegrid" class="ui two column grid stackable">
	{{-- firstgrid start	 --}}  
	  <div id="firstgrid" class="four wide column">
	  	{{-- topseg start --}}
	  	<div id="TopSeg" class="ui orange segment">

	  		{{-- first segment start --}}
  			<div id="segment1" class="ui vertical segment">
			    <p>
			    	<div id="logobox">
			    		<a id="logo" href="/" class="ui image">
						  	<img src="../images/logo.png" alt="logo">
						</a>
						<div id="dropdownsetting" class="ui basic icon top right pointing dropdown tiny button">
						    <i class="setting icon"></i>
						    <div class="menu">
						      <div id="addnewitembtn" class="item">Add New Team</div>
						      <div id="updateorgbtn" class="item">Update Organization</div>
						      <div id="orgsettingsbtn" class="item">Organization Settings</div>
						      <div id="showtagsbtn" class="item">Show Tags List</div>
						    </div>
						</div>
			    	</div>					

					<div id="teamsearch" class="ui left fluid mini icon input popmsg" data-content="Find your team" data-position="bottom left">
					  <input placeholder="Search" type="text">
					  <i class="search icon"></i>
					</div>
			    </p>
			</div>
			{{-- first segment end --}}

			{{-- second segment start --}}
			<div id="segment2" class="ui vertical segment">
			    <p>
			    	<div id="seg2child1" class="ui segment">
			  			<div id="usersidemenu" class="ui vertical segment">

			  				<!-- <div class="ui compact selection fluid dropdown downmenu">
							  <i class="dropdown icon"></i>
							  <div class="text">yourteamname</div>
							  <div class="menu">
							    <div class="item">Team A</div>
							    <div class="item">Team B</div>
							    <div class="item">Team C</div>
							  </div>
							</div> -->

							{{-- 	
							<select class="ui fluid dropdown">
							  <option value="">Choose Your Team</option>
							  <option value="1">Team 1</option>
							  <option value="0">Team 2</option>
							</select> 
							--}}

						    <p>
						    	<div id="mainusermenu" class="ui vertical fluid menu">
						    		<a id="showmsgbtn" class="active item" data-index="0">
									    MailBox
									    <div class="ui label" data-index="0">{{App::make('FunctionController')->count_message($user_id)}}</div>
									</a>
								    <a class="purple item" data-index="1">
									    My tasks
									    <div class="ui blue label" data-index="0">0</div>
									</a>
									
								</div>
						    </p>
						</div>
						<div id="teams">
							<div id="team1">
								<div class="ui vertical segment">
									<div id="seg2companytxt">
										<b> <span> {{App::make('FunctionController')->teamName($team_id)}} </span> </b>Management &nbsp;
										@if(App::make('FunctionController')->isLeader($user_id))
										<div class="ui basic icon mini button popmsg companyaddicon" data-content="Add teammember">
										  <i class="setting icon"></i>
										</div>
										@endif
									</div>
								    <div>
								    	@foreach ($team_info as $key => $value)
								    	<img src="../images/{{$value['image_path']}}" data-title="{{$value['fullname']}}" data-content="{{$value['email']}}" class="ui avatar image popmsg">
 										@endforeach

									</div>
								</div>
								<div class="ui vertical segment">
								    <div id="addprojecttext">
										Projects&nbsp;
										@if(!App::make('FunctionController')->projectExists($team_id) && App::make('FunctionController')->isLeader($user_id))
										<div class="ui basic icon mini button popmsg addnewproject" data-content="New project">									
												<i class="plus icon"></i>																		  
											</div>
										@endif	
									</div>

									@if(App::make('FunctionController')->projectExists($team_id))
										<div id="projectlabel" class="ui fluid medium blue labels">	
											<div class="ui label">
										    	<a href="" class="detail">
	  											<i class="icon folder open outline"></i>
	  											{{ App::make('FunctionController')->fetchProjectName($team_id) }}
	  											</a>
										  	</div>										
										</div>
									@elseif(!App::make('FunctionController')->projectExists($team_id) && App::make('FunctionController')->isLeader($user_id))
										<div id="getstarted" class="ui blue basic fluid tiny button addnewproject">
											<i class="icon database"></i>
												Get started with a project
										</div>
									@endif	
								</div>
							</div>
						</div>
			  		</div>
			    </p>
			</div>
			{{-- second segment end --}}

			{{-- third segment start --}}
			<div id="segment3" class="ui vertical segment">
			    <p>
			    	<div id="seg3child1" class="ui segment">
						<div id="lowermenu" class="ui vertical fluid segment">
						    <div id="seg3vertseg" class="ui three column grid">

								  <div class="column">
								    <a href="#">Help</a>
								  </div>

								  <div class="column">
								    <a href="#">Blog</a>
								  </div>

								  <div class="column">
								    <a href="{{URL::route('logout')}}">Log Out</a>
								  </div>

								</div>
						</div>
			  		</div> 
			    </p>
			</div>
			{{-- third segment end --}}
  		</div>
  		{{-- topseg end --}}
	  </div>
	  {{-- firstgrid end --}}

	  {{-- secondgrid start --}}
	  <div id="secondgrid" class="twelve wide column">
	  	{{-- bottomeseg start --}}
	  	<div id="BottomSeg" class="ui orange segment">
	  		<div class="ui top attached segment">
			 <img class="ui avatar image" src="{{asset('images/avater.png')}}">
			 {{App::make('FunctionController')->teamName($team_id)}} Task
			</div>

			{{-- workspacemenutopsegment start --}}
			<div id="workspacemenutopsegment" class="ui attached segment">
					<div id="workspacemenu" class="ui secondary pointing menu">
						  <a href="#" id="overview" class="active purple item" data-index="0">
						    <i class="home icon"></i> Overview
						  </a>
						  <a href="#" id="project" class="item" data-index="1">
						    <i class="protect purple icon"></i> Project
						  </a>
						  <a href="#" id="tasks" class="item" data-index="2">
						    <i class="list black icon"></i> Tasks
						  </a>
						  <a href="#" id="milestones" class="item" data-index="3">
						    <i class="checkered flag red icon"></i> Milestones
						  </a>
						   <a href="#" id="files" class="item" data-index="4">
						    <i class="file text blue icon"></i> Files
						  </a>
						   <a href="#" id="time" class="item" data-index="5">
						    <i class="alarm outline green icon"></i> Time
						  </a>
						   <a href="#" id="notebooks" class="item" data-index="6">
						    <i class="paste yellow icon"></i> Notebooks
						  </a>
						  {{-- <a href="#" id="links" class="item" data-index="7">
						    <i class="linkify teal icon"></i> Links
						  </a> --}}
						  <a href="#" id="people" class="item" data-index="8">
						    <i class="user orange icon"></i> People
						  </a>
						  <div class="right menu">
						    <a class="ui item" data-index="9">
						      <i class="settings icon"></i> 
						    </a>
						  </div>
					</div>

					{{-- dashboard menus item start --}}
					<div id="pages">
						{{-- overview start --}}
						<div id="overviewPage">	
							<div id="overviewcontainer">
								@if(App::make('FunctionController')->projectExists($team_id))
									<!--if projects exist-->
									<div id="overviewboard" class="ui fluid segment stackable">
									  	<div class="ui vertical segment">
											<div id="overviewmenu" class="ui tabular fluid  menu">
											  <div class="active item" data-tab="tab-activity">Activity</div>
											  <div class="item" data-tab="tab-todaytask">
											  	Running Tasks 
											  	<div class="ui purple label">
											  		{{App::make('FunctionController')->CountTaskForMe()}}
											  	</div>
											  </div>
											  <div class="item" data-tab="tab-upcomingmilestone">
											  	Upcoming Milestones
											  	<div class="ui red label">
											  		{{App::make('FunctionController')->CountMilestoneForMe($team_id)}}
											  	</div>
											  </div>
											</div>

											<div id="overviewboard" class="ui active tab" data-tab="tab-activity">
												<div id="topsegment" class="ui top attached segment">
												  <img id="topimg" class="ui top aligned tiny circular image" src="../images/workspaceellipse.png">
												  <div id="tpimgtxt"> Starts: <span id="tpstrtline">{{App::make('FunctionController')->project_start_date($team_id)}}</span> </div>					
												</div>

												<div id="middlesegment" class="ui attached segment">
												  	<div id="middleimg" >
												  		<img class="ui middle aligned tiny image" src="../images/workspacebar.png">
												  	</div>
												  	<div id="boardview">
												  		<table class="ui very basic table">
														  <tbody>
														  	@if(App::make('FunctionController')->taskExists($team_id))
														  		@foreach($tasks_info as $key => $value)
															    <tr>
															      <td class="center aligned"><a class="ui purple fluid label">Task</a></td>
															      <td class="left aligned"> <a href="#">{{$value['title']}}</a> </td>
															      <td></td>
															      <td></td>
															      <td class="right aligned">Assigned to </td>
															      <td class="left aligned"><img class="ui avatar image" src="../images/{{App::make('FunctionController')->tasksOverviewuserImage("$value[id]")}}"> <span>{{App::make('FunctionController')->tasksOverviewuserAssignedTo("$value[id]")}}</span></td>
															      <td>{{App::make('FunctionController')->tasksOverviewuserAssignedTime("$value[id]")}}</td>
															    </tr>
															    @endforeach
														    @endif

														    @if(App::make('FunctionController')->fileExist($team_id))
														    	@foreach($files_info as $key => $value)
															    <tr>
															      <td class="center aligned"><a class="ui blue fluid label">Files list</a></td>
															      <td class="left aligned"> <a href="#">{{App::make('FunctionController')->file_title("$value[id]")}}</a> </td>
															      <td></td>
															      <td></td>
															      <td class="right aligned">Uploaded by </td>
															      <td class="left aligned"><img class="ui avatar image" src="../images/{{App::make('FunctionController')->fetchFileUploaderImage("$value[id]")}}"> <span>{{App::make('FunctionController')->fetchFileUploaderName("$value[id]")}}</span></td>
															      <td>{{App::make('FunctionController')->fetchFileUploadTime("$value[id]")}}</td>
															    </tr>
															    @endforeach
														    @endif

														    @if(App::make('FunctionController')->milestoneExist($team_id))
														  		@foreach($milestones_info as $key => $value)
															    <tr>
															      <td class="center aligned"><a class="ui teal fluid label">Milestone</a></td>
															      <td class="left aligned"> <a href="#">{{App::make('FunctionController')->milestoneSubject("$value[id]")}}</a> </td>
															      <td></td>
															      <td></td>
															      <td class="right aligned">Created by </td>
															      <td class="left aligned"><img class="ui avatar image" src="../images/{{App::make('FunctionController')->milestoneCreatorImage("$team_id")}}"> <span>{{App::make('FunctionController')->milestoneCreator("$team_id")}}</span></td>
															      <td>{{App::make('FunctionController')->fetchMilestoneDate("$value[id]", "Full")}}</td>
															    </tr>
															    @endforeach
														    @endif

														  </tbody>
														</table>		  		
												  	</div>
												</div>

												<div id="bottomsegment" class="ui bottom attached segment">
												  <img id="bottomimg" class="ui bottom aligned tiny circular image" src="../images/workspaceellipse.png">
												  <div id="btmimgtxt"> Ends: <span id="btmdeadline">{{App::make('FunctionController')->project_end_date($team_id)}}</span> </div>
												  	<div id="btmbtns">
												  		<div class="ui tiny button">
														  <i class="feed icon"></i>
														  Activity Rss Feed
														</div>
														<div class="ui tiny button">
														  <i class="file excel outline icon"></i>
														  Export all to Excel
														</div>
														<div class="ui red small button">
														  <i class="remove circle outline icon"></i>
														  Delete Activity
														</div>
												  	</div>
												</div>
											</div>

											<div class="ui tab" data-tab="tab-todaytask">
											  <p>
											  	Lorem ipsum dolor sit amet, consectetur adipisicing elit.
											  </p>
											</div>

											<div class="ui tab" data-tab="tab-upcomingmilestone">
											  <p>
											  	Lorem ipsum dolor sit amet, consectetur adipisicing elit.
											  </p>
											</div>

									  	</div>
									</div>
									<!--end of 'if projects exist'-->
								@elseif(App::make('FunctionController')->isLeader($user_id) && !App::make('FunctionController')->projectExists($team_id))
									<div id="noproject">
										<div class="column">
											<i class="file text outline green icon"></i>
											<h2>No Projects</h2>
										</div>
										<p id="titletxt">
											You don't have any project yet!
											<br>
											Click the button below to get started.
										</p>
										<div class="ui green large button addnewproject">
										  Create the first project
										</div>
									</div>
								@elseif(!App::make('FunctionController')->isLeader($user_id) && !App::make('FunctionController')->projectExists($team_id))
									<div id="noproject">
										<div class="column">
											<i class="file text outline green icon"></i>
											<h2>No Projects</h2>
										</div>
										<p id="titletxt">
											You don't have any project yet!
											<br>
											Teamleader only create project.
										</p>
									</div>
								@endif
							</div>

						</div>
						{{-- overview end --}}

						{{-- project page start --}}
						<div id="projectPage">	
							<div id="projectcontainer">
								{{-- if any project exist with this teamID --}}
								@if(App::make('FunctionController')->projectExists($team_id))
									<!--if project exist-->
									<div id="projectexist">
										<div class="ui fluid segment stackable">
										  	<div id="topsegment" class="ui vertical segment">
												<div class="ui grid">
											    <div id="topsegtwelve" class="twelve wide column">
											    	<div id="projectname">
											    		{{App::make('FunctionController')->fetchProjectName($team_id)}}
											    	</div>
											        <div id="projectdesc">
											        	{{App::make('FunctionController')->fetchProjectDesc($team_id)}}
											        </div>
											    </div>
											    <div class="four wide column">
											    	<div id="projectbtns">
											    		<div class="ui blue mini top right pointing dropdown button">
												          <div class="text">Share</div>
												         <!--  <div id="sharemenu" class="menu">
												            <div class="item">
												              <p> 
												                <i class="users icon"></i>
												                Everyone in events can edit 

												                <i class="blue lock icon"></i>
												                <a href="#">Make Private</a> 
												              </p>
												            </div>
												            <div class="item">
												              Share This Project With Another Person
												              <div class="ui input">
												                <input placeholder="Type the name" type="text">
												              </div>
												            </div>
												          </div> -->
												        </div>
												        <div id="feedicon" class="ui icon basic mini button">
												          <i class="feed red icon"></i>
												        </div>
												        <div id="bookmarkicon" class="ui icon basic mini button">
												          <i class="star yellow icon"></i>
												        </div>
											    	</div>
											    </div>
												</div>
										  	</div>

										  	<div id="middlesegment" class="ui vertical segment">
										    	<div class="ui grid">
											   		<div id="middleseggridcol" class="sixteen wide column">
										   			
										   			<div id="myprojectmenu" class="ui tiered menu">
													  <div class="menu">
													    <a class="active item pdb" id="projectlist" data-index="0">
													      <i class="list icon"></i>
													      List
													    </a>
													    <a class="item pdb" id="projectcalender" data-index="1">
													      <i class="calendar icon"></i> 
													      Calender
													    </a>
													    <a class="item pdb" id="projectview" data-index="2">
													      <i class="ordered list icon"></i> 
													      View
													    </a>
													    <div class="right menu">
													      <div class="ui dropdown item">
													        More <i class="icon dropdown"></i>
													        <div class="menu">
													          <a class="item"><i class="edit icon"></i> New Task </a>
													          <a class="item"><i class="globe icon"></i> Choose Language</a>
													          <a class="item"><i class="settings icon"></i> Account Settings</a>
													        </div>
													      </div>
													    </div>
													  </div>
													  </div>

													<div id="contents">
														<div id="listpage">
															{{-- list view --}}
														    @if(App::make('FunctionController')->projectExists($team_id))
																@foreach (App::make('FunctionController')->fetchProjectNames($team_id) as $key => $projectValue)
																	<ul class="the-project">
																		<li>
																			<i class="top aligned right triangle icon"></i>
																			<b>Project: &nbsp;</b> {{$projectValue['project_title']}}

																			@if(App::make('FunctionController')->taskExistsForTree($projectValue['id']))
																				@foreach (App::make('FunctionController')->fetchTasksForTree($projectValue['id']) as $key => $taskValue)
																					<ul class="the-task">
																						<li>
																							<i class="angle double right icon"></i>
																							<b>Task: &nbsp;</b> {{$taskValue['title']}}

																							@if(App::make('FunctionController')->subtaskExistsForTree($taskValue['id']))
																								@foreach (App::make('FunctionController')->fetchSubtasksForTree($taskValue['id']) as $key => $subtaskValue)
																									<ul class="the-subtask">
																										<li>
																											<i class="angle double right icon"></i>
																											<b>SubTask: &nbsp;</b> {{$subtaskValue['subtask_title']}}
																										</li>
																									</ul>
																								@endforeach
																							@endif
																						</li>
																					</ul>
																				@endforeach
																			@endif
																		</li>
																	</ul>
																@endforeach
															@endif
														</div>
														<div id="calenderpage">
															CALENDER
														</div>
														<div id="viewpage">
															VIEW
														</div>
													</div>
													</div> 
											   	</div>
											</div>
										</div>

										  
									</div>
								@elseif(App::make('FunctionController')->isLeader($user_id) && !App::make('FunctionController')->projectExists($team_id))
									<!--if project not exist-->
									<div class="noproject">
										<div class="column">
											<i id="noprojecticocolor" class="protect purple icon"></i>
											<h2>No Project</h2>
										</div>
										<p id="titletxt">
											There is no project exist!
											<br>
										</p>
										<div id="createbtn" class="ui purple large button projectcolor addnewproject">
										  Create your first project
										</div>
									</div>
									<!--end of 'if project not exist'-->
								@elseif(!App::make('FunctionController')->isLeader($user_id) && !App::make('FunctionController')->projectExists($team_id))
									<div class="noproject">
										<div class="column">
											<i id="noprojecticocolor" class="protect purple icon"></i>
											<h2>No Project</h2>
										</div>
										<p id="titletxt">
											There is no project exist!
											<br>
										</p>
									</div>
								@endif
							</div>
						</div>
						{{-- project page end --}}

						{{-- task page start --}}
						<div id="tasksPage">	
							<div id="taskcontainer">
								{{-- if any task exist with projectID --}}
								@if(!App::make('FunctionController')->projectExists($team_id))
									<div id="notask">
										<div class="column">
											<i class="list purple icon"></i>
											<h2>No Project</h2>
										</div>
										<p id="titletxt">
											Before adding a task you need to create a project.
										</p>
									</div>
								@elseif(App::make('FunctionController')->projectExists($team_id) && App::make('FunctionController')->taskExists($team_id))
									<!--if task exist-->
									
 									<div id="taskexists">
											<div id="newaddtask" class="ui purple small basic icon button createtaskbtn">
											  <i class="plus icon"></i>
											  Add new task
											</div>
											@foreach ($task_info as $key => $value)
								    		<div class="ui raised fluid segment">
											<?php 
											$task_id = $value['id'];
											$subtask_info = App::make('FunctionController')->fetchSubtaskTasks($task_id);
											?>

											  <a class="ui purple ribbon label"> {{$value['title']}} </a> 
											  <a class="edittaskbtn popmsg" data-content="View Details"> <i class="maximize purple icon pointer"></i> </a>
											  <a class="createsubtaskbtn popmsg" data-content="Add new subtask"> <i class="plus purple icon pointer"></i> </a>

											  {{-- delete task --}}
											  <a href="{{URL::to('deletetask', $task_id)}}" class="deletetask popmsg right_float" data-content="Delete this task"><i class="remove red icon pointer"></i></a>
											  <p>
											  	<div class="ui divided list">
											  	@if(App::make('FunctionController')->subtaskExist($task_id))
												  @foreach($subtask_info as $key => $info)
													  <div class="item">
													  	<div class="right floated compact ui icon">
													  		<a href="#"><i class="star yellow icon"></i></a>
													  		<a href="#"><i class="user blue icon"></i></a>
													  	</div>
													    @if($info['completed'] == 0)
													    	<i class="warning red icon popmsg" data-content="Not completed"></i>
													    @else
													    	<i class="checkmark green icon popmsg" data-content="Completed"></i>
													    @endif
													    <div class="content">
													      <a class="header">{{$info['subtask_title']}}</a>
													      <div class="description">{{$info['subtask_desc']}}</div>
													    </div>
													  </div>
													@endforeach
												  @else
												  	{{-- if subtask not exist --}}
												  	<div id="nosubtask">
														<p id="titletxt">
															There is no subtask exist!
															<br>
														</p>
														<div class="ui purple small button projectcolor createsubtaskbtn">
														  Add a subtask
														</div>
													</div>
												  @endif
												</div>
											  </p>

											</div>

											{{-- add subtask --}}
											<div id="addsubtask" class="ui small modal stackable">
											  <i class="close icon"></i>
											  <div class="header">
											    <div class="ui breadcrumb">
											        <a class="section">{{App::make('FunctionController')->fetchProjectName($team_id)}}</a>
											        <i class="right chevron icon divider"></i>
											        <a class="active section">{{$value['title']}}</a>
											      </div>
											  </div> 
											    <div class="content">
											      {{Form::open(array('route' => 'subtasks.store'))}}
											      <div class="ui grid">
											        <div class="sixteen wide column">
											          <div class="ui fluid labeled teal small input">
											            <div class="ui blue label">
											              Title
											            </div>
											            <input name="subtask_name" placeholder="Subtask name" type="text">
											          </div>
											          <br>
											          <div class="ui fluid big input">
											            <input name="subtask_desc" placeholder="Add a description (Optional)" type="text">
											          </div>
											          <br>
											        </div>

											        {{-- hidden inputs --}}
											        <input name="task_id" type="hidden" value="{{$value['id']}}">
											        <input name="token" type="hidden" value="{{$usrToken}}">

											        
											      </div>
											       <div class="actions">
											      <input type="submit" class="ui red button" value="Add Subtask" />
											      <input type="" class="ui blue button" value="Cancel" />
											    </div>
											    {{Form::close()}}
											    </div>

											</div>

											<!-- edit task modal start -->
											<div id="edittask" class="ui small modal">
											  <i class="close icon"></i>
												  <div class="header">
												    <div id="headerrows" class="ui fluid grid">
												      <div id="rowone" class="row">

												      	@if(App::make('FunctionController')->assigneeExist($value['id']))
												        <div id="assignrow" class="ui icon floating dropdown four wide column">
												          <i class="icon blue user"></i>
												          <span class="text">Assigned</span>
												        </div>
												        @else
												        <div id="assignrow" class="ui icon floating dropdown four wide column">
												           <i class="icon blue user"></i>
												          <span class="text">Unassigned</span>
												          <div class="menu">
												            <div id="searchinput" class="ui icon mini fluid input">
												              <i class="search icon"></i>
												              <input name="assigneesearch" placeholder="Name or Email" type="text">
												            </div>
												            <div id="assigneedivider" class="divider"></div>
												              <div id="assigneelist" class="ui fluid list">
												                <div class="item">
												                  {{ HTML::image('images/avater.png', 'avater', array('class' => 'ui circular mini image')) }}
												                  <div class="content">
												                    <a class="header">Daniel Louise</a>
												                    <div class="description">somone@nothing.com</div>
												                  </div>
												                </div>
												                <div class="item">
												                  {{ HTML::image('images/avater.png', 'avater', array('class' => 'ui circular mini image')) }}
												                  <div class="content">
												                    <a class="header">Stevie Feliciano</a>
												                    <div class="description">somone@nothing.com</div>
												                  </div>
												                </div>
												                <div class="item">
												                  {{ HTML::image('images/avater.png', 'avater', array('class' => 'ui circular mini image')) }}
												                  <div class="content">
												                    <a class="header">Veronika Ossi</a>
												                    <div class="description">somone@nothing.com</div>
												                  </div>
												                </div>
												              </div>
												          </div>
												        </div>
												        @endif

												        <div id="duerow" class="ui icon floating dropdown four wide column">        
												          <i class="icon purple calendar"></i>
												          <span class="text">Due Date</span>
												          <div class="menu">
												            <div class="item">
												              CALENDAR
												            </div>
												          </div>
												        </div>
												        <div class="one wide column">
												          <i class="icon tasks"></i>
												        </div>
												        <div class="one wide column">
												          <i class="icon green tags"></i>
												        </div>
												        <div class="ui floating dropdown icon one wide column">
												          <i class="icon red attach"></i>
												          <div id="attachfilemenu" class="menu">
												            <div class="item">Attach from computer</div>
												            <div id="attachdivider" class="divider"></div>
												            <div class="item">Attach from Dropbox</div>
												            <div class="item">Attach from Google Drive</div>
												            <div class="item">Attach from Box</div>
												          </div>
												        </div>
												        <div class="one wide column">
												          <i class="icon yellow star"></i>
												        </div>
												        <div class="ui icon top left pointing dropdown one wide column">
												          <i class="dropdown icon"></i>
												          <div class="menu">
												              <div class="header">Options</div>
												              <div class="item">Item 1</div>
												              <div class="item">Item 2</div>
												              <div class="divider"></div>
												              <div class="header">Option</div>
												              <div class="item">New Item 1</div>
												              <div class="item">New Item 2</div>
												            </div>
												        </div>
												      </div>
												      <div id="rowtwo" class="row">
												        <div class="ui breadcrumb">
												          <a class="section">{{App::make('FunctionController')->fetchProjectName($team_id)}}</a>
												          <i class="right chevron icon divider"></i>
												          <a class="active section">{{$value['title']}}</a>
												        </div>
												      </div>
												      <div id="rowthree" class="row">
												        <h3><i class="list black icon"></i>{{$value['title']}} &nbsp;&nbsp;&nbsp;
												        	<div class="ui basic purple small button">
															  <i class="icon configure"></i>
															  Edit task
															</div>
												        </h3>

												      </div>
												    </div>
												  </div>

												  <div id="edittaskcontent" class="content">
												    <div class="ui divided list">
												    @foreach($subtask_info as $key => $info)
												      <div class="item">
												        <div class="right floated compact ui icon">
												          <a href="#"><i class="star yellow icon"></i></a>
												          <a href="#"><i class="user blue icon"></i></a>
												        </div>
												        @if($info['completed'] == 0)
													        <i class="warning red icon"></i>
													    @else
													    	<i class="checkmark green icon"></i>
													    @endif

												        <div class="content">
												          <a class="header">{{$info['subtask_title']}}</a>
												        </div>
												      </div>
												     @endforeach
												    </div>

												    <div id="contenttxt">
												    	
												      <p>{{App::make('FunctionController')->taskCreator($task_id)}} &nbsp; created task &nbsp;&nbsp;&nbsp;&nbsp; {{App::make('FunctionController')->fetchTime($task_id)}}</p>
												      <p>{{App::make('FunctionController')->taskCreator($task_id)}} &nbsp; added to &nbsp; {{App::make('FunctionController')->fetchProjectName($team_id)}} &nbsp;&nbsp;&nbsp;&nbsp; {{App::make('FunctionController')->fetchTime($task_id)}}</p>
												    </div>

												    <div id="contentcmnt" class="ui transparent left icon large fluid input">
												      <input id="contentcmntinput" placeholder="Write a comment" type="text">
												      <i class="comments purple icon"></i>
												    </div>
												    <div id="contentdivider" class="ui section divider"></div>
												    <div id="contentbottomgrid" class="ui grid stackable">
												      <div class="four wide column">
												        <i class="icon rss square"></i>
												        Followers
												      </div>
												      <div id="followerimgs" class="twelve wide column">
												      	@foreach ($team_info as $key => $value)
												    	<img src="../images/{{$value['image_path']}}" class="ui circular mini image popmsg" data-title="{{$value['fullname']}}" data-content="{{$value['email']}}" >
				 										@endforeach

												        <div class="ui basic icon mini button">
												          <i class="plus icon"></i>
												        </div>
												      </div>
												    </div>

												  </div>

												  <div class="actions">
												    <div class="ui red button">Cancel</div>
												    <div class="ui purple button">OK</div>
												  </div>
												</div>
											<!-- edit task modal end -->
 											@endforeach											
										</div>
									<!--end of 'if task exist'-->

									

								@elseif(App::make('FunctionController')->isLeader($user_id) && !App::make('FunctionController')->taskExists($team_id))
									<!--if task not exist-->
									<div id="notask">
										<div class="column">
											<i class="list purple icon"></i>
											<h2>No Tasks</h2>
										</div>
										<p id="titletxt">
											There is no task yet regarding this project!
											<br>
											Click the button below to create a task.
										</p>
										<div class="ui purple large button createtaskbtn">
										  Create the first task
										</div>
									</div>
									<!--end of 'if task not exist'-->
								@elseif(!App::make('FunctionController')->isLeader($user_id) && !App::make('FunctionController')->taskExists($team_id))
									<div id="notask">
										<div class="column">
											<i class="list purple icon"></i>
											<h2>No Tasks</h2>
										</div>
										<p id="titletxt">
											There is no task yet assigned to you in this project!
										</p>
									</div>
								@endif
							</div>
						</div>
						{{-- task page end

						{{-- milestone page start --}}
						<div id="milestonesPage">
							<div id="milestonecontainer">
									<!--if milestone not exist-->
									@if($milestone_count)
									<div class="ui segment">
									<div class="ui red small basic icon button milestonecreatebtn">
									  <i class="plus icon"></i>
									  Create a new milestone
									</div>
									<br/> <br/> 
									@foreach($milestone_info as $key => $value)
									   <div class="ui left floated red statistic">
									    <div class="value">
									      {{{App::make('FunctionController')->fetchMilestoneDate($value['id'], "Date")}}}
									    </div>
									    <div class="text value">
									      {{{App::make('FunctionController')->fetchMilestoneDate($value['id'], "Month")}}}
									    </div>
									    <div class="label">
									      {{{App::make('FunctionController')->fetchMilestoneDate($value['id'], "Year")}}}
									    </div>
									  </div>
									  @endforeach
									  <p>
									  	<div class="ui feed leftfloat">
									  		<div class="event">
											    <div class="label">
											      <i class="purple marker icon"></i>
											    </div>
											    <div class="content">
											      <div class="summary">
											        {{{App::make('FunctionController')->milestoneCreator($team_id)}}} created a milestone in this project
											        <div class="date">
											          {{-- TIME --}}
											        </div>
											      </div>
											      <div class="extra text">
											        {{{App::make('FunctionController')->milestoneSummary($value['id'])}}}
											      </div>
											      <div class="meta">
											        <a class="like">
											          <i class="paw icon"></i> {{{App::make('FunctionController')->milestoneSubject($value['id'])}}}
											        </a>
											      </div>
											    </div>
											  </div>
									  	</div>
									   </p>
									 </div>
									@else
									<div id="nomilestone">
										<div class="column">
											<i class="checkered flag red icon"></i>
											<h2>There is no milestone created yet</h2>
										</div>
										<p id="titletxt">
											Create a milestone in this project now
										</p>
										@if(App::make('FunctionController')->isLeader($user_id))	
											<div class="ui red large button milestonecreatebtn">
										  		Create a milestone
											</div>
										@endif
										
									</div>
									@endif
									<!--end of 'if milestone not exist'-->

									<!--if milestone exist-->

									<!--end of 'if milestone exist'-->
							</div>
						</div>
						{{-- milestone page end --}}

						{{-- files page start --}}
						<div id="filesPage">	
							<div id="filecontainer">
								@if(App::make('FunctionController')->fileExist($team_id))
								<!--if file exist-->
								<div class="ui blue small basic icon button uploadfilebtn">
								  <i class="plus icon"></i>
								  Upload new file
								</div>
								<br/> <br/> 
								<div class="ui feed">
									@foreach($file_info as $key => $value)
									<div class="event">
									    <div class="label">
									      <img src="../images/{{{App::make('FunctionController')->fetchFileUploaderImage($value['id'])}}}">
									    </div>
									    <div class="content">
									      <div class="date">
									        {{{App::make('FunctionController')->fetchFileUploadTime($value['id'])}}}
									      </div>
									      <div class="summary">
									         <a>{{{App::make('FunctionController')->fetchFileUploaderName($value['id'])}}}</a> added a file
									      </div>
									      <div class="extra images">
									        <a><img src="../images/file_icon.png"></a>
									      </div>
									      <div class="extra text">
									        <b>{{{App::make('FunctionController')->file_title($value['id'])}}}</b> <br>
									        {{{App::make('FunctionController')->file_summary($value['id'])}}}
									      </div>
									    </div>
									</div>
									@endforeach
								</div>
								<!--end of 'if file exist'-->
								@else
								<!--if file not exist-->
								<div id="nofile">
									<div class="column">
										<i class="file text blue icon"></i>
										<h2>No Files yet</h2>
									</div>
									<p id="titletxt">
										There are no files in your project yet!
										<br>
										Add your first file.
									</p>
									<div class="ui blue large button uploadfilebtn">
									  Upload a file
									</div>
								</div>
								<!--end of 'if file not exist'-->
								@endif
								
							</div> 
						</div>
						{{-- files page end --}}

						{{-- time page start --}}
						<div id="timePage">	
							<div id="timecontainer">
								<!--if task not exist-->
								<div id="notime">
									<div class="column">
										<i class="alarm outline green icon"></i>
										<h2>No Schedule</h2>
									</div>
									<p id="titletxt">
										There is no timetable scheduled yet!
										<br>
										Click the button below to schedule time.
									</p>
									@if(App::make('FunctionController')->isLeader($user_id))	
										<div class="ui green large button">
									  		Schedule Time
										</div>
									@endif
								</div>
								<!--end of 'if task not exist'-->

								<!--if task exist-->

								<!--end of 'if task exist'-->
							</div>
						</div>
						{{-- time page end --}}

						{{-- notebook page start --}}
						<div id="notebooksPage">	
							@include('notebooks')  
						</div>
						{{-- notebook page end --}}

						{{-- links page start --}}
						{{-- <div id="linksPage">	
							@include('links')  
						</div> --}}
						{{-- links page end --}}

						{{-- people page start --}}
						<div id="peoplePage">	
							
							@if(App::make('FunctionController')->peopleExist($team_id))
							<!--if people exist-->
							@if(App::make('FunctionController')->isLeader($user_id))
								<div class="ui purple small basic icon button companyaddicon">
								  <i class="plus icon"></i>
								  Add new member
								</div>
							@endif
							<div class="ui link cards">

							@foreach ($team_info as $key => $value)
								<div id="cardItems" class="card">
								    <div class="image">
								      <img src="../images/{{{ $value['image_path'] }}}">
								    </div>
								    <div class="content">
								    	@if($value['id'] == $user_id)
								    		<i id="editmemberbtn" class="right floated edit orange icon"></i>
								    	@endif
								      <div class="header">{{{$value['fullname']}}}</div>
								      <div class="meta">
								      	@if(App::make('FunctionController')->isLeader($value['id']))
								        <a>Team Leader</a>
								        @else
								        <a>Member</a>
								        @endif
								      </div>
								      <div class="description">
								        {{{$value['fullname']}}} is a set designer living in New York who enjoys kittens, music, and partying.
								      </div>
								    </div>
								    <div class="extra content">
								      <span>
								        <i class="mail icon"></i>
								        {{{$value['email']}}}
								      </span>
								    </div>
								</div>
							@endforeach
							</div>
							<!--end of 'if people exist'-->
							@else
							<!--if people not exist-->
							<div id="nopeople">
								<div class="column">
									<i class="user orange icon"></i>
									<h2>No People added yet</h2>
								</div>
								<p id="titletxt">
									There is no people in this project!
									<br>
									Click the button below to add a person.
								</p>
								<div class="ui orange large button">
								  Add people
								</div>
							</div>
							<!--end of 'if people not exist'-->
							@endif
						</div>
						{{-- people page end --}}
					</div>
			</div>
			{{-- workspacemenutopsegment end --}}

			<div class="ui bottom attached segment">
			  <div class="ui grid">
			    	<div class="one wide column">Videos</div>
				    <div class="five wide column">
				    	<p> <i class="video play outline icon"></i>Intro to TeamPrez </p>
				    	<p> <i class="video play outline icon"></i>Teamwork made easy </p>
				    </div>
				    <div class="five wide column">
				    	<p> <i class="video play outline icon"></i>Set goals in with calendar</p>
				    	<p> <i class="video play outline icon"></i>Plan your day in TeamPrez</p>
				    </div>
				    <div class="five wide column">
				    	<p> <i class="video play outline icon"></i>Plan and Run meetings in TeamPrez</p>
				    	<p> <i class="video play outline icon"></i>Capture ideas in TeamPrez</p>
				    </div>
				</div>
			</div>
  		</div>
  		{{-- bottomseg end --}}

	  </div>
	  {{-- secondgrid end --}}
	</div>
	{{-- workspacegrid end --}}
</div>

	<script>
	window.jQuery || document.write('<script src="../js/vendor/jquery-2.1.1.min.js"><\/script>')
	</script>
	<script type="text/javascript" src="../js/vendor/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="../js/semantic.js"></script>
	<script type="text/javascript" src="../js/plugins.js"></script>
	<script type="text/javascript" src="../js/modal.js"></script>
	<script type="text/javascript" src="../js/main.js"></script>
	<script type="text/javascript" src="../js/jquery-ui.min.js"></script>

	{{-- angular js files --}}
</body>
</html>