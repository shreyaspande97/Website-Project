<?php
include 'main.php';
session_start();

$qual = $_POST['qual'];
$dpt = $_POST['dept'];
$name = $_POST['name'];
$post = $_POST['pst'];
$sex = $_POST['gen'];
$dob = $_POST['dob'];
$email = $_POST['eid'];
$mob = $_POST['mob'];
$a1 = $_POST['pa'];
$pc = $_POST['pcd'];
$yj = $_POST['yoj'];
$usn = $_SESSION["usno"];
$pg = $_SESSION["retpg"];
$_SESSION['name'] = $name;

$qur = "UPDATE `scholar` SET `name`='$name',`qual`='$qual',`dept`='$dpt',`post`='$post',`sex`='$sex',`dob`='$dob',`eid`='$email',`mob`='$mob',`addr1`='$a1',`pcode`='$pc' WHERE usn='$usn'";
$res = mysqli_query($dbhandle, $qur);

$qu = "UPDATE `rch_details` SET `yearj`='$yj' WHERE usn='$usn'";
$res = mysqli_query($dbhandle, $qu);

?>
<script>
	window.location.href="<?php echo $pg."?not=us"; ?>";
</script>
<?php
?>