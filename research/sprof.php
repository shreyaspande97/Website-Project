<!DOCTYPE html>
<html>
<head>
	<title>Scholar - Research Scholar Details Management</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="animate.css">
	<link rel="stylesheet" href="mycss.css">
	<script src="myjs.js"></script>
</head>
<body onload="openNav()">
	<div id="s">Login Successful</div>
	<div id="ss">Signup Successful</div>
	<div id="upd">Updated</div>
	<div id="puba">Added</div>
	<div id="pubd">Deleted</div>
	<div id="psw">Password Changed</div>
	<div class="headerf">
		<div id="mySidenav" class="sidenav" style="height:706px;padding-top:10px;">
			<?php
				include "main.php";
				session_start();
				$stat=$_SESSION["status"];
				if($stat)
				{
					$usn = $_SESSION["usno"];
					$name = $_SESSION["name"];
					$_SESSION["page"] = "home.php";
					echo "<a style='font-size:23px;margin-bottom:15px;padding-left:60px;cursor:pointer;color:white;'>Menu</a>";
					echo "<a data-toggle='modal' data-target='#chp' style='font-size:16px;cursor:pointer;'>Change Password</a>";
					echo "<a data-toggle='modal' data-target='#delac' style='font-size:16px;cursor:pointer;'>Delete Account</a>";
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
				if($_GET['not'] == "us")
				{
					?>
					<script>
						allalert("upd");
					</script>
					<?php
				}
				if($_GET['not'] == "ps")
				{
					?>
					<script>
						allalert("puba");
					</script>
					<?php
				}
				if($_GET['not'] == "sss")
				{
					?>
					<script>
						allalert("ss");
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
				if($_GET['not'] == "pubd")
				{
					?>
					<script>
						allalert("pubd");
					</script>
					<?php
				}
				echo "</a>";
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
			<li><a href = "people.php" class="tablinks">People</a></li>
			<li><a href = "area.php" class="tablinks">Areas</a></li>
			<li><a href = "forum.php" class="tablinks">Forum</a></li>
			<?php
				if($stat)
				{
					echo "<li><a href = 'report.php' class='tablinks'>Report</a></li>";
					echo "<li style='float:right;'><a href = 'logout.php' class='tablinks'>Logout</a></li>";
					echo "<li style='float:right;'><a href = 'sprof.php' class='tablinks' style='cursor:pointer;'>". ($name) ."</a></li>";
					echo "<li style='float:right;'><a href = 'sprof.php' class='tablinks' style='cursor:pointer;'>". ($usn) ."</a></li>";
				}
				
			?>
		</ul>
	</div>
	<div id="main">
		<div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:16px;">
			<h2 class="page-head-line" style="color:black;">Scholar</h2>
				<div class="row">	
					<div class="col-md-6 col-sm-12 col-xs-12" >
						<div class="panel"  style="margin-top:10px;">
							<div class="panel-heading" style="background-color:#5E5C5C;color:white;">PERSONAL INFORMATION<a data-toggle="modal" data-target="#editper" style="float:right;font-size:16pt;color:white;cursor:pointer;" class="glyphicon glyphicon-edit"></a></div>
							<div class="panel-body">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<?php
										$usn = $_SESSION["usno"];
										$_SESSION["retpg"] = "sprof.php";
										$query="SELECT * FROM scholar WHERE usn='$usn'";
										$result=mysqli_query($dbhandle,$query);
										$qd="SELECT `yearj` FROM `rch_details` WHERE usn='$usn'";
										$rd=mysqli_query($dbhandle,$qd);
										$r=mysqli_fetch_assoc($result);
										$rod=mysqli_fetch_assoc($rd);
									?>
									<form class="form-horizontal">
										<div class="form-group">
											<label class="control-label col-md-4 col-sm-4" for="name">Name:</label>
											<div class="col-md-8 col-sm-8">
												<input type="text" class="form-control" id="z" name="name" value="<?php echo $r['name']; ?>" disabled>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-4 col-sm-4" for="dept">Department:</label>
											<div class="col-md-8 col-sm-8" disabled>
												<input type="text" class="form-control" name="dept" value="<?php echo $r['dept']; ?>" disabled>
											</div>
										</div>
										<div class="form-group"> 
											<label class="control-label col-md-4 col-sm-4" for="gen">Gender:</label>
											<div class="col-md-8 col-sm-8">
												<input type="text" class="form-control" name="gen" value="<?php echo $r['sex']; ?>" disabled>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-4 col-sm-4" for="dob">DOB:</label>
											<div class="col-md-8 col-sm-8">
												<input type="date" class="form-control" name="dob" value="<?php echo $r['dob']; ?>" disabled>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-4 col-sm-4" for="eid">Email name:</label>
											<div class="col-md-8 col-sm-8">
												<input type="email" class="form-control" name="eid" value="<?php echo $r['eid']; ?>" disabled>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-4 col-sm-4" for="mno">Mobile no.:</label>
											<div class="col-md-8 col-sm-8">
												<input type="text" class="form-control" name="mob" value="<?php echo $r['mob']; ?>" disabled>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-4 col-sm-4" for="pa">Postal Address:</label>
											<div class="col-md-8 col-sm-8">
												<textarea class="form-control" rows="5" name="pa" disabled><?php echo $r['addr1']; ?></textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-4 col-sm-4" for="pcd">Pincode:</label>
											<div class="col-md-8 col-sm-8">
												<input type="text" class="form-control" name="pcd" value="<?php echo $r['pcode']; ?>" disabled>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-4 col-sm-4" for="qual">Qualification:</label>
											<div class="col-md-8 col-sm-8">
												<input type="text" class="form-control" name="qual" value="<?php echo $r['qual']; ?>" disabled>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-4 col-sm-4" for="pst">Post:</label>
											<div class="col-md-8 col-sm-8">
												<input type="text" class="form-control" name="pst" value="<?php echo $r['post']; ?>" disabled>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-4 col-sm-4" for="yoj">Year of Joining:</label>
											<div class="col-md-8 col-sm-8">
												<input type="date" class="form-control" name="yoj" value="<?php echo $rod['yearj']; ?>" disabled>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-offset-1 col-md-5 col-sm-12 col-xs-12" >
						<div class="panel"  style="margin-top:10px;">
							<div class="panel-heading" style="background-color:#5E5C5C;color:white;">ADD PUBLICATION</div>
							<div class="panel-body">
								<form class="form-horizontal" action="pubdet.php" method="POST">
									<div class="form-group">
										<label class="control-label col-md-2 col-sm-2" for="tt">Title:</label>
										<div class="col-md-10 col-sm-10">
											<input type="text" class="form-control" name="tt" placeholder="Enter Title Name" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2 col-sm-2" for="aname">Area:</label>
										<div class="col-md-10 col-sm-10">
											<input type="text" class="form-control" name="aname" placeholder="Enter Area Name" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2 col-sm-2" for="jname">Journal/Conferance name:</label>
										<div class="col-md-offset-2 col-md-offset-2 col-md-10 col-sm-10">
											<input type="text" class="form-control" name="jname" placeholder="Enter Journal/Conferance Name" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2 col-sm-2" for="dop">DOP:</label>
										<div class="col-md-10 col-sm-10">
											<input type="date" class="form-control" name="dop" required>
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
					<div class="col-md-offset-1 col-md-5 col-sm-12 col-xs-12" >
						<div class="panel"  style="margin-top:10px;">
							<div class="panel-heading" style="background-color:#5E5C5C;color:white;">NUMBER OF PUBLICATION AND REPORTS<a data-toggle="modal" data-target="#updtr" style="float:right;font-size:16pt;color:white;cursor:pointer;" class="glyphicon glyphicon-edit"></a></div>
							<div class="panel-body">
								<form class="form-horizontal">
									<?php
										$query="SELECT nopub, norep FROM rch_details WHERE usn='$usn'";
										$result=mysqli_query($dbhandle,$query);
										$a=mysqli_fetch_assoc($result);
									?>
									<div class="form-group">
										<label class="control-label col-md-8 col-sm-8" style="float:left;">Number of Publications:</label>
										<div class="col-md-2 col-sm-2">
											<input type="number" class="form-control" value="<?php echo $a['nopub'];?>" disabled>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-8 col-sm-8" for="rp">Number of Perodic Reports Submited:</label>
										<div class="col-md-2 col-sm-2">
											<input type="number" id="repd" class="form-control" name="rp" value="<?php echo $a['norep'];?>" disabled>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12" >
						<div class="panel"  style="margin-top:10px;">
							<div class="panel-heading" style="background-color:#5E5C5C;color:white;">PUBLICATIONS</div>
							<div class="panel-body">
								<?php
									$query="SELECT * FROM pub_details WHERE pub_details.usn='$usn'";
									$result=mysqli_query($dbhandle,$query);
								?>
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover" style="font-size:15px;">
										<thead>
											<tr>
												<th>Sl.No.</th>
												<th>Project Title</th>
												<th>Area</th>
												<th>Journal/Conferance Name</th>
												<th>DOP</th>
												<th>Delete</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$sn=1;
												while($r=mysqli_fetch_assoc($result))
												{
													echo "<tr>";
													echo "<td>".($sn++)."</td>";
													echo "<td>".$r['title']."</td>";
													echo "<td>".$r['rarea']."</td>";
													echo "<td>".$r['cname']."</td>";
													echo "<td>".$r['dop']."</td>";
													?>
													<form action="delpub.php?id=<?php echo $r['ID']; ?>&usn=<?php echo $r['usn']; ?>" method="POST">
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
	<div class="modal fade" id="updtr" role="dialog">
		<div class="modal-dialog" style="margin-top:300px;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title">Number of Perodic Reports Submited:</h3>
				</div>
				<?php
					$usn = $_SESSION["usno"];
					$query="SELECT norep FROM rch_details WHERE usn='$usn'";
					$result=mysqli_query($dbhandle,$query);
					$r=mysqli_fetch_assoc($result);
				?>
				<form class="form-horizontal" action="uprepno.php" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<div class="col-sm-offset-1 col-xs-offset-1 col-sm-10 col-xs-10">
								<input type="number" class="form-control" name="rpno" value="<?php echo$r['norep']; ?>" required>
							</div>
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
	<div class="modal" id="delac" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content" style="padding:20px;margin-top:300px;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title"style="color:red;">DO YOU WANT TO DELETE ACCOUNT</h3>
				</div>
				<form class="form-horizontal" action="kickout.php" method="POST">
					<div class="modal-footer">
						<button type="submit" name="btn" class="btn btn-default">Continue</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					</div>
				</form>
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
	<div class="modal fade" id="editper" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="margin-bottom:15px;">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title">Update Personal details</h3>
				</div>
				<?php
					$usn = $_SESSION["usno"];
					$_SESSION["retpg"] = "sprof.php";
					$query="SELECT * FROM scholar WHERE usn='$usn'";
					$result=mysqli_query($dbhandle,$query);
					$qd="SELECT `yearj` FROM `rch_details` WHERE usn='$usn'";
					$rd=mysqli_query($dbhandle,$qd);
					$r=mysqli_fetch_assoc($result);
					$rod=mysqli_fetch_assoc($rd);
				?>
				<form class="form-horizontal" action="perdet.php" method="POST">
					<div class="form-group">
						<label class="control-label col-md-offset-1 col-sm-offset-1 col-md-2 col-sm-2" for="name">Name:</label>
						<div class="col-md-8 col-sm-8">
							<input type="text" class="form-control" id="z" name="name" value="<?php echo $r['name']; ?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-offset-1 col-sm-offset-1 col-md-2 col-sm-2" for="dept">Department:</label>
						<div class="col-md-8 col-sm-8" disabled>
							<input type="text" class="form-control" name="dept" value="<?php echo $r['dept']; ?>" required>
						</div>
					</div>
					<div class="form-group"> 
						<label class="control-label col-md-offset-1 col-sm-offset-1 col-md-2 col-sm-2" for="gen">Gender:</label>
						<div class="col-md-8 col-sm-8">
							<input type="text" class="form-control" name="gen" value="<?php echo $r['sex']; ?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-offset-1 col-sm-offset-1 col-md-2 col-sm-2" for="dob">DOB:</label>
						<div class="col-md-8 col-sm-8">
							<input type="date" class="form-control" name="dob" value="<?php echo $r['dob']; ?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-offset-1 col-sm-offset-1 col-md-2 col-sm-2" for="eid">Email name:</label>
						<div class="col-md-8 col-sm-8">
							<input type="email" class="form-control" name="eid" value="<?php echo $r['eid']; ?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-offset-1 col-sm-offset-1 col-md-2 col-sm-2" for="mno">Mobile no.:</label>
						<div class="col-md-8 col-sm-8">
							<input type="text" class="form-control" name="mob" value="<?php echo $r['mob']; ?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-offset-1 col-sm-offset-1 col-md-2 col-sm-2" for="pa">Postal Address:</label>
						<div class="col-md-8 col-sm-8">
							<textarea class="form-control" rows="5" name="pa" required><?php echo $r['addr1']; ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-offset-1 col-sm-offset-1 col-md-2 col-sm-2" for="pcd">Pincode:</label>
						<div class="col-md-8 col-sm-8">
							<input type="text" class="form-control" name="pcd" value="<?php echo $r['pcode']; ?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-offset-1 col-sm-offset-1 col-md-2 col-sm-2" for="qual">Qualification:</label>
						<div class="col-md-8 col-sm-8">
							<input type="text" class="form-control" name="qual" value="<?php echo $r['qual']; ?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-offset-1 col-sm-offset-1 col-md-2 col-sm-2" for="pst">Post:</label>
						<div class="col-md-8 col-sm-8">
							<input type="text" class="form-control" name="pst" value="<?php echo $r['post']; ?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-offset-1 col-sm-offset-1 col-md-2 col-sm-2" for="yoj">Year of Joining:</label>
						<div class="col-md-8 col-sm-8">
							<input type="date" class="form-control" name="yoj" value="<?php echo $rod['yearj']; ?>" required>
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
</body>
</html>