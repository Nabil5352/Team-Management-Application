{{-- Authenticated User --}}
<?php
$usr = Auth::user();
$userID = $usr->id;
$teamID = $usr->team_id;
$usrToken = $usr->token;

  // info
  $team_info = App::make('FunctionController')->fetchTeammatesForSelectmenu($teamID);
  $follower_info = App::make('FunctionController')->fetchTeammates($teamID);
  $project_info = App::make('FunctionController')->fetchProjects($teamID);

  $projectName = App::make('FunctionController')->fetchProjectName($teamID);
  $projectID = App::make('FunctionController')->fetchProjectID($projectName);

  // messages
  $inbox_msg = App::make('FunctionController')->fetchInbox($userID);
  $draft_msg = App::make('FunctionController')->fetchDraft($userID);
  $sent_msg = App::make('FunctionController')->fetchOutbox($userID);
?>

<!-- ========== workspace.php ========== -->
<!-- MessageBox -->

<div id="messagebox" class="ui fullscreen modal">
  <i class="close icon"></i>
  <div class="header">
    <i class="mail icon"></i>
    Mail Box
  </div>
  <div class="content">
    <div class="ui stacked segment">
      <div class="ui grid">
        <div class="three wide column">
          <div id="messagemenucontainer" class="ui horizontal segment">
            <p>
              <div id="newmessage" class="ui purple fluid button">
                <i class="icon edit"></i>
                Compose message
              </div>

              <div id="messageboxmenu" class="ui vertical pointing menu">
                <a id="allmsg" class="active orange item" data-index="0">
                  <i class="mail square icon"></i> All
                </a>

                <a id="inboxmsg" class="green item" data-index="1">
                  <i class="cloud download icon"></i> Inbox
                </a>
                <a id="draftsmsg" class="purple item" data-index="2">
                  <i class="write square icon"></i> Drafts
                </a>
                <a id="outboxmsg" class="blue item" data-index="3">
                  <i class="send icon"></i> Outbox
                </a>
              </div>
            </p>
          </div>
        </div>
        <div class="thirteen wide column">
          <div class="ui horizontal segment">

              <div id="composenewdisplay" class="ui vertical purple fluid segment">
                <div class="ui segment">

                  {{Form::open(array('route' => 'send_message', 'class'=> 'ui form'))}}
                    <h4 class="ui dividing header">Compose a new message</h4>
                    <div class="two fields">
                      <div class="required field">
                        <label>To</label>
                        <div class="ui selection dropdown">
                          <input name="recipient" type="hidden">
                          <div class="default text">Recipient</div>
                          <i class="dropdown icon"></i>
                          <div class="menu">
                            @foreach($team_info as $key => $value)
                            <div class="item" data-value="{{$value['id']}}">{{$value['fullname']}}</div>
                            @endforeach
                          </div>
                        </div>
                      </div>

                      <div class="field">
                      </div>
                    </div>

                    <div class="two fields">
                      <div class="required field">
                        <label>Subject</label>
                        <div class="ui icon input">
                          <input name="subject" placeholder="Subject" type="text">
                          <i class="user icon"></i>
                        </div>
                      </div>

                      <div class="field">
                      </div>
                    </div>

                    <div class="required field">
                      <label>Message</label>
                      <textarea name="message"></textarea>
                    </div>

                    <input name="submit_type" type="submit" class="ui green button" value="Send" />
                    <input name="submit_type" type="submit" class="ui purple button" value="Draft" />
                  {{Form::close()}}

                </div>  

              </div>

              <div id="allmsgdisplay" class="ui vertical orange fluid segment">
                <div class="ui segment">

                  <div class="ui vertical segment">
                    <h2 class="ui header">
                      <i class="mail square orange icon"></i>
                      <div class="content">
                        All
                      </div>
                    </h2>
                  </div>

                  <div class="ui vertical segment">
                    <div class="ui feed">

                      @foreach($inbox_msg as $key => $value)
                        <div class="event">
                          <div class="label">
                            <img src="../images/{{App::make('FunctionController')->fetchImage($value['id'])}}">
                          </div>
                          <div class="content">
                            <div class="summary">
                              <a>{{App::make('FunctionController')->fetchSenderName($value['id'])}}</a> sent you a message
                              <div class="date">
                                {{App::make('FunctionController')->fetchMsgTime($value['id'])}}
                              </div>
                            </div>
                            <div class="extra text">
                              {{App::make('FunctionController')->fetchsubject($value['id'])}}
                            </div>
                            <div class="meta">
                              <a class="like">
                                <i class="empty star icon"></i> Mark as important
                              </a>
                            </div>
                          </div>
                        </div>
                      @endforeach

                      @foreach($sent_msg as $key => $value)
                        <div class="event">
                          <div class="label">
                            <i class="pencil icon"></i>
                          </div>
                          <div class="content">
                            <div class="summary">
                              You sent a message to {{App::make('FunctionController')->fetchReceiverName($value['id'])}}
                              <div class="date">
                                {{App::make('FunctionController')->fetchMsgTime($value['id'])}}
                              </div>
                            </div>
                            <div class="extra text">
                              {{App::make('FunctionController')->fetchsubject($value['id'])}}
                            </div>
                            <div class="meta">
                              <a class="like">
                                <i class="empty star icon"></i> Mark as important
                              </a>
                            </div>
                          </div>
                        </div>
                      @endforeach

                      @foreach($draft_msg as $key => $value)
                        <div class="event">
                          <div class="label">
                            <i class="save icon"></i>
                          </div>
                          <div class="content">
                            <div class="summary">
                              You created a draft
                              <div class="date">
                                {{App::make('FunctionController')->fetchDraftTime($value['id'])}}
                              </div>
                            </div>
                            <div class="extra text">
                              {{App::make('FunctionController')->fetchDraftsubject($value['id'])}}
                            </div>
                            <div class="meta">
                              <a class="like">
                                <i class="empty star icon"></i> Mark as important
                              </a>
                            </div>
                          </div>
                        </div>
                      @endforeach

                    </div>
                  </div>

                </div>
              </div>

              <div id="inboxmsgdisplay" class="ui vertical green fluid segment">
                <div class="ui segment">

                  <div class="ui vertical segment">
                    <h2 class="ui header">
                      <i class="cloud download green icon"></i>
                      <div class="content">
                        Inbox
                      </div>
                    </h2>
                  </div>

                  <div class="ui vertical segment">
                    <div class="ui feed">
                      @foreach($inbox_msg as $key => $value)
                        <div class="event">
                          <div class="label">
                            <img src="../images/{{App::make('FunctionController')->fetchImage($value['id'])}}">
                          </div>
                          <div class="content">
                            <div class="summary">
                              <a>{{App::make('FunctionController')->fetchSenderName($value['id'])}}</a> sent you a message
                              <div class="date">
                                {{App::make('FunctionController')->fetchMsgTime($value['id'])}}
                              </div>
                            </div>
                            <div class="extra text">
                              <b>{{App::make('FunctionController')->fetchsubject($value['id'])}}</b>
                            </div>
                            <div class="extra text">
                              {{App::make('FunctionController')->fetchtext($value['id'])}}
                            </div>
                            <div class="meta">
                              <a class="like">
                                <i class="empty star icon"></i> Mark as important
                              </a>
                            </div>
                          </div>
                        </div>
                      @endforeach
                    </div>
                  </div>
                </div>  

              </div>

              <div id="draftsmsgdisplay" class="ui vertical purple segment">
                <div class="ui segment">

                  <div class="ui vertical segment">
                    <h2 class="ui header">
                      <i class="write square purple icon"></i>
                      <div class="content">
                        Drafts
                      </div>
                    </h2>
                  </div>

                  <div class="ui vertical segment">
                    <div class="ui feed">
                      @foreach($draft_msg as $key => $value)
                        <div class="event">
                          <div class="label">
                            <i class="save icon"></i>
                          </div>
                          <div class="content">
                            <div class="summary">
                              You created a draft
                              <div class="date">
                                {{App::make('FunctionController')->fetchDraftTime($value['id'])}}
                              </div>
                            </div>
                            <div class="extra text">
                              {{App::make('FunctionController')->fetchDraftsubject($value['id'])}}
                            </div>
                            <div class="extra text">
                              {{App::make('FunctionController')->fetchDraftText($value['id'])}}
                            </div>
                            <div class="meta">
                              <a class="like">
                                <i class="empty star icon"></i> Mark as important
                              </a>
                            </div>
                          </div>
                        </div>
                      @endforeach
                    </div>
                  </div>
                </div> 
              </div>

              <div id="outboxmsgdisplay" class="ui vertical blue segment">
                <div class="ui segment">

                  <div class="ui vertical segment">
                    <h2 class="ui header">
                      <i class="send blue icon"></i>
                      <div class="content">
                        Outbox
                      </div>
                    </h2>
                  </div>

                  <div class="ui vertical segment">
                    <div class="ui feed">
                      @foreach($sent_msg as $key => $value)
                        <div class="event">
                          <div class="label">
                            <i class="pencil icon"></i>
                          </div>
                          <div class="content">
                            <div class="summary">
                              You sent a message to {{App::make('FunctionController')->fetchReceiverName($value['id'])}}
                              <div class="date">
                                {{App::make('FunctionController')->fetchMsgTime($value['id'])}}
                              </div>
                            </div>
                            <div class="extra text">
                              {{App::make('FunctionController')->fetchsubject($value['id'])}}
                            </div>
                            <div class="extra text">
                              {{App::make('FunctionController')->fetchtext($value['id'])}}
                            </div>
                            <div class="meta">
                              <a class="like">
                                <i class="empty star icon"></i> Mark as important
                              </a>
                            </div>
                          </div>
                        </div>
                      @endforeach
                    </div>
                  </div>
                </div> 
              </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="actions">

  </div>
