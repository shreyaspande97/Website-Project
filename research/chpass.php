<?php
include "main.php";
session_start();

$old = $_POST["opsw"];
$new = $_POST["npsw"];
$usn = $_SESSION["usno"];
$type = $_SESSION["type"];
$pg = $_SESSION["retpg"];


$query = "UPDATE `login_users` SET userPassword = '$new' WHERE login_users.usn = '$usn'";
$result = mysqli_query($dbhandle,$query);
?>
<script>
	window.location.href="<?php echo $pg."?not=pswch"; ?>";
</script>
<?php
?>