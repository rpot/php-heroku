<?php
if(!isset($_GET['WORKOUT']) && !isset($_GET['DAY'])) header('Location: /');
$btnL = "Cancel"; $hrefL = "javascript:history.back()";
//$btnR = "Done"; $hrefR = "#";
include('navbar.php');

$plan = $_GET['WORKOUT'];
$day = $_GET['DAY'];

$query ="SELECT * FROM Workout_Plans WHERE PLAN = :plan AND DAY = :day";
$sql = $PDO->prepare($query);
$sql->bindParam(':plan',$plan);
$sql->bindParam(':day',$day);
$sql->execute();
$lifts = $sql->fetchAll();


?>
<div class="container">

<?php
	$plan_page = "plans/".$plan.".php";
	if (file_exists($plan_page)) include($plan_page);
	else {
		echo "<h1>WORKOUT TIME </h1>
			<h2>$plan: DAY $day</h2>";
	}
?>

</div>
<?php include('footer.html');?>
