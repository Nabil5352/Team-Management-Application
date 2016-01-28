<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Message &#124; TeamPrez</title>
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/semantic.css">
</head>
<body>
	<div id="messagecontainer">
		<!--if message not exist-->
		<!-- <div id="nomessage">
			<div class="column">
				<i class="mail teal icon"></i>
				<h2>No Message</h2>
			</div>
			<p id="titletxt">
				There is no message for you.
			</p>
		</div> -->
		<!--end of 'if message not exist'-->

		<!--if message exist-->
		<div id="msgexist" class="ui grid">
			<div id="firstrow" class="row">
		      <div id="headertwelve" class="twelve wide column">
		      	<p><i class="icon feed"></i> Inbox - Activity on Tasks I'm following </p>
		      </div>
		      <div id="headerfour" class="four wide column">
		      	<i class="icon mail outline"></i>
		      </div>
			</div>
			<div id="secondrow" class="row">
		      <div id="secondrowtwelvecol" class="twelve wide column">
		      	<p> Mark All as Read </p>
		      </div>
		      <div id="secondrowfourcol" class="four wide column">
		      	<p>Hide Read Messages</p>
		      </div>
			</div>

			<div id="subjectsegment" class="ui fluid segment">
			  <div class="ui vertical segment vertseg">
			    <div class="ui grid subjectgrid">
				    <div class="four column row subjectgridrow">
				      <div class="right floated column floatrightfourcol">
				      	<p> <a href="#">First 12digit of project name....</a> </p>
				      </div>
				      <div class="left floated column floatleftfourcol">
				      	<p> <i class="icon user blue"></i> <a href="#">Subject/Task name</a> </p>
				      </div>
				    </div>
				</div>
				<div class="ui divided list subjectlist">
				  <div class="item">
				    <img class="ui avatar image" src="../images/avater.png">
				    <div class="content">
				      <p class="header">
				      	<a class="namelink">Daniel Louise</a>
				      	<span class="linktext">assigned to you</span>
				      </p>
				      <div class="description listdesc">Today at 1:02am</div>
				    </div>
				  </div>

				  <div class="item">
				    <img class="ui avatar image" src="../images/avater.png">
				    <div class="content">
				      <p class="header">
				      	<a class="namelink">Daniel Louise</a>
				      	<span class="linktext">Oni, you have the customer database.</span>
				      </p>
				      <div class="description listdesc">Today at 1:04am</div>
				    </div>
				</div>
			  </div>

			  <div class="ui vertical segment highlight vertseg">
			    <div class="ui grid subjectgrid">
				    <div class="four column row subjectgridrow">
				      <div class="right floated column floatrightfourcol">
				      	<p> <a href="#">First 12digit of project name....</a> </p>
				      </div>
				      <div class="left floated column floatleftfourcol">
				      	<p> <i class="icon user blue"></i> <a href="#">Subject/Task name</a> </p>
				      </div>
				    </div>
				</div>
				<div class="ui divided list subjectlist">
				  <div class="item">
				    <img class="ui avatar image" src="../images/avater.png">
				    <div class="content">
				      <p class="header">
				      	<a class="namelink">Daniel Louise</a>
				      	<span class="linktext">assigned to you</span>
				      </p>
				      <div class="description listdesc">Today at 1:02am</div>
				    </div>
				  </div>

				  <div class="item">
				    <img class="ui avatar image" src="../images/avater.png">
				    <div class="content">
				      <p class="header">
				      	<a class="namelink">Daniel Louise</a>
				      	<span class="linktext">assigned to you</span>
				      </p>
				      <div class="description listdesc">Today at 1:02am</div>
				    </div>
				    <br>
				    <div class="bulletlist">
						<p>
						  	<a href="#">Keep Unread</a>
						  &nbsp;&#8226;&nbsp;
						  <a href="#">Unfollow Task</a>
						</p>
					</div>
				  </div>
				</div>
			  </div>
			</div>
		</div>
		<!--end of 'if message exist'-->
	</div>
	<script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="../js/semantic.js"></script>
	<script type="text/javascript" src="../js/main.js"></script>
</body>
</html>