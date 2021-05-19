
<html>
<head>
<title>Login</title>
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
<div class="topleft"><img src="img/LOGO5.png" width="280" height="90" /></div>
</div>
<div class="bi">
</div>  
<div class="font">
<div class="right">
<form action="login.php" method="post">

<hr>
<table>
<tr>
<td>Username:</td><td><input type="text" name="UserName" class="textright" value=""/></td>
</tr>
<tr>
<td>Password:</td><td><input type="password" name="Password" class="textright" value=""/></td>
</tr>
<tr>
<td></td><td><input type="submit" class="greenButton" name="OK" value="Login"/><a href="index.php" class="t"> or sign up for futaConnect</a> </td>
</tr>

 </table>
</form>
</div>
</div>
</body>
</html>
 