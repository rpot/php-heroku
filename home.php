<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
<head>
<title>Home page – My Website</title>
<meta http-equiv="description" content="page description" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>

<body>

<?php
$password = "secret";

echo $password;
/* displays secret */

$password = sha1($password);

echo $password; 
/* displays e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4 */
?>

<!-- <form action="validate.php" method="post"> -->
<form>
  <label for="userid">ID</label>
  <input type="text" name="userid" id="userid" />
  <br />
  <label for="password">Password: </label>
  <input type="password" name="password" id="password" />
  <br />
  <input type="submit" name="submit" value="Submit" />
</form>

<?php
$dbconn = pg_connect("host=ec2-23-23-211-21.compute-1.amazonaws.com dbname=df18q3f7uv9r66 user=ggpqlztfopnjkw password=qRDY5I2d3_CvBg2_0fxNpjO3o_")
    or die('Could not connect: ' . pg_last_error());

$query = "CREATE TABLE MyGuests (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";
$result = pg_query($query) or die('Query failed: ' . pg_last_error());
echo "Table MyGuests created successfully";
?>

</body>
</html>