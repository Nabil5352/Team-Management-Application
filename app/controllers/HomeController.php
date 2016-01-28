<?php

class HomeController extends BaseController {

	public function showWelcome()
	{
		return View::make('home');
	}

	public function createUser()
	{
		$validation = Validator::make(
		    [
		        'gmailmail' => Input::get('gmailmail'),
		        'nongmailmail' => Input::get('nongmailmail')
		    ],
		    [
		        'gmailmail' => 'required_without:nongmailmail|max:40|email',
		        'nongmailmail' => 'required_without:gmailmail|max:40|email'
		    ]
		);

        if($validation->fails()) {
            return Redirect::route('home')->with('fail', 'Enter your correct email.');
        }
        else{
        	$gmailemail = Input::get('gmailmail');
        	$otheremail = Input::get('nongmailmail');

        	if(!is_null($gmailemail) & is_null($otheremail)){
        		$email = $gmailemail;
        	}
        	else if(is_null($gmailemail) & !is_null($otheremail)){
        		$email = $otheremail;
        	}

        	$code = str_random(60);
            $token = str_random(40);

            try {
            	$user = new User;
            	$user->email = $email;
            	$user->code = $code;
            	$user->active = 0;
                $user->image_path = 'avater.png';
            	$user->token = $token;
            	$user->save();

                Mail::send('emails.signupuser', array('link'=> URL::route('confirm_user_sign_up', $code)), function($message) use ($email) {
                        $message->to($email, 'New User')->subject('Account Activation');
                    });

                return Redirect::route('confirm_sign_up_msg')->with('success', 'message');
            } catch(Exception $e){
            	echo $e;
            	return Redirect::route('home')->with('fail', 'message');
            }
        }   
	}

	public function showSignUpConfirmMessage()
	{
		return View::make('emails.confirmSignUpMessage');
	}

	public function confirmUser($code)
	{
		try {
            $userConfirmed = User::where('code', '=', $code)->first();

            if($userConfirmed){
                return Redirect::route('welcome', array($code));
            }
            else{
                return 'Cant Find';
            }
        } catch (Exception $e) {
            return 'Sorry, You are in the wrong page';
        }
	}

	public function welcomeUser($code)
	{
		$welcomeUserConfirmed = User::where('code', '=', $code)->count();

        if($welcomeUserConfirmed){
            return View::make('profile.welcome')->with('code', $code);
        }
        else{
            return 'Cant Find';
        }
	}

	public function setprofile_step1($code)
	{
		$setup_step_one = User::where('code', '=', $code)->count();

        if($setup_step_one){
            return View::make('profile.step1')->with('code', $code);
        }
        else{
            return 'Cant Find Step 1';
        }
	}

    public function postStepOne()
    {
        $validation = Validator::make(
            [
                'fullname' => Input::get('fullname'),
                'password' => Input::get('password'),
                'confirm_password' => Input::get('confirm_password')
            ],
            [
                'fullname' => 'required|max:40|min:3',
                'password' => 'required|min:6',
                'confirm_password' => 'required|same:password'
            ]
        );

        $code = Input::get('code');

        if ($validation->fails()) {
            return Redirect::route('setprofile_step_1', array($code))
                    ->withErrors($validation)
                    ->withInput(Input::except('_token'));
        } else {
            $fullname = Input::get('fullname');
            $password = Hash::make(Input::get('password'));

            try {
                $submit_step_one = User::where('code', '=', $code)->first();

                if($submit_step_one){
                    $submit_step_one->fullname = $fullname;
                    $submit_step_one->password = Hash::make($password);
                    $submit_step_one->save();


                    return Redirect::route('setprofile_step2', array($code));
                } else {
                    return 'Insertion Failed';
                }

            } catch(Exception $e){
                return Redirect::route('setprofile_step_1');
            }
        }
    }

	public function setprofile_step2($code)
	{
		$setup_step_two = User::where('code', '=', $code)->count();

        if($setup_step_two){
            return View::make('profile.step2')->with('code', $code);
        }
        else{
            return 'Cant Find Step 2';
        }
	}

