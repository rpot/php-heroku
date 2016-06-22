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
echo "\n";
/* displays e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4 */
?>

<!-- <form action="validate.php" method="post"> -->
<!--
<form>
  <label for="userid">ID</label>
  <input type="text" name="userid" id="userid" />
  <br />
  <label for="password">Password: </label>
  <input type="password" name="password" id="password" />
  <br />
  <input type="submit" name="submit" value="Submit" />
</form>
--!>

<?php
echo "Opening database\n";
$host = "host=ec2-23-23-211-21.compute-1.amazonaws.com";
$port= "port=5432";
$dbname = "dbname=df18q3f7uv9r66";
$credentials = "user=ggpqlztfopnjkw password=qRDY5I2d3_CvBg2_0fxNpjO3o_";
$db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db){
      echo "Error : Unable to open database\n";
   } else {
      echo "Opened database successfully\n";
   }
$sql =<<<EOF
      CREATE TABLE COMPANY
      (ID INT PRIMARY KEY     NOT NULL,
      NAME           TEXT    NOT NULL,
      AGE            INT     NOT NULL,
      ADDRESS        CHAR(50),
      SALARY         REAL);
EOF;

   $ret = pg_query($db, $sql);
   if(!$ret){
      echo pg_last_error($db);
   } else {
      echo "Table created successfully\n";
   }
   
$sql =<<<EOF
      INSERT INTO COMPANY (ID,NAME,AGE,ADDRESS,SALARY)
      VALUES (1, 'Paul', 32, 'California', 20000.00 );

      INSERT INTO COMPANY (ID,NAME,AGE,ADDRESS,SALARY)
      VALUES (2, 'Allen', 25, 'Texas', 15000.00 );

      INSERT INTO COMPANY (ID,NAME,AGE,ADDRESS,SALARY)
      VALUES (3, 'Teddy', 23, 'Norway', 20000.00 );

      INSERT INTO COMPANY (ID,NAME,AGE,ADDRESS,SALARY)
      VALUES (4, 'Mark', 25, 'Rich-Mond ', 65000.00 );
EOF;

   $ret = pg_query($db, $sql);
   if(!$ret){
      echo pg_last_error($db);
   } else {
      echo "Records created successfully\n";
   }
   pg_close($db);
?>
pg_close($db);


?>

</body>
</html>