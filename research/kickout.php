<?php
include 'main.php';
session_start();

$pg = $_SESSION["retpg"];

if($pg != "aprof.php")
	$usn = $_SESSION["usno"];
else
	$usn = $_POST['usn'];

if($usn == "ADMIN")
{
	?>
	<script>
		window.location.href="aprof.php";
	</script>
	<?php
}

$q = [
	"DELETE FROM `forum_q` WHERE usn='$usn'",
	"DELETE FROM `forum_a` WHERE usn='$usn'",
	"DELETE FROM `login_users` WHERE usn='$usn'",
	"DELETE FROM `pub_details` WHERE usn='$usn'",
	"DELETE FROM `rch_details` WHERE usn='$usn'",
	"DELETE FROM `scholar` WHERE usn='$usn'",
	"DELETE FROM `updts` WHERE usn='$usn'",
];
for($i=0;$i<7;$i++)
{
	$res[$i] = mysqli_query($dbhandle,$q[$i]);
}
if($pg == "aprof.php")
{
	?>
	<script>
		window.location.href="aprof.php?not=del";
	</script>
	<?php
}
else
{
	session_destroy();
	?>
	<script>
		window.location.href="home.php?not=del";
	</script>
	<?php
}
?>