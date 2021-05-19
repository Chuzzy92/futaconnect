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
<head><title>search</title></head>

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
          <div id="m5" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
</a>
        
		</ul>
      <div style="clear:both"></div>
      <div style="clear:both"></div>
    </div>
  </div>
  
  </div>
  
<div class="right">
	
<div class="shoutout">

		  <div  class="bgg"><h3 id="h2">&nbsp;Search Result</h3></div>
		</br>
		  
		<?php
						if(isset($_POST['search'])){
							$search_term = $_POST['search'];
							 echo "<div style='float: left;padding: 5px 0px;width: 548px;'>";
							 echo "<h3 style='padding-bottom:0px;'></h3>";
							 searchusers($search_term);
							 echo "</div>";
						}
						
                        else{
                        if(isset($_GET['search'])){

                            $search_id = $_GET['search'];
	
	                        $search_query = "SELECT * FROM users WHERE user_keywords like '%search%'";
	
	                        $run_query = mysqli_query($con,$search_query);
	
	                        while ($search_row=mysqli_fetch_array($run_query)){
	
	                        echo "<li class='list-group-item'>";
	                        echo "<blockquote>";
	                        $user_id = $search_row['user_id'];
	                        $propic = $search_row['propic'];
	
?>

<center>
<h2>
<a href="friendprofile.php?id=<?php echo $user_id; ?>">
</a>
</h2>

<img src="images/<?php echo $propic; ?>" width="400" height="250">
</center>
<?php 
	echo "</blockquote>";
	echo "</li>";
       }
	} 
}
?>
	   
	</div>
</div>
 </div>
  
</body>
</html>
  