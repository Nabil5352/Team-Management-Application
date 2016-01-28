// All MODALs
// login window (index.php)
if ($("#loginbutton")[0]){
$('#login')
.modal('attach events', '#loginbutton', 'show');
}

// organization settings (workspace.php)
if ($("#addnewitembtn")[0]){
$('#addnewitem')
.modal('attach events', '#addnewitembtn', 'show');
}

if ($("#updateorgbtn")[0]){
$('#updateorg')
.modal('attach events', '#updateorgbtn', 'show');
}

if ($("#orgsettingsbtn")[0]){
$('#orgsettings')
.modal('attach events', '#orgsettingsbtn', 'show');
}

if ($("#showtagsbtn")[0]){
$('#showtags')
.modal('attach events', '#showtagsbtn', 'show');
}

if ($(".addnewproject")[0]){
$('#addproject')
.modal('attach events', '.addnewproject', 'show');
}

//add member
if ($(".companyaddicon")[0]){
$('#addteammate')
.modal('attach events', '.companyaddicon', 'show');
}

// edit member 
if ($("#editmemberbtn")[0]){
$('#editteammate')
.modal('attach events', '#editmemberbtn', 'show');
}

// addtask (tasks.php)
if ($(".createtaskbtn")[0]){
$('#createtask')
.modal('attach events', '.createtaskbtn', 'show');
}

// edittask (tasks.php)
if ($(".edittaskbtn")[0]){
$('#edittask')
.modal('attach events', '.edittaskbtn', 'show');
}

// create subtask (tasks.php)
if ($(".createsubtaskbtn")[0]){
$('#addsubtask')
.modal('attach events', '.createsubtaskbtn', 'show');
}

if ($("#showmsgbtn")[0]){
  $('#messagebox')
    .modal('setting', 'transition', 'vertical flip')
    .modal('attach events', '#showmsgbtn', 'show');
}

if ($(".uploadfilebtn")[0]){
  $('#file_upload')
    .modal('attach events', '.uploadfilebtn', 'show');
}

if ($(".milestonecreatebtn")[0]){
  $('#createmilestone')
    .modal('attach events', '.milestonecreatebtn', 'show');
}

// End of MODALs

// welcome window
$('#welcomeVideo').video();

// welcome4 window
$('.dimmmerimg').dimmer({
	on: 'hover'
});

//open datepicker
$(function(){
	$( ".datepicker" ).datepicker();
});

$('.ui.checkbox')
  .checkbox();