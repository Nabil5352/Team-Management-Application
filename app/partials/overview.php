<div id="overviewcontainer">
	<!--if projects not exist-->
	<!-- <div id="noproject">
		<div class="column">
			<i class="file text outline green icon"></i>
			<h2>No Projects</h2>
		</div>
		<p id="titletxt">
			OK, you don't have any projects yet so just create one!
			<br>
			Click the button below to get started.
		</p>
		<div class="ui green large button">
		  Create the first project
		</div>
	</div> -->
	<!--end of 'if projects not exist'-->

	<!--if projects exist-->
	<div id="overviewboard" class="ui fluid segment stackable">
	  	<div class="ui vertical segment">
			<div id="overviewmenu" class="ui tabular fluid  menu">
			  <div class="active item" data-tab="tab-activity">Activity</div>
			  <div class="item" data-tab="tab-todaytask">
			  	Todays Task 
			  	<div class="ui purple label">
			  		23
			  	</div>
			  </div>
			  <div class="item" data-tab="tab-upcomingmilestone">
			  	Upcoming Milestones
			  	<div class="ui red label">
			  		12
			  	</div>
			  </div>
			</div>

			<div id="overviewboard" class="ui active tab" data-tab="tab-activity">
				<div id="topsegment" class="ui top attached segment">
				  <img id="topimg" class="ui top aligned tiny circular image" src="../images/workspaceellipse.png">
				  <div id="tpimgtxt"> Starts: <span id="tpstrtline">29 October, 2014</span> </div>					
				</div>

				<div id="middlesegment" class="ui attached segment">
				  	<div id="middleimg" >
				  		<img class="ui middle aligned tiny image" src="../images/workspacebar.png">
				  	</div>
				  	<div id="boardview">
				  		<table class="ui very basic table">
						  <tbody>
						    <tr>
						      <td class="center aligned"><a class="ui black fluid label">Link</a></td>
						      <td class="left aligned"> <a href="#">Link Title</a> </td>
						      <td></td>
						      <td></td>
						      <td class="right aligned">Created/Edited by </td>
						      <td class="left aligned"><img class="ui avatar image" src="../images/avater.png"> <span>Onimesh Ahmed</span></td>
						      <td>12:47</td>
						    </tr>
						    <tr>
						      <td class="center aligned"><a class="ui yellow fluid label">Notebook</a></td>
						      <td class="left aligned"> <a href="#">Title</a> </td>
						      <td></td>
						      <td></td>
						      <td class="right aligned">Created/Edited by </td>
						      <td class="left aligned"><img class="ui avatar image" src="../images/avater.png"> <span>Onimesh Ahmed</span></td>
						      <td>12:47</td>
						    </tr>
						    <tr>
						      <td class="center aligned"><a class="ui green fluid label">Comment</a></td>
						      <td class="left aligned"> <a href="#">comment</a> &nbsp; (File: aaa.txt) </td>
						      <td></td>
						      <td></td>
						      <td class="right aligned">Wriitten by </td>
						      <td class="left aligned"><img class="ui avatar image" src="../images/avater.png"> <span>Onimesh Ahmed</span></td>
						      <td>12:47</td>
						    </tr>
						    <tr>
						      <td class="center aligned"><a class="ui blue fluid label">File</a></td>
						      <td class="left aligned"> <a href="#">filename.txt</a> &nbsp; (V1 - 5bytes) </td>
						      <td></td>
						      <td></td>
						      <td class="right aligned">Uploaded by </td>
						      <td class="left aligned"><img class="ui avatar image" src="../images/avater.png"> <span>Onimesh Ahmed</span></td>
						      <td>12:47</td>
						    </tr>
						    <tr>
						      <td class="center aligned"><a class="ui orange fluid label">Message</a></td>
						      <td class="left aligned"> <a href="#">Testing</a> </td>
						      <td></td>
						      <td></td>
						      <td class="right aligned">Written by </td>
						      <td class="left aligned"><img class="ui avatar image" src="../images/avater.png"> <span>Onimesh Ahmed</span></td>
						      <td>12:47</td>
						    </tr>
						    <tr>
						      <td class="center aligned"><a class="ui purple fluid label">Task</a></td>
						      <td class="left aligned"> <a href="#">First task</a> </td>
						      <td></td>
						      <td></td>
						      <td class="right aligned">Created/Edited by </td>
						      <td class="left aligned"><img class="ui avatar image" src="../images/avater.png"> <span>Onimesh Ahmed</span></td>
						      <td>12:47</td>
						    </tr>
						    <tr>
						      <td class="center aligned"><a class="ui red fluid label">Milestone</a></td>
						      <td class="left aligned"> <a href="#">Milestone1</a> &nbsp; (Due 31 December) </td>
						      <td></td>
						      <td></td>
						      <td class="right aligned">Created/Edited by </td>
						      <td class="left aligned"><img class="ui avatar image" src="../images/avater.png"> <span>Onimesh Ahmed</span></td>
						      <td>12:47</td>
						    </tr>
						    <tr>
						      <td class="center aligned"><a class="ui teal fluid label">Task list</a></td>
						      <td class="left aligned"> <a href="#">Task1</a> </td>
						      <td></td>
						      <td></td>
						      <td class="right aligned">Created/Edited by </td>
						      <td class="left aligned"><img class="ui avatar image" src="../images/avater.png"> <span>Onimesh Ahmed</span></td>
						      <td>12:47</td>
						    </tr>
						  </tbody>
						</table>		  		
				  	</div>
				</div>

				<div id="bottomsegment" class="ui bottom attached segment">
				  <img id="bottomimg" class="ui bottom aligned tiny circular image" src="../images/workspaceellipse.png">
				  <div id="btmimgtxt"> Ends: <span id="btmdeadline">30 December, 2015</span> </div>
				  	<div id="btmbtns">
				  		<div class="ui tiny button">
						  <i class="feed icon"></i>
						  Activity Rss Feed
						</div>
						<div class="ui tiny button">
						  <i class="file excel outline icon"></i>
						  Export all to Excel
						</div>
						<div class="ui red small button">
						  <i class="remove circle outline icon"></i>
						  Delete Activity
						</div>
				  	</div>
				</div>
			</div>

			<div class="ui tab" data-tab="tab-todaytask">
			  <p>
			  	Lorem ipsum dolor sit amet, consectetur adipisicing elit.
			  </p>
			</div>

			<div class="ui tab" data-tab="tab-upcomingmilestone">
			  <p>
			  	Lorem ipsum dolor sit amet, consectetur adipisicing elit.
			  </p>
			</div>

	  	</div>
	</div>
	<!--end of 'if projects exist'-->
</div> 