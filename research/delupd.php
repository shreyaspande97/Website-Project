<?php
include 'main.php';
session_start();

$id = $_GET['sn'];
$pg = $_SESSION["retpg"];

$qu = "DELETE FROM `updts` WHERE sn='$id'";
$res = mysqli_query($dbhandle, $qu);

?>
<script>
	window.location.href="<?php echo $pg; ?>?not=updtdel";
</script>
<?php
?>