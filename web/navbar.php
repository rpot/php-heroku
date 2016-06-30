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
<h1>TRYING TO OPEN</h1>

<?php 
try {
$db = "dfif9883lkmv0m";
$host = "ec2-54-235-177-62.compute-1.amazonaws.com";
$port = 5432;
$user = "ecyxybbwrnfpyt";
$pw = "HAtdGLA-NZz5JTBddqmFFXSarD";
$PDO = new PDO('pgsql:host=$host;port=$port;dbname=$db;user=$user;password=$pw');
if($PDO){
 echo "Connected to the <strong>$db</strong> database successfully!";
 }
}
catch (PDOException $e) {
	echo "DB ERROR";
}
?>

</body>