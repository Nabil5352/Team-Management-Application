// Front page
/*
toggle disable email input
*/
$('#gmailmail').click(function(){
  $('#nongmailmail').prop('disabled', true);
  $('#otherEmail').transition('slide up');
  $('#signdivider').transition('fade');
});

$('#nongmailmail').click(function(){
  $('#gmailmail').prop('disabled', true);
  $('#gmailmail').transition('slide down');
  $('#gmailmailicon').transition('slide down');
  $('#signdivider').transition('fade');
});

// dashboard menu
$(document).ready(function(){

    $('#overviewPage').show();
    $('#projectPage').hide();
    $('#tasksPage').hide();
    $('#milestonesPage').hide();
    $('#filesPage').hide();
    $('#timePage').hide();
    $('#notebooksPage').hide();
    $('#linksPage').hide();
    $('#peoplePage').hide();

  $('#workspacemenu #overview').click(function () {
    $('#overviewPage').show();
    $('#projectPage').hide();
    $('#tasksPage').hide();
    $('#milestonesPage').hide();
    $('#filesPage').hide();
    $('#timePage').hide();
    $('#notebooksPage').hide();
    $('#linksPage').hide();
    $('#peoplePage').hide();

  });

  $('#workspacemenu #project').click(function () {
    $('#overviewPage').hide();
    $('#projectPage').show();
    $('#tasksPage').hide();
    $('#milestonesPage').hide();
    $('#filesPage').hide();
    $('#timePage').hide();
    $('#notebooksPage').hide();
    $('#linksPage').hide();
    $('#peoplePage').hide();
  });

  $('#workspacemenu #tasks').click(function () {
    $('#overviewPage').hide();
    $('#projectPage').hide();
    $('#tasksPage').show();
    $('#milestonesPage').hide();
    $('#filesPage').hide();
    $('#timePage').hide();
    $('#notebooksPage').hide();
    $('#linksPage').hide();
    $('#peoplePage').hide();
  });

  $('#workspacemenu #milestones').click(function () {
    $('#overviewPage').hide();
    $('#projectPage').hide();
    $('#tasksPage').hide();
    $('#milestonesPage').show();
    $('#filesPage').hide();
    $('#timePage').hide();
    $('#notebooksPage').hide();
    $('#linksPage').hide();
    $('#peoplePage').hide();
  });

  $('#workspacemenu #files').click(function () {
    $('#overviewPage').hide();
    $('#projectPage').hide();
    $('#tasksPage').hide();
    $('#milestonesPage').hide();
    $('#filesPage').show();
    $('#timePage').hide();
    $('#notebooksPage').hide();
    $('#linksPage').hide();
    $('#peoplePage').hide();
  });

  $('#workspacemenu #time').click(function () {
    $('#overviewPage').hide();
    $('#projectPage').hide();
    $('#tasksPage').hide();
    $('#milestonesPage').hide();
    $('#filesPage').hide();
    $('#timePage').show();
    $('#notebooksPage').hide();
    $('#linksPage').hide();
    $('#peoplePage').hide();
  });

  $('#workspacemenu #notebooks').click(function () {
    $('#overviewPage').hide();
    $('#projectPage').hide();
    $('#tasksPage').hide();
    $('#milestonesPage').hide();
    $('#filesPage').hide();
    $('#timePage').hide();
    $('#notebooksPage').show();
    $('#linksPage').hide();
    $('#peoplePage').hide();
  });

  $('#workspacemenu #links').click(function () {
    $('#overviewPage').hide();
    $('#projectPage').hide();
    $('#tasksPage').hide();
    $('#milestonesPage').hide();
    $('#filesPage').hide();
    $('#timePage').hide();
    $('#notebooksPage').hide();
    $('#linksPage').show();
    $('#peoplePage').hide();
  });

  $('#workspacemenu #people').click(function () {
    $('#overviewPage').hide();
    $('#projectPage').hide();
    $('#tasksPage').hide();
    $('#milestonesPage').hide();
    $('#filesPage').hide();
    $('#timePage').hide();
    $('#notebooksPage').hide();
    $('#linksPage').hide();
    $('#peoplePage').show();
  });
});