</div>

<!-- add new item -->
<div id="addnewitem" class="ui modal">
  <i class="close icon"></i>
  <div class="header">
    Add new item
  </div>
  <div class="content">
    <div class="image">
      An image can appear on left or an icon
    </div>
    <div class="description">
      A description can appear on the right
    </div>
  </div>
  <div class="actions">
    <div class="ui button">Cancel</div>
    <div class="ui button">OK</div>
  </div>
</div>

<!-- update organization -->

<div id="updateorg" class="ui modal">
  <i class="close icon"></i>
  <div class="header">
    Update Organization
  </div>
  <div class="content">
    <div class="image">
      An image can appear on left or an icon
    </div>
    <div class="description">
      A description can appear on the right
    </div>
  </div>
  <div class="actions">
    <div class="ui button">Cancel</div>
    <div class="ui button">OK</div>
  </div>
</div>

<!-- organization settings -->

<div id="orgsettings" class="ui modal">
  <i class="close icon"></i>
  <div class="header">
    Organization settings
  </div>
  <div class="content">
    <div class="image">
      An image can appear on left or an icon
    </div>
    <div class="description">
      A description can appear on the right
    </div>
  </div>
  <div class="actions">
    <div class="ui button">Cancel</div>
    <div class="ui button">OK</div>
  </div>
