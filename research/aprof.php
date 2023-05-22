<!DOCTYPE html>
<html>
<head>
	<title>ADMIN - Research Scholar Details Management</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="animate.css">
	<link rel="stylesheet" href="mycss.css">
	<script src="myjs.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body onload="openNav()">
	<div id="s">Login Successful</div>
	<div id="psw">Password Changed</div>
	<div id="upbox">Update Added</div>
	<div id="updel">Update Deleted</div>
	<div id="kickout">Account Removed</div>
	<div id="kickoutu">Account Not Found</div>
	<div id="reset">Website Reset Successful<br />Database cleared!</div>
	<div class="headerf">
		<div id="mySidenav" class="sidenav" style="height:706px;padding-top:10px;">
			<?php
				include "main.php";
				session_start();
				$_SESSION['retpg'] = "aprof.php"; 
				$stat=$_SESSION["status"];
				if($stat)
				{
					$usn = $_SESSION["usno"];
					$name = $_SESSION["name"];
					$_SESSION["page"] = "home.php";
					echo "<a style='font-size:23px;margin-bottom:15px;padding-left:60px;cursor:pointer;color:white;'>Menu</a>";
					echo "<a data-toggle='modal' data-target='#chp' style='font-size:16px;cursor:pointer;'>Change Password</a>";
				}
			?>
			<a data-toggle="modal" data-target="#abt" style="font-size:16px;cursor:pointer;">About</a>
			<a data-toggle="modal" data-target="#cont" style="font-size:16px;cursor:pointer;">Contact</a>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12" style="background-color:#2D3E45;height:140px;">
			<div class="col-md-4 col-sm-4 col-xs-4">
				<a href="http://bmsce.ac.in/department/computer-science-and-engineering">
					<img src="logo.png" class="img-responsive im animated pulse" alt="BMS COLLEGE OF ENGENEERING"/>
				</a>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-4">
				<h4 align="center" id="hd" style="color:white;padding-top:70px;">Research Scholar Details Management</h4>
			</div>
		</div>
		<ul class="tab col-md-12 col-sm-12 col-xs-12" style="width:100%;">
			<li><a style="cursor:pointer" class="tablinks">&#9776;</a></li>
			<li><a href = "home.php" class="tablinks active">Home</a></li>
			<li><a href = "res_people.php" class="tablinks">People</a></li>
			<li><a href = "area.php" class="tablinks">Areas</a></li>
			<li><a href = "forum.php" class="tablinks">Forum</a></li>
			<li><a href = "report.php" class="tablinks">Report</a></li>
			<?php
				if($stat)
				{
					echo "<li style='float:right;'><a href = 'logout.php' class='tablinks'>Logout</a></li>";
					echo "<li style='float:right;'><a href = 'aprof.php' class='tablinks' style='cursor:pointer;'>". ($usn) ."</a></li>";
				}
				echo "<a style='display: none;'>";
				if($_GET['not'] == "ls")
				{
					?>
					<script>
						allalert("s");
					</script>
					<?php
				}
				if($_GET['not'] == "pswch")
				{
					?>
					<script>
						allalert("psw");
					</script>
					<?php
				}
				if($_GET['not'] == "updtsup")
				{
					?>
					<script>
						allalert("upbox");
					</script>
					<?php
				}
				
				if($_GET['not'] == "del")
				{
					?>
					<script>
						allalert("kickout");
					</script>
					<?php
				}
				if($_GET['not'] == "usdel")
				{
					?>
					<script>
						allalert("kickoutu");
					</script>
					<?php
				}				
				if($_GET['not'] == "resets")
				{
					?>
					<script>
						allalert("reset");
					</script>
					<?php
				}			
				if($_GET['not'] == "updtdel")
				{
					?>
					<script>
						allalert("updel");
					</script>
					<?php
				}
				echo "</a>";
			?>
		</ul>
	</div>
	<div id="main">
		<div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:16px;">
			<h2 class="page-head-line" style="color:black;">Administrator</h2>
				<div class="row">	
					<div class="col-md-12 col-sm-12 col-xs-12" >
						<div class="panel"  style="margin-top:10px;">
							<div class="panel-heading" style="background-color:#5E5C5C;color:white;">ADD NEWS / NOTICE</div>
							<div class="panel-body" style="height:160px;">
								<form class="form-horizontal" action="updates.php" method="POST">
									<div class="form-group">
										<label class="control-label col-md-2 col-sm-2" for="upt">Enter news / notice:</label>
										<div class="col-md-10 col-sm-10">
											<textarea type="text" class="form-control" name="upt" placeholder="Enter here" required></textarea>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-offset-3 col-sm-offset-3 col-xs-offset-3 col-md-3 col-sm-3 col-xs-3">
											<button type="submit" class="form-control">Submit</button>
										</div>
										<div class="col-md-3 col-sm-3 col-xs-3">
											<button type="reset" class="form-control" data-dismiss="modal">Reset</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="row">	
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="panel" style="font-size:16pt;margin-top:10px;">
							<div class="panel-heading" style="background-color:#5E5C5C;color:white;">News / Notice</div>
							<div class="panel-body">
								<?php
									$query = "SELECT sn, updt FROM `updts`";
									$res = mysqli_query($dbhandle,$query);
								?>
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover" style="font-size:15px;">
										<thead>
											<tr>
												<th>Sl.No.</th>
												<th>Update</th>
												<th>Delete</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$n=1;
												while($rl = mysqli_fetch_assoc($res))
												{
													echo "<tr>";
													echo "<td>".($n++)."</td>";
													echo "<td><div style='text-align:justify;'><span style='font-size:12pt;font-family: Arial;'>".$rl['updt']."</span></div></td>";
													?>
													<form action="delupd.php?sn=<?php echo $rl['sn']; ?>" method="POST">
													<td><button type="submit" class="btnsu"><span class="glyphicon glyphicon-trash"></span></button></td>
													</form><?php
													echo "</tr>";
												}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12" >
						<div class="panel"  style="margin-top:10px;">
							<div class="panel-heading" style="background-color:#5E5C5C;color:white;">WEBSITE MANAGEMENT</div>
							<div class="panel-body">
								<div class="form-group">
									<div class="danger">
										Reset WEBSITE :<p style="text-align:center;"><button data-toggle="modal" data-target="#retall"  style="font-size:20pt;" class="btnsu">RESET</button></p>
									</div>
									<div class="warning">
										<span style="font-size:16pt;">!Warning</span><br />Resetting website causes trucation of all tables in database<br />Admin USN and password will be reset to defaults
									</div>
								</div>
								<div class="form-group">
									<form class="form-horizontal" action="kickout.php" method="POST">
										<div class="danger">
											Remove user :<br />
											<label class="control-label col-md-3 col-xs-3" for="usn">USN/ Emp ID:</label>
											<div class="col-sm-8 col-xs-8">
												<input type="text" class="form-control" name="usn" placeholder="Enter USN / Emp ID"  maxlength="10">
											</div>
											<br />
											<button type="submit" style="width:20%;margin:15px;" class="btnsu">REMOVE USER</button>
										</div>
										<div class="warning">
											<span style="font-size:16pt;">!Warning</span><br />Removing user will delete all his/her records.<br />Including forum details
										</div>
									</form>	
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>
	</div>
	<div class="modal fade" id="chp" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title">Change Password</h3>
				</div>
				<form class="form-horizontal" action="chpass.php" method="POST" onsubmit="checkpswlst(2)">
					<div class="modal-body">
						<div class="form-group">
							<label class="control-label col-md-3 col-xs-3" for="opsw">Old Password:</label>
							<div class="col-sm-7 col-xs-7">
								<input type="password" class="form-control" name="opsw" id="oldpsw" placeholder="Enter Password" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-xs-3" for="npsw">New Password:</label>
							<div class="col-sm-7 col-xs-7">
								<input type="password" class="form-control" name="npsw" id="fr" onkeyup="checkpswold()" placeholder="Enter Password" required>
							</div>
							<div class="col-sm-1 col-xs-1">
								<span style="visibility:hidden;font-size:17pt;padding-top:5px;" id="err" class="glyphicon glyphicon-alert"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-xs-3" for="psw" >Retype New Password:</label>
							<div class="col-sm-7 col-xs-7">
								<input type="password" class="form-control" name="psw" id="sec" onkeyup="checkpsw()" placeholder="Retype Password" required>
							</div>
							<div class="col-sm-1 col-xs-1">
								<span style="visibility:visible;font-size:17pt;padding-top:5px;" id="wr" class="glyphicon glyphicon-alert"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-11 col-xs-11">
								<a href="">Forgot Old Password?</a>
							</label>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" name="btn" class="btn btn-default">Submit</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="modal" id="retall" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content" style="padding:20px;margin-top:300px;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title"style="color:red;">DO YOU WANT TO RESET WEBSITE</h3>
				</div>
				<form class="form-horizontal" action="reset.php" method="POST">
					<div class="modal-footer">
						<button type="submit" name="btn" class="btn btn-default">Continue</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="modal" id="cont" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content" style="padding:20px;margin-top:300px;">
				<h5 class="page-head-line">Contact:</h5>
				<span style="font-size:13pt;font-family: Arial;">
					Dr. PersonName <br />Prof. & Head, Department of CS&E <br />email id: email.id@email@id.com
				</span>
			</div>
		</div>
	</div>
	<div class="modal" id="abt" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content" style="padding:20px;margin-top:300px;">
				<h5 class="page-head-line">About:</h5>
				<span style="font-size:12pt;font-family: Arial;">
					<h4>Project title:</h4>
						<p>Research Scholar Details Management</p>
					<h4>Guided by:</h4>
						<p>Assistant Professor</p>
					<hr />
						<p align="center">Project By: Shreyas Deshpande</p>
				</span>
			</div>
		</div>
	</div>
</body>
</html>