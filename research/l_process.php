<?php
session_start();
include 'main.php';

$myusername = $_POST['usn'];
$mypassword = $_POST['psw'];
$type = $_POST['typ'];

$query = "SELECT * FROM `login_users` WHERE userType='$type' AND usn='$myusername' AND userPassword='$mypassword'";
$result = mysqli_query($dbhandle,$query);
$nr=mysqli_num_rows($result);
if($nr == 1)
{
	if($type != "admin")
	{		
		$q1 = "SELECT name FROM `scholar` WHERE usn = '$myusername'";
		$r1 = mysqli_query($dbhandle,$q1);
		$row2=mysqli_fetch_assoc($r1);
		$name = $row2[name];
		$_SESSION["usno"] = $myusername;
		$_SESSION["name"] = $name;
	}
	$_SESSION["status"] = 1;
	$_SESSION["type"] = $type;
	$_SESSION["chst"] = 2;
	if($type == "scholar")
	{
		?>
		<script>
			window.location.href="sprof.php?not=ls";
		</script>
		<?php
	}
	elseif($type == "hod")
	{
		?>
		<script>
			window.location.href="hprof.php?not=ls";
		</script>
		<?php
	}elseif($type == "rh")
	{
		?>
		<script>
			window.location.href="rprof.php?not=ls";
		</script>
		<?php
	}elseif($type == "admin")
	{
		$_SESSION["name"] = "Admin";
		$_SESSION["usno"] = "Admin";
		?>
		<script>
			window.location.href="aprof.php?not=ls";
		</script>
		<?php
	}
	else
	{
		$_SESSION["status"] = 0;
		?>
		<script>
			window.location.href="home.php?not=lu";
		</script>
		<?php
	}
}
else {
	$_SESSION["status"] = 0;
	session_destroy();
	?>
	<script>
		window.location.href="home.php?not=lu";
	</script>
	<?php
}
?>