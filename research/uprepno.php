<?php
include 'main.php';
session_start();

$no = $_POST['rpno'];
$usn = $_SESSION['usno'];
$pg = $_SESSION["retpg"];

$qu = "UPDATE `rch_details` SET `norep`='$no' WHERE usn='$usn'";
$reslt = mysqli_query($dbhandle, $qu);

?>
<script>
	window.location.href="<?php echo $pg."?not=us"; ?>";
</script>
<?php
?>