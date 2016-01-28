<?php

class SessionsController extends \BaseController {

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
		
		// return View::make('sessions.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		try {
			$tryauth = array(
	            'email' => $input['email'],
				'password' => $input['password']
            ); 

		if(Auth::attempt($tryauth)){
			$usrQuery = User::where('email','=', $input['email'])->first();
			$usrToken = $usrQuery->token;

		 	return Redirect::route('dashboard', array($usrToken));
		} else {
			return 'Log in Failed. Input your email and password correctly';
		}

		} catch (Exception $e) {
			echo $e;
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
	public function destroy()
	{
		try {
			Auth::logout();
		} catch (Exception $e) {
			echo $e;
		}

		return Redirect::route('home')->with('flash_message', 'Logged Out');
	}


}
