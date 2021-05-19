<?php
include('session.php');
$res="";
include_once('connect.php');
if(isset($_POST["btnrec"]))
{
$dat= "$_POST[year]-$_POST[month]-$_POST[date]";
$result = mysql_query("SELECT * FROM users
WHERE email='$_POST[txtemail]' AND dob='$dat'");
if(mysql_num_rows($result) == 1)
{
	$_SESSION["emailidchngpass"] = $_POST["txtemail"];
	header("Location: changeofpassword.php");
}
else
{
$res= "Wrong Email Id or Date of birth Entered";
}
}
?>
<html>
<head>
<title>Forgot Password</title>
</head>
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
	background-image: url(bg/bg3.jpg);
	background-repeat:repeat-x;
	background-color:#d9deeb;

}
-->
</style>
<link href="errorlogin.css" rel="stylesheet" type="text/css" />

<body>
<div class="mainr">
<div class="topleft"><img src="img/LOGO5.png" width="280" height="80" /></div>
</div>
<div class="font">
<!-- body  content --><form id="form2" name="form2" method="post" action="">

&nbsp;
&nbsp;
&nbsp;

<center>
<table cellpadding=10 width=100%>
<tr>
	<td height=400 valign=top><table width="75%" height="170" border="1"align="center">
	  <tr>
	    <td height="53" colspan="3" align="center"><div><strong><font size="+3">Recover password..!</font></strong><br /><b><font color="#FF0000"><?php echo $res; ?></font></b>
	    </div></td>
	    </tr>
	  <tr >
	    <td height="30"><div align="center">Email Id</div></td>
	    <td colspan="2">
	      <label for="textfield"></label>
	      <input name="txtemail" type="text" id="textfield" size="40" />
	     </td>
	    </tr>
	  <tr>
	    <td height="26"><div align="center">Date Of Birth</div></td>
	    <td colspan="2"><select name="date" >
	      <option>DD</option>
	      <?php
for($i=1; $i<= 31; $i++)
{
echo "<option value='$i'>$i</option>";
}
?>
	      </select>
          <select name="month">
            <option>Month</option>
            <option value="01">Jan</option>
            <option value="02">Feb</option>
            <option value="03">Mar</option>
            <option value="04">Apr</option>
            <option value="05">May</option>
            <option value="06">Jun</option>
            <option value="07">Jul</option>
            <option value="08">Aug</option>
            <option value="09">Sep</option>
            <option value="10">Oct</option>
            <option value="11">Nov</option>
            <option value="12">Dec</option>
          </select>
          <select name="year">
            <option>Year</option>
            <?php
for($i=1960; $i< 2020; $i++)
{
echo "<option value='$i'>$i</option>";
}
?>
          </select></td>
	    </tr>
	  <tr>
	    <td height="49" colspan="3" align="center" valign="middle">

	        <input type="submit" name="btnrec" id="button" value="Recover password" />

	      </td>
	    </tr>
	  </table></form></td>
</tr>
</td></td></td></td></td>
</table>

</div>
<?php include('footer.php'); ?>