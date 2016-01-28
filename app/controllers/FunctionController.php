<?php

class FunctionController extends BaseController {

	public function isLeader($user_id)
	{
		$isteamleader = Team::where('leader_id', '=', $user_id)->count();
		return $isteamleader;
	}

	public function projectExists($team_id)
	{
		$projectExist = Project::where('team_id', '=', $team_id)->count();
		return $projectExist;
	}

	public function teamName($team_id)
	{
		$team_info = Team::where('id', '=', $team_id)->first();
		$team_name = $team_info->team_title;

		return $team_name;
	}

	public function fetchTeammates($team_id){
		$team = User::where('team_id', '=', $team_id)->get();

		return $team;
	}

	public function fetchTeammatesForSelectmenu($team_id){
		$team = User::where('team_id', $team_id)->where('id', '!=', Auth::id())->get();
		
		return $team;
	}

	public function fetchProjectName($team_id){
		$project_info = Project::where('team_id', '=', $team_id)->first();
		$project_title = $project_info->project_title;

		return $project_title;
	}

	public function fetchProjectDesc($team_id){
		$project_info = Project::where('team_id', '=', $team_id)->first();
		$project_desc = $project_info->project_desc;

		return $project_desc;
	}

	public function fetchProjectNames($team_id){
		$project_info = Project::where('team_id', '=', $team_id)->get();

		return $project_info;
	}

	public function fetchProjectID($projectName){
		$project_info = Project::where('project_title', '=', $projectName)->first();
		$project_id = $project_info->id;

		return $project_id;
	}

	public function project_start_date($team_id){
		$project_info = Project::where('team_id', '=', $team_id)->first();
		$db_date = $project_info->strat_date;
		$date = new DateTime($db_date);
		$project_start_date = $date->format('d M Y');

		return $project_start_date;
	}

	public function project_end_date($team_id){
		$project_info = Project::where('team_id', '=', $team_id)->first();
		$db_date = $project_info->end_date;
		$date = new DateTime($db_date);
		$project_end_date = $date->format('d M Y');

		return $project_end_date;
	}

	public function taskExists($team_id){
		$project_info = Project::where('team_id', '=', $team_id)->first();
		$projectID = $project_info->id;

		$task_count = Task::where('project_id', '=', $projectID)->count();	

		return $task_count;
	}

	public function fetchTasks($team_id){
		$project_info = Project::where('team_id', '=', $team_id)->first();
		$projectID = $project_info->id;

		$tasks = Task::where('project_id', '=', $projectID)->get();	

		return $tasks;
	}

	public function taskExistsForTree($project_id){
		$task_count = Task::where('project_id', '=', $project_id)->count();

		return $task_count;
	}

	public function fetchTasksForTree($project_id){
		$task_info = Task::where('project_id', '=', $project_id)->get();

		return $task_info;
	}

	public function assigneeExist($id){			
		$tasks_info = Task::find($id);	

		if($tasks_info->assigned_to){
			return true;
		} else {
			return false;
		}
	}

	public function subtaskExist($task_id){			
		$substasks_count = Subtask::where('task_id', '=', $task_id)->count();

		return $substasks_count;
	}

	public function fetchSubtaskTasks($task_id){			
		$substasks_info = Subtask::where('task_id', '=', $task_id)->get();

		return $substasks_info;
	}

	public function subtaskExistsForTree($task_id){
		$subtask_count = Subtask::where('task_id', '=', $task_id)->count();

		return $subtask_count;
	}

	public function fetchSubtasksForTree($task_id){
		$subtask_info = Subtask::where('task_id', '=', $task_id)->get();

		return $subtask_info;
	}

	public function taskCreator($task_id){			
		$tasks_info = Task::find($task_id);
		$task_creator_id = $tasks_info->assigned_by;

		$creator_info = User::find($task_creator_id);
		$creator_name = $creator_info->fullname;

		return $creator_name;
	}

	public function CountTaskForMe(){
		$count_task_for_me = DB::table('tasks')
    				->where('assigned_to', '=', Auth::id())
    				->where('completed', '=', 0)
    				->count();
 
		return $count_task_for_me;
	}

