<?php
	require('session.php');
?>
<html>
<script type="text/javascript">
<!--
var timeout         = 500;
var closetimer		= 0;
var ddmenuitem      = 0;

// open hidden layer
function mopen(id)
{	
	// cancel close timer
	mcancelclosetime();

	// close old layer
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';

	// get new layer and show it
	ddmenuitem = document.getElementById(id);
	ddmenuitem.style.visibility = 'visible';

}
// close showed layer
function mclose()
{
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';
}

// go close timer
function mclosetime()
{
	closetimer = window.setTimeout(mclose, timeout);
}

// cancel close timer
function mcancelclosetime()
{
	if(closetimer)
	{
		window.clearTimeout(closetimer);
		closetimer = null;
	}
}

// close layer when click-out
document.onclick = mclose; 
// -->
</script>
<head><title>Message</title></head>
<link href="info.css" rel="stylesheet" type="text/css" />
<link href="home.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="img/LOGO4.png" type="image" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="./js/jquery-1.4.2.min.js"></script>
	<link href="facebox1.2/src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
			<link href="../css/example.css" media="screen" rel="stylesheet" type="text/css" />
			<script src="facebox1.2/src/facebox.js" type="text/javascript"></script>
			<script type="text/javascript">

jQuery(document).ready(function($) {
  $('a[rel*=facebox]').facebox() 
  	closeImage   : " ../src/closelabel.png" 
})
</script>

<style type="text/css">
<!--
body {
	background-image: url(images/New%20Picture.jpg);
	background-repeat: repeat-x;
}
.style1 {font-weight: bold}
-->
</style>
</body>
<div class="main">


<div class="lefttop1">
  <div class="lefttopleft"> <a href="img/logo.jpg" rel="facebox"><img src="img/LOGO5.png" width="150" height="40" /></a></div>
   <div class="propic">

	<?php
include('connect.php');
$id= $_SESSION['SESS_USER_ID'];	
$image=mysql_query("SELECT * FROM users WHERE user_id='$id'");
			$row=mysql_fetch_assoc($image);
			$_SESSION['image']= $row['profImage'];
			echo '<div id="pic">';
			echo "<a href=".$row['profImage']." rel=facebox;><img class=img-circle width=140 height=140 alt='Unable to View' src='" . $_SESSION['image'] . "'></a>";
			echo '</div>';

