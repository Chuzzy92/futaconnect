

<?php
	require_once('session.php');
?>
	
	
	
	
<?php
include('connect.php');

$idto = $_GET['id'];
$user = $_SESSION['SESS_USER_ID'];
mysql_query("INSERT INTO friends(user_id,datetime,status,friends_with) VALUES('$user',now(),'unconf','$idto') ")or die(mysql_error());

?>

<html>


<body>
<div class="facebox">
<?php
								$user_id = $_SESSION['SESS_USER_ID'];
								$post = mysql_query("SELECT * FROM users WHERE user_id='$user_id'")or die(mysql_error());
								while($row = mysql_fetch_array($post)){
									echo '
									
										<div class="pic2"><img src="'.$row['profImage'].'" alt="" height="70" width="70" border="0" class="left_bt" /></div>								
										<div class="pi">'.$row['FirstName']." ".$row['LastName'].'</div>
										
										<div class="message3">Your friend request has been sent, just wait for the confirmation</div>
									';
									
								}
								
							?>
							</div>
</body>
</html>