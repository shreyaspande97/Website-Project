<?php
include "main.php";
session_start();

$ans = $_POST["fan"];
$q = $_GET["qn"];
$usn = $_SESSION["usno"];

$query = "INSERT INTO `forum_a`(`qn`, `usn`, `ans`, `dt`) VALUES ('$q','$usn','$ans',CURRENT_TIMESTAMP)";
$result = mysqli_query($dbhandle,$query);
if($result)
{
	?>
<script>
	window.location.href="forum.php?not=anss";
</script>
<?php
}
?>