    public function postStepTwo()
    {
        $code = Input::get('code');

        try{
            if(Input::get('personal')){
                $submit_step_two = User::where('code', '=', $code)->first();

                if($submit_step_two){
                    $submit_step_two->account_type = 'personal';
                    $submit_step_two->save();

                    return Redirect::route('dashboard', array($code));
                } else {
                    return 'Insertion Failed';
                }
            }
            else if(Input::get('corporate')){
                $submit_step_two_2 = User::where('code', '=', $code)->first();

                if($submit_step_two_2){

                    $submit_step_two_2->account_type = 'corporate';
                    $submit_step_two_2->save();

                    $userID = $submit_step_two_2->id;
                    $usermail = $submit_step_two_2->email;

                    DB::table('organizations')->insert(
                    array(
                        'org_title' => 'smahmud005@gmail.com', 
                        'org_email' => 'smahmud005@gmail.com',
                        'creator_id' => 25
                        ));

                    return Redirect::route('setprofile_step3', array($code));
                } else {
                    return 'cant update usertable';
                }
            }
            else{
                return Redirect::route('setprofile_step2', array($code));
            }
        } catch(Exception $e) {
            echo $e;
            return Redirect::route('setprofile_step2', array($code));
        }
    }

	public function setprofile_step3($code)
	{
		$setup_step_three = User::where('code', '=', $code)->count();

        if($setup_step_three){
            return View::make('profile.step3')->with('code', $code);
        }
        else{
            return 'Cant Find Step 3';
        }
	}

	public function postStepThree()
    {
        $code = Input::get('code');

        $validation = Validator::make(
            [
                'teamname' => Input::get('teamname')
            ],
            [
                'teamname' => 'required|max:20|min:4'
            ]
        );

        if ($validation->fails()) {
            return Redirect::route('setprofile_step3', array($code))
                    ->withErrors($validation)
                    ->withInput(Input::except('_token'));
        } else {
            $teamname = Input::get('teamname');

            try {

                $userQuery = User::where('code', '=', $code)->first();
                $creatorID = $userQuery->id;

                $orgIDQuery = DB::table('organizations')->where('creator_id', '=', $creatorID)->first();               
                $orgID = $orgIDQuery->id;

                if($userQuery && $orgIDQuery){
                    $team = new Team;
                    $team->team_title = $teamname;
                    $team->leader_id = $creatorID;
                    $team->org_id = $orgID;
                    $team->save();

                    $teamQuery = Team::where('team_title', '=', $teamname)->first();
                    $teamID = $teamQuery->id;

                    $userQuery->team_id = $teamID;
                    $userQuery->save();

                    return Redirect::route('setprofile_step4', array($code));
                }
                else {
                    return 'Cant Find User';
                }
                
            } catch (Exception $e) {
                return Redirect::route('setprofile_step3', array($code));
            }
            
        }
    }

    public function setprofile_step4($code)
	{
        $setup_step_four = User::where('code', '=', $code)->first();

        if($setup_step_four){  
            $username = $setup_step_four->fullname;
            $usermail = $setup_step_four->email;
            $data = array(
                'code'  => $code,
                'name'  => $username,
                'email' => $usermail
            );
            
            return View::make('profile.step4')->with($data);
        }
        else{
            return 'Cant Find';
        }   
	}

    public function postStepFour()
    {
        $code = Input::get('code');
        $firstMember = Input::get('membername1');
        $firstMemberEmail = Input::get('email1');

        $validation = Validator::make(
            [
                'membername1' => Input::get('membername1'),
                'email1' => Input::get('email1')
            ],
            [
                'membername1' => 'required|max:40|min:3',
                'email1' => 'required|max:40|email'
            ],
            [
                'membername1.required' => 'You need to fill atleast one member name',           
                'membername1.max' => 'Name should be within 40 character',
                'membername1.min' => 'Name should be atleast 3 character',
                'email1.required' => 'You need to fill atleast one member email',
                'email1.max' => 'Email should be within 40 character',
                'email1.email' => 'This should be a valid email address'
            ]
        );

        // first teammate input if
        if($validation->fails()){
            return Redirect::route('setprofile_step4', array($code))
                    ->withErrors($validation)
                    ->withInput(Input::except('_token'));
        }
        // // first teammate input else
        else {
            $submit_step_two_four = User::where('code', '=', $code)->first();

            if($submit_step_two_four){

                try {
                    $teamID = $submit_step_two_four->team_id;
                    $usrToken = $submit_step_two_four->token;

                    $newcode = str_random(60);
                    $token = str_random(40);
                    $password = str_random(9);
                    $password_hased = Hash::make($password);

                    $teammate = new User;
                    $teammate->fullname = $firstMember;
                    $teammate->password = $password_hased;
                    $teammate->email = $firstMemberEmail;
                    $teammate->code = $newcode;
                    $teammate->active = 0;
                    $teammate->account_type = 'personal'; 
                    $teammate->team_id = $teamID;
                    $teammate->token = $token;
                    $teammate->save();

                     Mail::send('emails.SingUpTeamate', array('name'=> $firstMember, 'password'=> $password, 'link'=> URL::route('confirm-teammate-sign-up', $newcode)), 
                        function($message) use ($firstMemberEmail) {
                            $message->to($firstMemberEmail, 'New User')->subject('Joining Invitation');
                    });

                    $submit_step_two_four->code = '';
                    $submit_step_two_four->active = 1;
                    $submit_step_two_four->save();

                    return Redirect::route('confirm-teammate-sign-up-msg')->with('token', $usrToken);

                } catch (Exception $e) {
                    echo $e;
                }
            } else {
                return 'Failed';
            }
        }
    }

