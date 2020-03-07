<?php
	$userName=$_POST["t1"];
	$password=$_POST["t2"];
	$login=$_SERVER['HTTP_REFERER'];

	if((!$userName) or (!$password))
	{
	header("Location:$login");
	exit();
	}
	$conn=@mysqli_connect("localhost","root","") or die("Cannot Connect");
	$rs=@mysqli_select_db($conn,"db") or die("DB ERROR");
	$sql="select * from user where userid=\"$userName\" and password=\"$password\"";
	$rs=mysqli_query($conn,$sql) or die ("Could not execute");
	$rows=mysqli_num_rows($rs);
	if($rows!=0)
	{
	header('Location: insert.html');
	}
	else
	{
	header("Location:$login");
	exit();
	}

?>
