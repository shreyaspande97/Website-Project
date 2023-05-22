<?php
include 'main.php';
session_start();

$tt = $_POST["tt"];
$ar = $_POST["aname"];
$confn = $_POST["jname"];
$dop = $_POST["dop"];
$usn = $_SESSION["usno"];
$pg = $_SESSION["retpg"];

$qry = "INSERT INTO `pub_details`(`title`, `rarea`, `cname`, `dop`, `usn`, `ID`) VALUES ('$tt','$ar','$confn','$dop','$usn',NULL)";
$res = mysqli_query($dbhandle, $qry);

$q = "SELECT `nopub` FROM `rch_details` WHERE usn='$usn'";
$rest = mysqli_query($dbhandle, $q);
$row = mysqli_fetch_assoc($rest);
$pubno = $row['nopub'];
$pubno++;
$qu = "UPDATE `rch_details` SET `nopub`='$pubno' WHERE usn='$usn'";
$reslt = mysqli_query($dbhandle, $qu);

?>
<script>
	window.location.href="<?php echo $pg."?not=ps"; ?>";
</script>
<?php
?>