    public function showTeammateSignUpConfirmMessage()
    {
        return View::make('emails.teamMateConfirmation');
    }

    public function confirmTeammate($code)
    {
        try {
            $teammate = User::where('code', '=', $code)->first();
            $isActive = $teammate->active;
            $teammateToken = $teammate->token;

            if($isActive == 0){
                try {
                    $teammate->code = '';
                    $teammate->active = 1;
                    $teammate->save();

                    return Redirect::route('dashboard', array($teammateToken));
                } catch (Exception $e) {
                    return 'Exception happend';
                }
            }
            else{
                return 'Already activated';
            }
        } catch (Exception $e) {
            return 'Sorry, You are in the wrong page';
        }
    }

    public function dashboard($token)
    {
        $currentUsr = Auth::user();
        $currentToken = $currentUsr->token;

        if($currentToken == $token){
            return View::make('dashboard.main');;
        } else {
            
            return Redirect::to('logout');
        }
    }

    // add new member
    public function addMember()
    {
        $membername = Input::get('member_name');
        $memberemail = Input::get('member_email');
        $teamID = Input::get('team_id');

        $validation = Validator::make(
            [
                'member_name' => Input::get('member_name'),
                'member_email' => Input::get('member_email')
            ],
            [
                'member_name' => 'required|max:40|min:3',
                'member_email' => 'required|max:40|email'
            ]
        );

        // first teammate input if
        if($validation->fails()){
            return 'Error Happend';
        }
        // // teammate input else
        else {
            try {
                    $newcode = str_random(60);
                    $token = str_random(40);
                    $password = str_random(9);
                    $password_hased = Hash::make($password);

                    $teammate = new User;
                    $teammate->fullname = $membername;
                    $teammate->password = $password_hased;
                    $teammate->email = $memberemail;
                    $teammate->code = $newcode;
                    $teammate->active = 0;
                    $teammate->account_type = 'personal'; 
                    $teammate->team_id = $teamID;
                    $teammate->image_path = 'avater.png';
                    $teammate->token = $token;
                    $teammate->save();

                     Mail::send('emails.SingUpTeamate', array('name'=> $membername, 'password'=> $password, 'link'=> URL::route('confirm-teammate-sign-up', $newcode)), 
                        function($message) use ($memberemail) {
                            $message->to($memberemail, 'New User')->subject('Joining Invitation');
                    });

                return Redirect::route('home');

                } catch (Exception $e) {
                    echo $e;
                }
        }
    }

    public function editMember()
    {
        $newmembername = Input::get('new_member_name');
        $newmemberemail = Input::get('new_member_email');

        if (empty($newmembername) && empty($newmemberemail)) {
            echo "nothing to update";
        } else{
            $teamID = Input::get('team_id');
            $userID = Input::get('user_id');

            try {
                $user = User::find($userID);
                if(!empty($newmembername)){
                    $validation = Validator::make(
                        [
                            'member_name' => Input::get('new_member_name')
                        ],
                        [
                            'member_name' => 'required|max:40|min:3'
                        ]
                    );

                    // first teammate input if
                    if($validation->fails()){
                        return 'Error in name';
                    } else {
                        $user->fullname = $newmembername;
                    }
                }
                
                if(!empty($newmemberemail)){
                    $validation = Validator::make(
                        [
                            'member_email' => Input::get('new_member_email')
                        ],
                        [
                            'member_email' => 'required|max:40|email'
                        ]
                    );

                    if($validation->fails()){
                        return 'Error in email';
                    } else {
                        $user->email = $newmemberemail;
                    }
                    
                }
                
                $user->save();

                return Redirect::route('home');

            } catch (Exception $e) {
                echo $e;
            }
        }
    }

