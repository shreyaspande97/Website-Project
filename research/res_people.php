<!DOCTYPE html>
<html>
<head>
	<title>Research Scholars - Research Scholar Details Management</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="animate.css">
	<link rel="stylesheet" href="mycss.css">
	<script src="myjs.js"></script>
	<script src="bootstrap.min.js"></script>
</head>
<body>
	<div class="headerf">
		<div id="mySidenav" class="sidenav" style="height:706px;">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<?php
				include "main.php";
				session_start();
				echo "<a style='display: none;'>";
				$stat=$_SESSION["status"];
				echo "</a>";
				if($stat)
				{
					$usn = $_SESSION["usno"];
					$name = $_SESSION["name"];
					$_SESSION["page"] = "people.php";
					echo "<a style='font-size:16px;cursor:pointer;border-bottom:1px dotted;'>".($name)."</a>";
				}
				else
				{
					echo "<a data-toggle='modal' data-target='#lg' style='font-size:16px;cursor:pointer;border-bottom:1px dotted;'>Login</a>";
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
			<li><a style="cursor:pointer" class="tablinks" onclick="openNav()">&#9776;</a></li>
			<li><a href = "home.php" class="tablinks active">Home</a></li>
			<?php
				if($stat && $_SESSION["type"] != "scholar")
					echo "<li><a href = 'res_people.php' class='tablinks'>People</a></li>";
				else
					echo "<li><a href = 'people.php' class='tablinks'>People</a></li>";
			?>
			<li><a href = "area.php" class="tablinks">Areas</a></li>
			<li><a href = "forum.php" class="tablinks">Forum</a></li>
			<?php
				if($stat)
				{
					echo "<li><a href = 'report.php' class='tablinks'>Report</a></li>";
					echo "<li style='float:right;'><a href = 'logout.php' class='tablinks'>Logout</a></li>";
					if($_SESSION["type"] == "scholar")
						$pg = "sprof.php";
					elseif($_SESSION["type"] == "admin")
						$pg = "aprof.php";
					elseif($_SESSION["type"] == "hod")
						$pg = "hprof.php";
					elseif($_SESSION["type"] == "rh")
						$pg = "rprof.php";
					if($_SESSION["type"] != "admin")
					echo "<li style='float:right;'><a href = '".$pg."' class='tablinks' style='cursor:pointer;'>". ($name) ."</a></li>";
					echo "<li style='float:right;'><a href = '".$pg."' class='tablinks' style='cursor:pointer;'>". ($usn) ."</a></li>";
				}
				else
				{
					echo "<li style='float:right;'><a data-toggle='modal' data-target='#lg' class='tablinks' style='cursor:pointer;'>Login</a></li>";
					echo "<li style='float:right;'><a href = 'form.php' class='tablinks'>Signup</a></li>";
				}
			?>	
		</ul>
	</div>
	<div id="main" onclick="closeNav()">
		<div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:16px;margin-bottom:16px;">
			<div class="col-md-12 col-sm-12 col-xs-12 card">
				<div class="col-md-12">
					<h3 class="page-head-line">Research Scholar Details</h3>
				</div>
				<form class="form-horizontal">
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2" for="myInput">Arrange by Department:</label>
						<div class="col-md-3 col-sm-3">
							<select id="myInput" class="Input" onchange="tablefunct('myInput')">
								<option value="">All</option>
								<option value="cse">CSE</option>
								<option value="ise">ISE</option>
							</select>
						</div>
						<label class="control-label col-md-offset-1 col-md-2 col-sm-2" for="myInput">Arrange by Year of Joining:</label>
						<div class="col-md-3 col-sm-3">
							<select id="myInput1" class="Input" onchange="tablefunct('myInput1')">
								<option value="">All</option>
								<?php
								for($y=2016;$y>1996;$y--)
								echo "<option value='".$y."'>".$y."</option>";
								?>
							</select>
						</div>
					</div>
				</form>
				<div class="table-responsive">
					<table id="myTable">
						<tr class="header">
							<th>USN</th>
							<th>Name</th>
							<th>Department</th>
							<th>Qualification</th>
							<th>Post</th>
							<th>Email iD</th>
							<th>Mobile no</th>
							<th>DOB</th>
							<th>No of Publications</th>
							<th>Year of Joining</th>
							
						</tr>
						<?php
							$query="SELECT * FROM scholar, rch_details WHERE scholar.usn=rch_details.usn";
							$result=mysqli_query($dbhandle,$query);
							$nr=mysqli_num_rows($result);
							while($row=mysqli_fetch_assoc($result))
							{ 
								echo "<tr>";
								echo "<td>".$row['usn']."</td>";
								echo "<td>".$row['name']."</td>";
								echo "<td>".$row['dept']."</td>";
								echo "<td>".$row['qual']."</td>";
								echo "<td>".$row['post']."</td>";
								echo "<td>".$row['eid']."</td>";
								echo "<td>".$row['mob']."</td>";
								echo "<td>".$row['dob']."</td>";
								echo "<td>".$row['nopub']."</td>";
								echo "<td>".$row['yearj']."</td>";
								echo "</tr>";
							}
						?>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="lg" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title">Login</h3>
				</div>
				<form class="form-horizontal" action="l_process.php" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<label class="control-label col-md-3 col-xs-3" for="typ">User Type:</label>
							<div class="col-sm-8 col-xs-8">
								<select class="form-control" name="typ" required>
									<option value="scholar">Scholar</option>
									<option value="hod">HOD</option>
									<option value="rh">Research Head</option>
									<option value="admin">Admin</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-xs-3" for="usn">USN/ Emp ID:</label>
							<div class="col-sm-8 col-xs-8">
								<input type="text" class="form-control" name="usn" placeholder="Enter USN / Emp ID"  maxlength="10" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-xs-3" for="psw">Password:</label>
							<div class="col-sm-8 col-xs-8">
								<input type="password" class="form-control" name="psw" placeholder="Enter Password" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-11 col-xs-11" for="typ">
								<a href="">Forgot Password?</a>
							</label>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" name="btn" class="btn btn-default">Login</button>
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