	public function taskForMe(){
		$task_for_me = Task::where('assigned_to', '=', Auth::id())->get();
 
		return $task_for_me;
	}

	public function fetchTime($task_id){			
		$tasks_info = Task::find($task_id);
		$task_creator_at = $tasks_info->task_created_at;

		return $task_creator_at;
	}

	public function fileExist($team_id){			
		$file_count = DB::table('files')->where('team_id', '=', $team_id)->count();

		return $file_count;
	}

	public function fetchFiles($team_id){	
		DB::setFetchMode(PDO::FETCH_ASSOC);

		$files = DB::table('files')->where('team_id', '=', $team_id)->take(2)->get();

		DB::setFetchMode(PDO::FETCH_CLASS);
		return $files;
	}

	public function filesOverview($team_id){	
		DB::setFetchMode(PDO::FETCH_ASSOC);

		$files = DB::table('files')->where('team_id', '=', $team_id)->get();

		DB::setFetchMode(PDO::FETCH_CLASS);
		return $files;
	}

	public function fetchFileUploadTime($file_id){

		$thisFile = DB::table('files')->where('id', '=', $file_id)->first();

		// converting date to hours and minutes
		$dbTime = $thisFile->time;

		$now = new DateTime();
		$format_currentdate = $now->format('Y-m-d H:i:s');

		$conv1 = strtotime($dbTime);
		$conv2 = strtotime($format_currentdate);

		$minute = round(abs($conv2 - $conv1) / 60,2);

		$hour = round($minute / 60);
		$minutes = round($hour * 60 - $minute);

		if($hour == 0){
			return "". $minutes . " minutes ago.";
		} else if($minutes == 0){
			return "" . $hour . " hours ago.";
		} else {
			return "" . $hour . " hours and ". $minutes . " minutes ago.";
		}		
	}

	public function fetchFileUploaderImage($file_id){

		$thisFile = DB::table('files')->where('id', '=', $file_id)->first();

		$userID = $thisFile->uploader_id;

		$usr = User::find($userID);
		$usr_img = $usr->image_path;

		return $usr_img;	
	}

	public function fetchFileUploaderName($file_id){

		$thisFile = DB::table('files')->where('id', '=', $file_id)->first();

		$userID = $thisFile->uploader_id;

		$usr = User::find($userID);
		$usr_name = $usr->fullname;

		return $usr_name;	
	}

	public function file_title($file_id){

		$thisFile = DB::table('files')->where('id', '=', $file_id)->first();

		$file_title = $thisFile->title;
		$file_extension = $thisFile->extension;
		$file_size = $thisFile->file_size;

		$thisFile_info = $file_title.".".$file_extension." (".$file_size." Bytes)";

		return $thisFile_info;	
	}

	public function file_summary($file_id){

		$thisFile = DB::table('files')->where('id', '=', $file_id)->first();

		$file_summary = $thisFile->summary;

		return $file_summary;	
	}

	public function peopleExist($team_id){			
		$team_info = User::where('team_id', '=', $team_id)->count();

		return $team_info;
	}

	public function count_message($user_id){			
		$msg_count = Inbox::where('receiver_id', '=', $user_id)->count();

		return $msg_count;
	}

	// for message box START
	public function fetchInbox($user_id){
		$inbox_msgs = Inbox::where('receiver_id', '=', $user_id)->get();

		return $inbox_msgs;
	}

	public function fetchDraft($user_id){
		$draft_msgs = Draft::where('creator_id', '=', $user_id)->get();

		return $draft_msgs;
	}

	public function fetchOutbox($user_id){
		$outbox_msgs = Inbox::where('sender_id', '=', $user_id)->get();

		return $outbox_msgs;
	}

	public function fetchImage($msg_id){
		$thisMessage = Inbox::where('id', '=', $msg_id)->first();
		$thisMessageSenderID = $thisMessage->sender_id;

		$usr = User::find($thisMessageSenderID);
		$usrImg = $usr->image_path;

		return $usrImg;
	}