</div>

<!-- show tags list -->

<div id="showtags" class="ui modal">
  <i class="close icon"></i>
  <div class="header">
    Show tags list
  </div>
  <div class="content">
    <div class="image">
      An image can appear on left or an icon
    </div>
    <div class="description">
      A description can appear on the right
    </div>
  </div>
  <div class="actions">
    <div class="ui button">Cancel</div>
    <div class="ui button">OK</div>
  </div>
</div>

<!-- Add new teammember -->

<div id="addteammate" class="ui small modal stackable">
  <i class="close icon"></i>
  <div class="header">
    Add new member
  </div> 
    <div class="content">
      {{Form::open(array('route' => 'addnewmember'))}}
      <div class="ui grid">
        <div class="sixteen wide column">
          <div class="ui fluid input">
            <input name="member_name" placeholder="Team member name" type="text">
          </div>
          <br>
          <div class="ui fluid input">
            <input name="member_email" placeholder="Team member email" type="text">
          </div>
          <br>
        </div>

      </div>
      
      <div class="actions">
      <input name="team_id" type="hidden" value="{{$teamID}}">

      <input type="submit" class="ui red button" value="Add Member" />
      <input type="" class="ui blue button" value="Cancel" />
    </div>
    {{Form::close()}}
    </div>

</div> 

<!-- edit teammember -->

<div id="editteammate" class="ui small modal stackable">
  <i class="close icon"></i>
  <div class="header">
    Edit member
  </div> 
    <div class="content">
      {{Form::open(array('route' => 'editmember'))}}
      <div class="ui grid">
        <div class="sixteen wide column">
          <div class="ui fluid input">
            <input name="new_member_name" placeholder="New name" type="text">
          </div>
          <br>
          <div class="ui fluid input">
            <input name="new_member_email" placeholder="New email" type="text">
          </div>
          <br>
        </div>

      </div>
      
      <div class="actions">
      <input name="team_id" type="hidden" value="{{$teamID}}">
      <input name="user_id" type="hidden" value="{{$userID}}">

      <input type="submit" class="ui red button" value="Update Info" />
      <input type="" class="ui blue button" value="Cancel" />
    </div>
    {{Form::close()}}
    </div>

