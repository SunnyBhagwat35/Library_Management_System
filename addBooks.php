<?php
include("setting.php");
session_start();
if(!isset($_SESSION['aid']))
{
	header("location:admin.php");
}
$aid=$_SESSION['aid'];
$a=mysql_query("SELECT * FROM admin WHERE aid='$aid'");
$b=mysql_fetch_array($a);
$name=$b['name'];
$bn=$_POST['name'];
$au=$_POST['auth'];
if($bn!=NULL && $au!=NULL)
{
	$sql=mysql_query("INSERT INTO books(name,author) VALUES('$bn','$au')");
	if($sql)
	{
		$msg="Successfully Added";
	}
	else
	{
		$msg="Book Already Exists";
	}
}
?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Library Management System</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="banner">
<span class="head">Library Management System</span><br />
<marquee class="clg" direction="right" behavior="alternate" scrollamount="1">GVAIET</marquee>
</div>
<br />

<div align="center">
<div id="wrapper">
<br />
<br />

<span class="SubHead">Add Books in Library</span>
<br />
<br />
<form method="post" action="">
<table border="0" class="table" cellpadding="10" cellspacing="10">
<tr><td class="msg" align="center" colspan="2"><?php echo $msg;?></td></tr> 
<tr><td class="labels">Book : </td><td><input type="text" name="name" placeholder="Enter Book Name" size="25" class="fields" required="required"  /></td></tr>
<tr><td class="labels">Author : </td><td><input type="text" name="auth" placeholder="Enter Author Name" size="25" class="fields" required="required"  /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="ADD BOOK" class="fields" /></td></tr>
</table>
</form>
<br />
<br />
<a href="adminhome.php" class="link">Go Back</a>
<br />
<br />

</div>
</div>
</body>
</html>