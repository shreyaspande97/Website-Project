<?php
include 'main.php';
session_start();

$id = $_GET['id'];
$usn = $_GET['usn'];
$pg = $_SESSION["retpg"];

$qu = "DELETE FROM `pub_details` WHERE id='$id'";
$res = mysqli_query($dbhandle, $qu);

$q = "SELECT `nopub` FROM `rch_details` WHERE usn='$usn'";
$rest = mysqli_query($dbhandle, $q);
$row = mysqli_fetch_assoc($rest);
$pubno = $row['nopub'];
$pubno--;
$qu = "UPDATE `rch_details` SET `nopub`='$pubno' WHERE usn='$usn'";
$reslt = mysqli_query($dbhandle, $qu);

?>
<script>
	window.location.href="<?php echo $pg; ?>?not=pubd";
</script>
<?php
?>