?>
</div>
<ul id="sddm1">
	<li><a href="editpic.php"><img src="img/pencil.png" width="17" height="17" border="0" /> &nbsp;Change Picture</a>
	</li>
	<li><a href="Home.php"><img src="img/wal.png" width="17" height="17" border="0" /> &nbsp;Wall</a>
	</li>
	<li><a href="info.php"><img src="img/message.png" width="16" height="12" border="0" /> &nbsp;Info</a>
	</li>
	<li><a href="photos.php"><img src="img/photos.png" width="16" height="12" border="0" /> &nbsp;Photos(<?php
$result = mysql_query("SELECT * FROM photos WHERE user_id='".$_SESSION['SESS_USER_ID'] ."'");
	
	$numberOfRows = MYSQL_NUMROWS($result);	
	
	echo '<font color="red">' . $numberOfRows . '</font>'; 
	?>)	</a>
	</li>
	<li><a href="request.php"><img src="img/friends.png" width="16" height="12" border="0" /> &nbsp;Friends Request
	(<?php 
					
					$user_id=$_SESSION['SESS_USER_ID'];
					$seeall=mysql_query("SELECT * FROM friends WHERE friends_with='$user_id' AND status='unconf'") or die(mysql_error());
					$numberOFRows=mysql_numrows($seeall);
					echo '<font color="red">'.$numberOFRows.'</font>';?>)
					</a>
	</li>
	<li><a href=""><img src="img/m.png" width="16" height="12" border="0" /> &nbsp;Message&nbsp(<?php 
$user_id = $_SESSION['SESS_USER_ID'];
$received = mysql_query("SELECT * FROM messages WHERE recipient = '$user_id'")or die(mysql_error());
								$receiveda = mysql_numrows($received);
								echo '<font color="Red">'  .$receiveda .'</font>';


?>)
	</a>
	</li>
	
	<li><hr width="150"></li>
	<li>
	</ul>
	<div class="friend">
	<ul id="sddm1">
	<li><a href=""><img src="img/friends.png" width="16" height="12" border="0" /> &nbsp;Friends
	
	(<?php


$result = mysql_query("SELECT * FROM friends WHERE  friends_with = '$id' and  user_id!= '$id' and status = 'conf'    OR user_id = '$id' and friends_with != '$id' and status = 'conf' ");
	
	$numberOfRows = MYSQL_NUMROWS($result);	
	echo '<font color="Red">' . $numberOfRows. '</font>';
	?>)
	</a>
	</li>
	</ul>
	<ul id="sddm1">
  <?php
							
							
								$user_id=$_SESSION['SESS_USER_ID'];							
								$post = mysql_query("SELECT * FROM friends WHERE  friends_with = '$id' and  user_id!= '$id' and status = 'conf'    OR user_id = '$id' and friends_with != '$id' and status = 'conf'  ")or die(mysql_error());
								

								$num_rows  =mysql_numrows($post);
							
							if ($num_rows != 0 ){

								while($row = mysql_fetch_array($post)){
				
								$myfriend = $row['user_id'];
								$user_id=$_SESSION['SESS_USER_ID'];
								
									if($myfriend == $user_id){
									
										$myfriend1 = $row['friends_with'];
										$friends = mysql_query("SELECT * FROM users WHERE user_id = '$myfriend1'")or die(mysql_error());
										$friendsa = mysql_fetch_array($friends);
									
										echo '<li> <a href=friendprofile.php?id='.$friendsa["user_id"].' style="text-decoration:none;"><img class="img-circle" alt="image" src="'. $friendsa['profImage'].'" height="50" width="50"></li><br><li>'.$friendsa['FirstName'].' '.$friendsa['LastName'].' </a> </li>';
										
									}else{
										
										$friends = mysql_query("SELECT * FROM users WHERE user_id = '$myfriend'")or die(mysql_error());
										$friendsa = mysql_fetch_array($friends);
										
									echo '<li> <a href=friendprofile.php?id='.$friendsa["user_id"].' style="text-decoration:none;"><img class="img-circle" alt="image" src="'. $friendsa['profImage'].'" height="50" width="50"></li><br><li>'.$friendsa['FirstName'].' '.$friendsa['LastName'].' </a> </li>';
										
									}
								}
								}else{
									echo 'You don\'t have friends </li>';
								}
						
							
							?>
							</ul>
							
							<ul id="sddm1">
							<li><hr width="150"></li>
							</ul>
</div>							
  <div><a href="logout.php"><font size="3" class="font1">Logout</font></a>
  </div>							
</div>
  <div class="righttop1">
       <div class="search">
       <form action="search.php" method="POST">
        <input name="search" type="text" maxlength="30" class="textfield"  value="search"/>
	
      </form>
</div>
    <div class="nav">
      <ul id="sddm">
        <li><a href="profile.php" ><?php


$result = mysql_query("SELECT * FROM users WHERE user_id='".$_SESSION['SESS_USER_ID'] ."'");
while($row = mysql_fetch_array($result))
  {
  echo "<img class=img-circle width=20 height=15 alt='Unable to View' src='" . $row["profImage"] . "'>";
echo"  ";
  echo $row["FirstName"];
  echo"  ";
  echo $row["LastName"];
  }

?></a></li>
      <li><a href="Home.php">Home</a></li>
               <li><a  href="#"onmouseover="mopen('m5')" onMouseOut="mclosetime()">Settings</a>
          <div id="m5" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
</a>

		</ul>
      <div style="clear:both"></div>
      <div style="clear:both"></div>
    </div>
  </div>
  
  </div>
  
<div class="right">
	<div class="rightright">
	
	 </div>

	
<div class="shoutout3">
<div class="ball">
</div>
</br>
<a  id="create" href="createmessage.php">Create Message</a><a  id="re" href="receivemessage.php">Received Message
(<?php
$received = mysql_query("SELECT * FROM messages WHERE recipient = '$user_id'")or die(mysql_error());
								$receiveda = mysql_numrows($received);
								
								echo '<font color="Red">'  .$receiveda .'</font>';

?>)
</a>
	
</br>
</br>
	<div class="ball">
</div>
</br>
	 </div>
	 
	</div>

</body>
</html>
 