// myproject menu
$(document).ready(function(){
    $('#listpage').show();
    $('#calenderpage').hide();
    $('#viewpage').hide();


  $('.menu #projectlist').click(function () {
    $('#listpage').show();
    $('#calenderpage').hide();
    $('#viewpage').hide();
  });

  $('.menu #projectcalender').click(function () {
    $('#listpage').hide();
    $('#calenderpage').show();
    $('#viewpage').hide();
  });

  $('.menu #projectview').click(function () {
    $('#listpage').hide();
    $('#calenderpage').hide();
    $('#viewpage').show();
  });
});

// workspace window

// Messagebox start

/*
* message box display behavior
*/

$(document).ready(function(){

    $('#composenewdisplay').hide();
    $('#allmsgdisplay').show();
    $('#inboxmsgdisplay').hide();
    $('#draftsmsgdisplay').hide();
    $('#outboxmsgdisplay').hide();


  $('#messageboxmenu #allmsg').click(function () {
    $('#composenewdisplay').hide();
    $('#allmsgdisplay').show();
    $('#inboxmsgdisplay').hide();
    $('#draftsmsgdisplay').hide();
    $('#outboxmsgdisplay').hide();
  });

  $('#messageboxmenu #inboxmsg').click(function () {
    $('#composenewdisplay').hide();
    $('#allmsgdisplay').hide();
    $('#inboxmsgdisplay').show();
    $('#draftsmsgdisplay').hide();
    $('#outboxmsgdisplay').hide();
  });

  $('#messageboxmenu #draftsmsg').click(function () {
    $('#composenewdisplay').hide();
    $('#allmsgdisplay').hide();
    $('#inboxmsgdisplay').hide();
    $('#draftsmsgdisplay').show();
    $('#outboxmsgdisplay').hide();
  });

  $('#messageboxmenu #outboxmsg').click(function () {
    $('#composenewdisplay').hide();
    $('#allmsgdisplay').hide();
    $('#inboxmsgdisplay').hide();
    $('#draftsmsgdisplay').hide();
    $('#outboxmsgdisplay').show();
  });

  $('#newmessage').click(function () {
    $('#composenewdisplay').transition('slide up').show();
    $('#allmsgdisplay').hide();
    $('#inboxmsgdisplay').hide();
    $('#draftsmsgdisplay').hide();
    $('#outboxmsgdisplay').hide();
  });

});

/*
* menu click
*/
$('#messageboxmenu a').on('click', function(){
  var menuIndex = $(this).attr('data-index');
  
  $('#messageboxmenu a').removeClass('active');

  $('#messageboxmenu a:eq('+ menuIndex +')').addClass('active');
});
// Messagebox end

$('#mainusermenu a').on('click', function(){
  var menuIndex = $(this).attr('data-index');

  var menuDefault = $('#mainusermenu a');
  var menuDefaultlbl = $('#mainusermenu a div');

  var menuOnClick = $('#mainusermenu a:eq('+ menuIndex +')');
  var menuOnClicklbl = $('#mainusermenu a div:eq('+ menuIndex +')');

  menuDefault.removeClass('active purple');
  menuDefaultlbl.removeClass('blue');

  menuOnClick.addClass('active purple');
  menuOnClicklbl.addClass('blue');
});

$('#addprojectbtns .dropdown')
  .dropdown({
    action: 'nothing'
});

$('.dropdown')
  .dropdown({
    on: 'click'
});

$('.popmsg').popup();
$('.popmailmsg').popup('show');

$('#workspacemenu a').on('click', function(){
  var menuIndex = $(this).attr('data-index');
  
  $('#workspacemenu a').removeClass('active purple');

  $('#workspacemenu a:eq('+ menuIndex +')').addClass('active purple');
});

$('.tabular.menu .item').tab();

// myproject.php
$('#myprojectmenu .pdb').on('click', function(){
  var menuIndex = $(this).attr('data-index');

  var menuDefault = $('#myprojectmenu .pdb');
  var menuOnClick = $('#myprojectmenu .pdb:eq('+ menuIndex +')');

  menuDefault.removeClass('active');

  menuOnClick.addClass('active');
});

// task.php
/*
toggle assignee menu
*/
$('#assigntootherchkbox').click(function(){
  $('#assigneemyself').prop('disabled', true);
  $('#assignmechkbox').transition('slide up').addClass('hidden');
  $('#signdivider').transition('fade').addClass('hidden');
});

$('#assignmechkbox').click(function(){
  $('#selectassignee').prop('disabled', true);
  $('#assigntootherchkbox').transition('slide down').addClass('hidden');
  $('#signdivider').transition('fade').addClass('hidden');
});