	public function fetchSenderName($msg_id){
		$thisMessage = Inbox::where('id', '=', $msg_id)->first();
		$thisMessageSenderID = $thisMessage->sender_id;

		$usr = User::find($thisMessageSenderID);
		$usrName = $usr->fullname;

		return $usrName;
	}

	public function fetchMsgTime($msg_id){
		$thisMessage = Inbox::where('id', '=', $msg_id)->first();

		// converting date to hours and minutes
		$dbTime = $thisMessage->time;

		$now = new DateTime();
		$format_currentdate = $now->format('Y-m-d H:i:s');

		$conv1 = strtotime($dbTime);
		$conv2 = strtotime($format_currentdate);

		$minute = round(abs($conv2 - $conv1) / 60,2);

		$hour = round($minute / 60);
		$minutes = round($hour * 60 - $minute);

		if($hour == 0){
			return "". $minutes . " minutes ago.";
		} else if($minutes == 0){
			return "" . $hour . " hours ago.";
		} else {
			return "" . $hour . " hours and ". $minutes . " minutes ago.";
		}
	}

	public function fetchsubject($msg_id){
		$thisMessage = Inbox::where('id', '=', $msg_id)->first();
		$thisMessageSubject = $thisMessage->subject;

		return $thisMessageSubject;
	}

	public function fetchtext($msg_id){
		$thisMessage = Inbox::where('id', '=', $msg_id)->first();
		$thisMessageText = $thisMessage->message;

		return $thisMessageText;
	}

	public function fetchReceiverName($msg_id){
		$thisMessage = Inbox::where('id', '=', $msg_id)->first();
		$thisMessageReceiverID = $thisMessage->receiver_id;

		$usr = User::find($thisMessageReceiverID);
		$usrName = $usr->fullname;

		return $usrName;
	}

	public function fetchDraftsubject($msg_id){
		$thisMessage = Draft::where('id', '=', $msg_id)->first();
		$thisMessageSubject = $thisMessage->subject;

		return $thisMessageSubject;
	}

	public function fetchDraftTime($msg_id){
		$thisMessage = Draft::where('id', '=', $msg_id)->first();

		// converting date to hours and minutes
		$dbTime = $thisMessage->time;

		$now = new DateTime();
		$format_currentdate = $now->format('Y-m-d H:i:s');

		$conv1 = strtotime($dbTime);
		$conv2 = strtotime($format_currentdate);

		$minute = round(abs($conv2 - $conv1) / 60,2);

		$hour = round($minute / 60);
		$minutes = round($hour * 60 - $minute);

		if($hour == 0){
			return "". $minutes . " minutes ago.";
		} else if($minutes == 0){
			return "" . $hour . " hours ago.";
		} else {
			return "" . $hour . " hours and ". $minutes . " minutes ago.";
		}
	}

	public function fetchDraftText($msg_id){
		$thisMessage = Draft::where('id', '=', $msg_id)->first();
		$thisMessageText = $thisMessage->message;

		return $thisMessageText;
	}
	// for message box END

	public function fetchProjects($team_id){
		$projects = Project::where('team_id', '=', $team_id)->get();

		return $projects;
	}

	public function milestoneExist($team_id){
		DB::setFetchMode(PDO::FETCH_ASSOC);	
		
		$query = DB::select(
			"SELECT count(distinct milestones.project_id) 
			FROM milestones 
			INNER JOIN projects 
			ON milestones.project_id = projects.id 
			INNER JOIN teams 
			ON projects.team_id = '$team_id'"
			);

		DB::setFetchMode(PDO::FETCH_CLASS);

		return $query;
	}

	public function milestoneInfo($team_id){
		$project_info = Project::where('team_id', '=', $team_id)->first();
		$project_id = $project_info->id;

		$milestones = Milestone::where('project_id', '=', $project_id)->get();

		return $milestones;

	}

	public function milestoneOverview($team_id){
		$project_info = Project::where('team_id', '=', $team_id)->first();
		$project_id = $project_info->id;

		$milestones = Milestone::where('project_id', '=', $project_id)->get();

		return $milestones;

	}

