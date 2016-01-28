<?php

class TaskController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return 'Its Index from taskcontroller';
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return 'Its Create from taskcontroller';
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$validation = Validator::make(
		    [
		    	'task_title' => Input::get('task_title'),
		    	'task_desc' => Input::get('task_desc'),
		    	'start_date' => Input::get('start_date'),
		    	'end_date' => Input::get('end_date'),
		        'selectme' => Input::get('selectme'),
		        'assigntome' => Input::get('assigntome')
		    ],
		    [
		    	'task_title' => 'required|min:4|max:20',
		    	'task_desc' => 'min:5|max:40',
		    	'start_date' => 'required|date_format:"m/d/Y"',
		        'end_date' => 'required|date_format:"m/d/Y"',
		        'selectme' => 'required_without:assigntome',
		        'assigntome' => 'required_without:selectme'
		    ]
		);

        if($validation->fails()) {
            return 'Validation Error';
        }
        else{

        	$task_title = Input::get('task_title');
		    $task_desc = Input::get('task_desc');

		    $taskStart = Input::get('start_date');
			$start_date = date("Y-m-d", strtotime($taskStart));

			$taskEnd = Input::get('end_date');
			$end_date = date("Y-m-d", strtotime($taskEnd));

		    $selectme = Input::get('selectme');
		    $assigntome = Input::get('assigntome');
        	$team_id = Input::get('team_id');
        	$projectID = Input::get('project_id');
        	$token = Input::get('token');

        	if($selectme == ""){
        		$assignee = $assigntome;
        	}
        	else if($assigntome == ""){
        		$assignee = $selectme;
        	}

            try {
            	// date_default_timezone_set("Asia/Dhaka");
            	$currentTime = date('H:i:s');

            	$task = new Task;
            	$task->assigned_to = $assignee;
            	$task->assigned_by = Auth::id();
            	$task->project_id = $projectID;
                $task->title = $task_title;
            	$task->description = $task_desc;
            	$task->start_date = $start_date;
            	$task->end_date = $end_date;
            	$task->task_created_at = $currentTime;
            	$task->completed = 0;
            	$task->save();

            	return Redirect::route('dashboard', array($token));

            } catch(Exception $e){
            	echo $e;
            }
        }  

		// return Input::all();
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return 'ITs Show from taskcontroller';
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return 'ITs Edit from taskcontroller';
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		return 'ITs Update from taskcontroller';
	}

	public function delete_subtask($task_id)
    {
        $task_search = Task::find($task_id);
        if($task_search) {
            $task_search->delete();

            return Redirect::route('home');
        } else {
            return 'Cant Delete Task';
        }
    }


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return 'Nothing';
	}


}
