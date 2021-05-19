<?php
 require_once('session.php');
 include("function.php");
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
<head><title>settings</title></head>

<link href="home.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="img/LOGO4.png" type="image" />
<script type="text/javascript" src="js/jquery.js"></script>
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

<script type="text/javascript">

$(document).ready(function(){
$("#shadow").fadeOut();

	$("#cancel_hide").click(function(){
        $("#").fadeOut("slow");
        $("#shadow").fadeOut();
		
   });
      });
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
<div id="shadow" class="popup"></div>

  <div class="lefttop1">
  <div class="lefttopleft"><img src="img/LOGO5.png" width="150" height="40" /></div>
   <div class="propic">
	<?php
include('connect.php');
$id= $_SESSION['SESS_USER_ID'];	
$image=mysql_query("SELECT * FROM users WHERE user_id='$id'");
			$row=mysql_fetch_assoc($image);
			$_SESSION['image']= $row['profImage'];
			echo '<div id="pic">';
			echo "<img class=img-circle width=140 height=140 alt='Unable to View' src='" . $_SESSION['image'] . "'>";
			echo '</div>';

?>
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
          </a>
        
		</ul>
      <div style="clear:both"></div>
      <div style="clear:both"></div>
    </div>
  </div>
  
  <div class="right">
  
  <div class="shoutout">

		  <div class="bkb"><h3 id="sddm">&nbsp;Based on your activity and how people can find you</h3></div>
		</br>
				<form method="post" action="">
 <input name="userid" type="hidden"  value=" <?php echo $_SESSION['SESS_USER_ID'];?>" /> 
        <table width="150" border="0" cellpadding="5" cellspacing="0">
		<div>
		<tr>
		 <td>Who views my profile?&nbsp;</br>
		 <select name="proview">
		 <option value="Everyone">Everyone</option>
		 <option value="Friends">Friends</option>
		 <option value="onlyme">Only me</option>
		 </select>
		 </td>
		 </tr>
		 </div>
		
		<div>
		 <tr>
		 <td>Who posts on my wall?&nbsp;</br>
		 <select name="wallposts">
		 <option value="Everyone">Everyone</option>
		 <option value="Friends">Friends</option>
		 <option value="onlyme">Only me</option>
		 </select>
		 </td>
		 </tr></div>		 
		<tr>
		 <td>Who can see your friends list?&nbsp;</br>
		 <select name="friendlist">
		 <option value="Everyone">Everyone</option>
		 <option value="Friends">Friends</option>
		 <option value="onlyme">Only me</option>
		 </select>
		 </td>
		 </tr>
		<tr>
		 <td>Who can send you friend requests?&nbsp;</br>
		 <select name="frequests">
		 <option value="Everyone">Everyone</option>
		 <option value="Friends">Friends</option>
		 <option value="onlyme">Only me</option>
		 </select>
		 </td>
		 </tr>
		<tr>
		 <td>Who can look you up using the phone number you provided?&nbsp;</br>
		 <select name="phonelists">
		 <option value="Everyone">Everyone</option>
		 <option value="Friends">Friends</option>
		 <option value="onlyme">Only me</option>
		 </select>
		 </td>
		 </tr>
		<tr>
		 <td>Who can see your future posts?&nbsp;</br>
		 <select name="plists">
		 <option value="Everyone">Everyone</option>
		 <option value="Friends">Friends</option>
		 <option value="onlyme">Only me</option>
		 </select>
		 </td>
		 </tr>
		<tr>
		<td><input type="submit" name="save" value="Save Changes" class="greenButton"></td></tr>
		</form>
		</table>
		
<div class="ball">
</div>
</br>
	</div>
	
</body>
</html>

<?php
if (isset($_POST['save'])){
$proview=$_POST['proview'];
$wallposts=$_POST['wallposts'];
$friendlist=$_POST['friendlist'];
$frequests=$_POST['frequests'];
$phonelists=$_POST['phonelists'];
$plists=$_POST['plists'];
$user=$_POST['user_id'];

mysql_query("UPDATE settings SET proview='$proview',wallposts='$wallposts',friendlist='$friendlist',frequests='$frequests',phonelists='$phonelists',plists='$plists' WHERE user_id='$user'");		  

echo"<script type='text/javascript'> alert('save');
window.location='profile.php';
</script>";

}
?>