</div> 

<!-- Add new projects -->
<div id="addproject" class="ui small modal stackable">
  <i class="close icon"></i>
  <div class="header">
    Add new project
  </div> 
    <div id="addprojectcontent" class="content">
      {{Form::open(array('route' => 'projects.store'))}}
      <div class="ui grid">
        <div class="twelve wide column">
          <div class="ui fluid labeled teal small input">
            <div class="ui blue label">
              Title
            </div>
            <input name="projectname" placeholder="Project name" type="text">
          </div>
          <br>
          <div class="ui fluid big input">
            <input name="description" placeholder="Add a description (Optional)" type="text">
          </div>
          <br>

          {{-- datepicker --}}
          <div>
            <div class="ui left icon mini fluid input">
              <input name="start_date" type="text" placeholder="Start date" class="datepicker" />
              <i class="calendar icon"></i>
            </div>

            <br>

            <div class="ui left icon mini fluid input">
              <input name="end_date" type="text" placeholder="End date" class="datepicker" />
              <i class="calendar icon"></i>
            </div>
          </div>
        </div>

        {{-- hidden inputs --}}
        <input name="team_id" type="hidden" value="{{$teamID}}">
        <input name="project_id" type="hidden" value="{{$projectID}}">
        <input name="token" type="hidden" value="{{$usrToken}}">
        
        <div id="addprojectbtns" class="four wide column">
          <div class="ui blue mini top left pointing dropdown button">
            <div class="text">Share</div>
            {{-- <div id="sharemenu" class="menu">
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
            </div> --}}
          </div>
          <div id="feedicon" class="ui icon basic mini button">
            <i class="feed icon"></i>
          </div>
          <div id="bookmarkicon" class="ui icon basic mini button">
            <i class="star icon"></i>
          </div>
        </div>

        
        
      </div>
       <div class="actions">
      <input type="submit" class="ui red button" value="Add task" />
      <input type="" class="ui blue button" value="Cancel" />
    </div>
    {{Form::close()}}
    </div>

</div>
<!-- ========== tasks.php ========== -->

<!-- create task -->
<div id="createtask" class="ui small modal">
  <i class="close icon"></i>
  <div class="header">
    New Task
  </div>

  <div class="content">
    <div id="createtaskmodal" class="ui segment">
      <div class="ui vertical segment">
        <table id="createtaskmodaltbl" class="ui very basic table">
          {{Form::open(array('route' => 'tasks.store'))}}
          <tbody>
            <tr>
              <td>Name:</td>
              <td class="left aligned">
                <div class="ui fluid small input focus">
                  <input name="task_title" placeholder="task name" type="text">
                </div>
              </td>
            </tr>

            <tr>
              <td>Description:</td>
              <td class="left aligned">
                <div class="ui fluid large input focus">
                  <input name="task_desc" placeholder="add a description" type="text">
                </div>
              </td>
            </tr>

            <tr>
              <td>Duration:</td>
              <td class="left aligned">
                {{-- datepicker --}}
                <div>
                  <div class="ui left icon mini fluid input">
                    <input name="start_date" type="text" placeholder="Start date" class="datepicker" />
                    <i class="calendar icon"></i>
                  </div>

                  <br>

                  <div class="ui left icon mini fluid input">
                    <input name="end_date" type="text" placeholder="End date" class="datepicker" />
                    <i class="calendar icon"></i>
                  </div>
                </div>
              </td>
            </tr>

            <tr>
              <td>Assignee:</td>
              <td id="addtoteammaterow" class="left aligned">
                  <div id="assigneeouterbox">
                    <div id="assigntootherchkbox">
                      {{-- <select name="memberselect" class="ui search fluid dropdown">
                        <option value="">Select Member</option>
                        <option value="AL">Alabama</option>
                        <option value="KL">Klabama</option>
                      </select> --}}
                        <select class='selectassignee' name="selectme">
                          <option id="assigneeselect" style="display:none" value="">Select a member</option>
                          @foreach ($team_info as $key => $value)
                            <option value="{{$value['id']}}">{{$value['fullname']}}</option>
                          @endforeach                          
                        </select> 
                    </div>
                    <div id="signdivider" class="ui horizontal divider">
                      Or
                    </div>
                      
                    <div id="assignmechkbox" class="ui toggle fluid checkbox">
                      <input id="assigneemyself" name="assigntome" type="checkbox" value="{{Auth::id()}}">                     
                      <label><i class="icon user"></i>Assign to me</label>
                    </div>
                  </div>
      </div>               
            </td>
            </tr>
            <tr> 
              <td>Projects:</td>
              <td class="left aligned">
                  {{ $projectName }}
              </td>
            </tr>
          </tbody>
          
        </table>     
        <p>
          <div class="ui label">
            <a href="#"><i class="tags icon"></i> Tags </a>
          </div>
          <div class="ui label">
            <a href="#"><i class="calendar icon"></i> Due date </a>
          </div>
          <div class="ui label">
            <a href="#"><i class="attach icon"></i> Attach a file </a>
          </div>
        </p> 
    </div>

      <div class="ui vertical segment">
        <p>
          Followers: &nbsp;&nbsp;&nbsp;&nbsp;
          @foreach ($follower_info as $key => $value)
            <span class="purple"><b>{{$value['fullname']}} &nbsp;&nbsp; </b></span>
          @endforeach
        </p>
      </div>
    </div>
  </div>
  {{-- hidden inputs --}}
  <input name="team_id" type="hidden" value="{{$teamID}}">
  <input name="project_id" type="hidden" value="{{$projectID}}">
  <input name="token" type="hidden" value="{{$usrToken}}">

  <div class="actions">
    <input type="submit" class="ui purple button" value="Add task" />
    <input type="" class="ui red button" value="Cancel" />
  </div>
  {{Form::close()}}
