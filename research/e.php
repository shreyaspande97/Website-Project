<?php
include 'main.php';

$usn = $_POST['usn'];

$quer = "SELECT eid FROM `scholar` WHERE usn='$usn'";
$resul = mysqli_query($dbhandle,$quer);
$ro = mysqli_fetch_assoc($resul);

$query = "SELECT userPassword FROM `login_users` WHERE usn='$usn'";
$result = mysqli_query($dbhandle,$query);
$row = mysqli_fetch_assoc($result);

$msg = "Your password is - ".$row['userPassword'];
$msg = wordwrap($msg,70);
mail($ro['eid'],"researchbmsce - password",$msg);

?>
<script>
	window.location.href="home.php?not=mails";
</script>
<?php
?>