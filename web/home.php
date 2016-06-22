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

<form>
  <label for="userid">ID</label>
  <input type="text" name="userid" id="userid" />
  <br />
  <label for="password">Password</label>
  <input type="password" name="password" id="password" />
  <br />
  <input type="submit" name="submit" value="Submit" />
</form>
Read more at http://codewalkers.com/c/a/Miscellaneous/Writing-a-Basic-Authentication-System-in-PHP/2/#lrqcbvTxHdO9dB5L.99

</body>
</html>