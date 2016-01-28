<?php

class SubtaskController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
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
		    	'subtask_name' => Input::get('subtask_name'),
		    	'subtask_desc' => Input::get('subtask_desc')
		    ],
		    [
		    	'subtask_name' => 'required|min:4|max:20',
		    	'subtask_desc' => 'min:5|max:40'
		    ]
		);

        if($validation->fails()) {
            return 'Validation Error';
        }
        else{
        	$subtask_name = Input::get('subtask_name');
		    $subtask_desc = Input::get('subtask_desc');
		    $task_id = Input::get('task_id');
        	$token = Input::get('token');

            try {
            	$subtask = new Subtask;
            	$subtask->task_id = $task_id;
            	$subtask->subtask_title = $subtask_name;
            	$subtask->subtask_desc = $subtask_desc;
            	$subtask->completed = 0;
            	$subtask->save();

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
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