	public function CountMilestoneForMe($team_id){

		$project_info = Project::where('team_id', '=', $team_id)->first();
		$project_id = $project_info->id;

		$count_milestone_for_me = DB::table('milestones')
    				->where('project_id', '=', $project_id)
    				->count();
 
		return $count_milestone_for_me;
	}

	public function fetchMilestoneDate($milestone_id, $keyword){

		$milestones = Milestone::find($milestone_id);
		$milestone_date = $milestones->date;

		$keywords = preg_split('/(\[-\])/', $milestone_date);

		if (preg_match('%(\d{4})-(\d{2})-(\d{2})%', $milestone_date, $regs)) {
		    $result = "";
		    $year = $regs[1]; 
		    $month = $regs[2]; 
		    switch ($month) {
		    	case '01':
		    		$month_word = "January";
		    		break;
		    	case '02':
		    		$month_word = "February";
		    		break;
		    	case '03':
		    		$month_word = "March";
		    		break;
		    	case '04':
		    		$month_word = "April";
		    		break;
		    	case '05':
		    		$month_word = "May";
		    		break;
		    	case '06':
		    		$month_word = "June";
		    		break;
		    	case '07':
		    		$month_word = "July";
		    		break;
		    	case '08':
		    		$month_word = "August";
		    		break;
		    	case '09':
		    		$month_word = "September";
		    		break;
		    	case '10':
		    		$month_word = "October";
		    		break;
		    	case '11':
		    		$month_word = "November";
		    		break;
		    	case '12':
		    		$month_word = "December";
		    		break;
		    	
		    	default:
		    		# code...
		    		break;
		    }

		    $date = $regs[3]; 
		}
		else {
			$result = "Can not determine.";
		}

		if($keyword == "Date"){
			return $date;
		} elseif($keyword == "Month"){
			return $month_word;
		} elseif($keyword == "Year") {
			return $year;
		} elseif($keyword == "Full")  {
			$result = $date." - ".$month_word." - ".$year;
			return $result;
		}

	}

	public function milestoneSummary($milestone_id){
		$milestone_info = Milestone::find($milestone_id);
		$summary = $milestone_info->summary;

		return $summary;

	}

	public function milestoneSubject($milestone_id){
		$milestone_info = Milestone::find($milestone_id);
		$subject = $milestone_info->subject;

		return $subject;
	}

	public function milestoneCreator($team_id){
		$team_info = Team::find($team_id);
		$leader = $team_info->leader_id;

		$user = User::find($leader);
		$creator_name = $user->fullname;

		return $creator_name;
	}

	public function milestoneCreatorImage($team_id){
		$team_info = Team::find($team_id);
		$leader = $team_info->leader_id;

		$user = User::find($leader);
		$creator_image = $user->image_path;

		return $creator_image;
	}

	public function tasksOverview($team_id){
		$project_info = Project::where('team_id', '=', $team_id)->first();
		$projectID = $project_info->id;

		$tasks = Task::where('project_id', '=', $projectID)->take(2)->get();	

		return $tasks;
	}

	public function tasksOverviewuserImage($task_id){
		$tasks = Task::find($task_id);
		$task_assigned_to = $tasks->assigned_to;

		$user = User::find($task_assigned_to);
		$image_path = $user->image_path;

		return $image_path;
	}

	public function tasksOverviewuserAssignedTo($task_id){
		$tasks = Task::find($task_id);
		$task_assigned_to = $tasks->assigned_to;

		$user = User::find($task_assigned_to);
		$fullname = $user->fullname;

		return $fullname;
	}

	public function tasksOverviewuserAssignedTime($task_id){
		$tasks = Task::find($task_id);
		$task_assigned_at = $tasks->task_created_at;

		return $task_assigned_at;
	}



	// public function fetchMilestoneCreator($project_id){
	// 	$projectInfo = Project::where('project_id', '=', $project_id)->first();
	// 	$leader_id = $projectInfo->
	// }
	// public function testindex($id){
	// 	return View::make('test', array('id' => $id));
	// }

	public function testController($token){
		$currentUsr = Auth::user();
        $currentToken = $currentUsr->token;

        if($currentToken == $token){
        	return $currentToken;
        } else {
        	return 'Token Mismatch';
        }
	}



}
