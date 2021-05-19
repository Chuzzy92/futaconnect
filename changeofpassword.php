<?php
include('header.php');
    require('session.php');
$res="";
$a=0;
include_once('connect.php');
if(isset($_POST["btnchange"]))
{

$result = mysql_query("UPDATE users SET password = '$_POST[password]'
WHERE email = '$_POST[emailid]'");

if($result == 1)
{
		$a=1;
		$res="Password Updated Successfully<br> <a href='login.php'> Click Here to Login</a>";
}
else
{
$res= "Wrong Email Id or Date of birth Entered";
}
}
?>
<html>
<head>
<title>Change of password</title>
</head>
<style type="text/css">
<!--
body {
	background-image: url(bg/bg3.jpg);
	background-repeat:repeat-x;
	background-color:#d9deeb;

}
-->
</style>
<script>
		!window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
	</script>
	<script type="text/javascript" src="./fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen" />
 	<link rel="stylesheet" href="style.css" />
<script type="text/javascript">
		$(document).ready(function() {
			
			
		$("a#example2").fancybox({
				'overlayShow'	: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic'
			});


			$("a[rel=example_group]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});

			
		});
   </script>	
<link href="errorlogin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<!--datepicker -->
<link href="css/datepicker/ui.datepicker.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="js/datepicker/ui.datepicker.js"></script>
<!--datepicker -->
<script type="text/javascript" charset="utf-8">
jQuery(function($){
$(".date").datepicker();
});
</script>

<body>
<div class="mainr">
<div class="topleft"><img src="img/LOGO5.png" width="280" height="100" /></div>
</div>
&nbsp;
&nbsp;
&nbsp;

<center>
<div class=container>

<div style="padding: 10px; text-align: left;">
<!-- body  content --><form id="form2" name="form2" method="post" action="">
<table cellpadding="10" width="100%" >
<tr>
	<td height="400" valign="top">
    
    <?php 
	if($a==1)
	{
		echo $res;
	}
	else
	{
	?>
    <table width="500" height="236" align="center" align="center" border="1">
<tr><td height="69" colspan="3"><div><strong><font size="+3">Type New password..!</font></strong></div></td>
  </tr>
  <tr >
    <td width="299" height="33"><div align="center">Email Id</div></td>
    <td width="513" colspan="2"><?php echo $_SESSION["emailidchngpass"];?> 
    <input type="hidden" name="emailid" value="<?php echo $_SESSION["emailidchngpass"];?>"  />
      &nbsp;</td>
  </tr>
  <tr>
    <td height="30"><div align="center">New password</div></td>
    <td colspan="2">
      <label for="textfield"></label>
      <input type="password" name="password" id="textfield" size="40"/>
  </td>
  </tr>
  <tr>
    <td height="24"><div align="center">Confirm password</div></td>
    <td colspan="2">
      <label for="textfield2"></label>
      <input name="cpassword" type="password" id="textfield2" size="40" />
    </td>
  </tr>
  <tr>
    <td colspan="3" align="center">

        <input type="submit" name="btnchange" id="button" value="Changepassword" />
 
    </td>
  </tr>
</table></form>
<?php
	}
	?>


   </td>
</tr>
</table>
 
</div>

<?php include('footer.php'); ?>