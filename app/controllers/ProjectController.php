<?php

class ProjectController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		return $id.' Index Method';
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
		$userToken = Input::get('token');

		$validation = Validator::make(
		    [
		        'projectname' => Input::get('projectname'),
		        'description' => Input::get('description'),
		        'start_date' => Input::get('start_date'),
		        'end_date' => Input::get('end_date')
		    ],
		    [
		        'projectname' => 'required|min:4|max:40',
		        'description' => 'min:10|max:60',
		        'start_date' => 'required|date_format:"m/d/Y"',
		        'end_date' => 'required|date_format:"m/d/Y"'
		    ]
		);

        if($validation->fails()) {
            return Redirect::route('dashboard', array($userToken))->withErrors($validation);
        }
        else{
        	$projectName = Input::get('projectname');
		    $projectDesc = Input::get('description');

		    $projectStart = Input::get('start_date');
			$start_day = date("Y-m-d", strtotime($projectStart));

			$projectEnd = Input::get('end_date');
			$end_day = date("Y-m-d", strtotime($projectEnd));

		    $team_id = Input::get('team_id');
            try {
            	$project = new Project;
            	$project->project_title = $projectName;
            	$project->project_desc = $projectDesc;
            	$project->team_id = $team_id;
            	$project->strat_date = $start_day;
            	$project->end_date = $end_day;
            	$project->save();

                return Redirect::route('dashboard', array($userToken));
            } catch(Exception $e){
            	echo $e;
            	return 'Something is wrong!';
            }
        } 
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return $id.' Show Method';
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
