<?php
include 'main.php';
session_start();

$upd = $_POST['upt'];
$pg = $_SESSION["retpg"];
$q = "INSERT INTO `updts`(sn, updt) VALUES (NULL, '$upd')";
$res = mysqli_query($dbhandle, $q);

?>
<script>
	window.location.href="<?php echo $pg."?not=updtsup"; ?>";
</script>
<?php
?>