</div>

<!-- upload new file -->
<div id="file_upload" class="ui modal">
  <i class="close icon"></i>
  <div class="header">
    <i class="cloud icon"></i>
    Upload files
  </div>
  <div class="content">
    {{ Form::open(array('route'=>'upload-file', 'class'=>'ui form', 'files' => 'true')) }}
      <h4 class="ui dividing header">Upload a file</h4>
        <div class="field">
          <label>Title</label>
          <div class="two fields">
            <div class="required field">
              <input name="file-title" placeholder="Title" type="text">
            </div>
            <div class="field">
            </div>
          </div>
        </div>

        <div class="field">
          <label>Summary</label>
          <div class="two fields">
            <div class="required field">
              <input name="file-summary" placeholder="Write a short summary" type="text">
            </div>
            <div class="field">
            </div>
          </div>
        </div>

      <div class="field">
        <label>File</label>
        <input name="file" type="file" class="ui purple button">
      </div>

      <button type="submit" class="ui blue button">Upload</button>
    {{ Form::close() }}
  </div>
  <div class="actions">
  </div>
</div>

<!-- create new milestone -->
<div id="createmilestone" class="ui modal">
  <i class="close icon"></i>
  <div class="header">
    <i class="checkered flag red icon"></i>
    Create new milestone
  </div>
  <div class="content">
    {{Form::open(array('route' => 'create_milestone', 'class'=> 'ui form'))}}
        <div class="two fields">
          <div class="required field">
            <label>Select Project:</label>
            <div class="ui selection dropdown">
              <input name="project_select_in_milestone" type="hidden">
              <div class="default text">Select Project</div>
              <i class="dropdown icon"></i>
              <div class="menu">
                @foreach($project_info as $key => $value)
                <div class="item" data-value="{{$value['id']}}">{{$value['project_title']}}</div>
                @endforeach
              </div>
            </div>
          </div>

          <div class="field">
          </div>
        </div>

        <div class="two fields">
          <div class="required field">
            <label>Set a Title</label>
            <div class="ui icon input">
              <input name="subject_in_milestone" placeholder="Subject" type="text">
              <i class="info circle icon"></i>
            </div>
          </div>

          <div class="field">
          </div>
        </div>

        <div class="two fields">
          <div class="field">
            <label>Summary</label>
            <textarea name="summary_in_milestone"></textarea>
          </div>

          <div class="field">
          </div>
        </div>

        <div class="two fields">
          <div class="required field">
            <label>Choose date</label>
            <div class="ui left icon small input">
              <input name="milestone_date" type="text" placeholder="Choose the date" class="datepicker" />
              <i class="calendar icon"></i>
            </div>
          </div>

          <div class="field">
          </div>
        </div>


        <input type="submit" class="ui orange button" value="Create" />
      {{Form::close()}}
  </div>
  <div class="actions">
  </div>
</div>