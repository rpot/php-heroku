<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
<head>
<title>Workouts</title>
<meta http-equiv="description" content="page description" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap-submenu.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

</head>

<body>
<?php 
//$dir = 'sqlite:SQL/Demo.db';
try {
$db = "dfif9883lkmv0m";
$host = "ec2-54-235-177-62.compute-1.amazonaws.com";
$port = "5432";
$user = "ecyxybbwrnfpyt";
$pw = "HAtdGLA-NZz5JTBddqmFFXSarD";
$PDO = PDO('pgsql:dbname=$db;host=$host;user=$user;password=$pw');
}
catch (PDOException $e) {
	echo "DB ERROR";
	die();
}
//$PDO  = new PDO($dir) or die("cannot open the database");
if (isset($btnL) && isset($btnR)): ?>
<nav class="navbar navbar-default navbar-fixed-top ">
	<ul class="nav navbar-nav navbar-left">
		<?php echo "<li><a href='$hrefL'>$btnL</a></li>";?>
	</ul>
	<ul class="nav navbar-nav navbar-right">
		<?php echo "<li><a href='$hrefR'>$btnR</a></li>";?>
	</ul>
</nav>
    
<?php else: ?>
<nav class="navbar navbar-default navbar-fixed-top ">
	<div class="navbar-header">
		<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
		  <span class="sr-only">Toggle navigation</span>
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		</button>
	</div>
	 <div class="collapse navbar-collapse">
		<ul class="nav navbar-nav">
			<li><a href="/">Home</a></li>
			<li class="dropdown">
			<a tabindex="0" data-toggle="dropdown" data-submenu>Plans<span class="caret"></span></a>
				<ul class="dropdown-menu">
<?php 

$query ="SELECT DISTINCT PLAN,DAY FROM Workout_Plans ORDER BY PLAN,DAY";
$sql = $PDO->prepare($query);
$sql->execute();
foreach($sql->fetchAll() as $row) {
	$vals[$row['PLAN']][] = $row['DAY'];
}
foreach($vals as $plan => $days_array) {
	if (count($days_array)<=1) {
		echo "<li><a href='disp_workout.php?plan=$plan'>$plan</a></li>";
	}
	else {
		echo "<li class='dropdown-submenu'><a tabindex='0'>$plan</a>
				<ul class='dropdown-menu'>";
	
		foreach($days_array as $day) {
			echo "<li><a tabindex='0' href='disp_workout.php?plan=$plan&day=$day'>Day $day</a></li>";
		}
		echo "</ul></li>";
	}
}
	
?>
				</ul>
			</li>
			<li><a href="/">Exercises</a></li>
		</ul>
	</div>
</nav>
<?php endif; ?>
