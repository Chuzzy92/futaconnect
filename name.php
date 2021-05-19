<?php
include('header.php');
?>
<?php
$result = mysql_query("SELECT * FROM users WHERE user_id='".$_SESSION['SESS_USER_ID'] ."'");
while($row = mysql_fetch_array($result))
  {
 
  echo $row["FirstName"];
  echo"  ";
  echo $row["LastName"];
  }
?>