    public function sendMessage(){

        $recipient = Input::get('recipient');
        $subject = Input::get('subject');
        $message = Input::get('message');
        $submit_type = Input::get('submit_type');
        $now = new DateTime();

        $validation = Validator::make(
            [
                'recipient' => Input::get('recipient'),
                'subject' => Input::get('subject'),
                'message' => Input::get('message')
            ],
            [
                'recipient' => 'required',
                'subject' => 'required|max:40|min:4',
                'message' => 'required|max:120|min:10'
            ]
        );

        if($validation->fails()){
            return 'Error Happend';
        }
        else {
            try {
                 if ($submit_type == "Send") {
                     $inbox = new Inbox;
                     $inbox->sender_id = Auth::id();;
                     $inbox->receiver_id = $recipient;
                     $inbox->unread = 1;
                     $inbox->subject = $subject;
                     $inbox->message = $message;
                     $inbox->time = $now;
                     $inbox->save();

                     return Redirect::route('home');

                 } elseif($submit_type == "Draft"){
                     $draft = new Draft;
                     $draft->creator_id = Auth::id();;
                     $draft->send_to_id = $recipient;
                     $draft->subject = $subject;
                     $draft->message = $message;
                     $draft->time = $now;
                     $draft->save();

                     return Redirect::route('home');
                 }

                } catch (Exception $e) {
                    echo $e;
                }
        }
    }

    public function fileUpload(){

       if(Input::hasFile('file')){

        $file = Input::file('file');
        $title = Input::get('file-title');
        $summary = Input::get('file-summary');

        $validation = Validator::make(
            [
                'title' => Input::get('file-title'),
                'summary' => Input::get('file-summary'),
                'file' => Input::file('file')
            ],
            [
                'title' => 'required|min:4|max:20',
                'summary' => 'max:40|min:4',
                'file' => 'required'
            ]
        );

        if($validation->fails()){
            return 'Validation Error Happend';
        }
        else {
            try {
                $usr = Auth::user();
                $usr_id = $usr->id;
                $team_id = $usr->team_id;

                $filesize = $file->getSize();
                $filename = time().'-'.$file->getClientOriginalName();
                $file_extension = $file->getClientOriginalExtension();
                $upload_time = new DateTime();

                $insertFileInfo = DB::table('files')->insert(array(
                    'title' => $title, 
                    'summary' => $summary, 
                    'file_name' => $filename, 
                    'file_size' => $filesize,
                    'extension' => $file_extension,
                    'uploader_id' => $usr_id, 
                    'team_id' => $team_id,
                    'time' => $upload_time
                ));
                
                if($insertFileInfo){
                    $file->move(public_path().'/images/files', $filename);

                    return Redirect::route('home');
                } else {
                    echo 'Can not upload file. Please try again.';
                }

            } catch (Exception $e) {
                    echo $e;
            }
        }
    } else {
        return 'Choose a file to upload';
    }
    }

    public function createMilestone(){
        $project_id = Input::get('project_select_in_milestone');
        $subject = Input::get('subject_in_milestone');
        $summary = Input::get('summary_in_milestone');

        $validation = Validator::make(
            [
                'project_id' => Input::get('project_select_in_milestone'),
                'subject' => Input::get('subject_in_milestone'),
                'summary' => Input::get('summary_in_milestone'),
                'milestone_date' => Input::get('milestone_date')
            ],
            [
                'project_id' => 'required',
                'subject' => 'required|max:20|min:4',
                'summary' => 'max:40|min:10',
                'milestone_date' => 'required'
            ]
        );

        if($validation->fails()){
            return 'Error Happend';
        }

        else {
            $create_time = new DateTime();

            $milestone_date = Input::get('milestone_date');
            $milestone_date_updated = date("Y-m-d", strtotime($milestone_date));

            try {
                    $milestone = new Milestone;
                    $milestone->project_id = $project_id;
                    $milestone->subject = $subject;
                    $milestone->summary = $summary;
                    $milestone->date = $milestone_date_updated;
                    $milestone->created_at = $create_time;
                    $milestone->save();

                return Redirect::route('home');

                } catch (Exception $e) {
                    echo $e;
                }
        }
    }

   
}
