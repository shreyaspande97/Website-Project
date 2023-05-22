<?php
include "main.php";
session_start();
$pg = $_SESSION["page"];
$_SESSION['status']=0;
session_destroy();
?>
<script>
	window.location.href="<?php echo $pg."?not=lgots"; ?>";
</script>
<?php
?>