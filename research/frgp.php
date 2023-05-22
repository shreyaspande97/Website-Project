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
</head>
<body>
	<div class="headerf">
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
			<li><a href = "home.php" class="tablinks active">Home</a></li>
		</ul>
	</div>
	<div id="main">
		<div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:16px;margin-bottom:16px;">
			<div class="col-md-offset-1 col-sm-offset-1 col-md-10 col-sm-10 col-xs-12 card">
				<div class="col-md-12">
					<h3 class="page-head-line">Forgot Password ?</h3>
				</div>
				<form class="form-horizontal" action="e.php" method="POST">
					<div class="form-group">
						<label class="control-label col-md-3 col-xs-3" for="usn">USN/ Emp ID:</label>
						<div class="col-md-8 col-sm-8">
							<input type="text" class="form-control" name="usn" placeholder="Enter USN / Emp ID"  maxlength="10" required>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-5 col-md-2">
							<input type="Submit" class="form-control" name="sub" value="Send email" />
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>