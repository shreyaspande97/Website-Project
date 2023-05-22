<?php
include 'main.php';
session_start();

$usn = $_POST['usn'];
$pass = $_POST['psw'];
$type = $_POST['typ'];
$qual = $_POST['qual'];
$dpt = $_POST['dept'];
$name = $_POST['name'];
$post = $_POST['pst'];
$sex = $_POST['gen'];
$dob = $_POST['dob'];
$email = $_POST['eid'];
$mob = $_POST['mob'];
$a1 = $_POST['pa'];
$pc = $_POST['pcd'];
$yj = $_POST['yoj'];

$qry = "SELECT `usn` FROM login_users";
$r=mysqli_query($dbhandle,$qry);
while($usns = mysqli_fetch_assoc($r))
{
	if($usns['usn'] == $usn)
	{
		session_destroy();
		?>
		<script>
			window.location.href="form.php?not=suus";
		</script>
		<?php
	}
}


$query1 = "INSERT INTO login_users (userType, usn, userPassword) VALUES ('$type', '$usn', '$pass')";
$result=mysqli_query($dbhandle,$query1);
$query = "INSERT INTO scholar (name, qual, dept, post, sex, dob, eid, mob, addr1,  pcode,  usn) values ('$name', '$qual', '$dpt', '$post', '$sex', '$dob', '$email', $mob, '$a1', $pc, '$usn')";
$res = mysqli_query($dbhandle,$query);
$quer = "INSERT INTO rch_details (`yearj`, `nopub`, `norep`, `usn`) VALUES ('$yj', 0, 0, '$usn')";
$res = mysqli_query($dbhandle,$quer);

$_SESSION["usno"] = $usn;
$_SESSION["name"] = $name;
$_SESSION["type"] = $type;
$_SESSION["status"] = 1;
if($type == "scholar")
{
	?>
	<script>
		window.location.href="sprof.php?not=sss";
	</script>
	<?php
}
elseif($type == "hod")
{
	?>
	<script>
		window.location.href="hprof.php?not=sss";
	</script>
	<?php
}
elseif($type == "rh")
{
	?>
	<script>
		window.location.href="rprof.php?not=sss";
	</script>
	<?php
}
elseif($type == "admin")
{
	$_SESSION["name"] = "Admin";
	$_SESSION["usno"] = "Admin";
	?>
	<script>
		window.location.href="aprof.php";
	</script>
	<?php
}
?>