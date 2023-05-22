<?php
include "main.php";
session_start();

$qus = $_POST["fq"];
$tl = $_POST["titl"];
$usn = $_SESSION["usno"];

$query = "INSERT INTO `forum_q`(`qn`, `usn`, `tt`, `qut`, `dt`) VALUES (NULL, '$usn', '$tl', '$qus', CURRENT_TIMESTAMP)";
$result = mysqli_query($dbhandle,$query);
if($result)
{
	?>
<script>
	window.location.href="forum.php?not=ques";
</script>
<?php
}
?>
