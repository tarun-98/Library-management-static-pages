<?php
$firstname=$_POST["fname"];
$lastname=$_POST["lname"];
$email=$_POST["emailid"];
$username=$_POST["t1"];
$password=$_POST["t2"];
$conn=new MYSQLi("localhost","root","","db");
if($conn){
	echo "connected succesfully";
}
$sql="insert into user(name,userid,email,uname,password) values('$firstname','$lastname','$email','$username','$password')";
$conn->query($sql);
$conn->close();
echo "success";
 ?>
