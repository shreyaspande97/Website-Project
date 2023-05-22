<?php
include 'main.php';
session_start();

$q = [
	"TRUNCATE TABLE `forum_a`",
	"TRUNCATE TABLE `forum_q`",
	"TRUNCATE TABLE `login_users`",
	"TRUNCATE TABLE `pub_details`",
	"TRUNCATE TABLE `rch_details`",
	"TRUNCATE TABLE `scholar`",
	"TRUNCATE TABLE `updts`",
];

for($i=0;$i<7;$i++)
{
	$res[$i] = mysqli_query($dbhandle,$q[$i]);
}

$qr = "INSERT INTO `login_users`(`userType`, `usn`, `userPassword`) VALUES ('admin','admin','admin')";
$rest = mysqli_query($dbhandle,$qr);
$query = "INSERT INTO scholar (name, qual, dept, post, sex, dob, eid, mob, addr1,  pcode,  usn) values ('Admin', '', '', '', '', '', '', 0, '', 0, 'admin')";
$res = mysqli_query($dbhandle,$query);
$_SESSION["type"] = "admin";
$_SESSION["name"] = "Admin";
$_SESSION["usno"] = "Admin";
?>
<script>
	window.location.href="aprof.php?not=resets";
</script>
<?php
?>