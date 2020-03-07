<?php

define('DB_HOST', '127.0.0.1::8080');
define('DB_NAME', 'db');
define('DB_USER','root');
define('DB_PASSWORD','');

$con=@mysqli_connect("DB_HOST","DB_ROOT","DB_PASSWORD")or die("Failed to connect to MySQL: " .mysqli_error());
$db=@mysqli_select_db($con,DB_NAME) or die("Failed to connect to MySQL: " .mysqli_error());


function NewUser()
{
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $email = $_POST['emailid'];
    $userName = $_POST['t1'];
    $password = $_POST['t2'];
    $query = "INSERT INTO user (name,userid,email,uname,password) VALUES ('$firstName','$lastName','$email','$userName','$password')";
    $data = mysql_query ($query) or die("Query Not Executed :" .mysqli_error());
    if($data)
    {
    echo "YOUR REGISTRATION IS COMPLETED...";
    }
}

function SignUp()
{
if(!empty($_POST['t1']))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
{
    $query = mysql_query("SELECT * FROM user WHERE uname = '$_POST[t1]' AND password = '$_POST[t2]'") or die(mysqli_error());

    if(!$row = mysql_fetch_array($query) or die(mysqli_error()))
    {
        NewUser();
    }
    else
    {
        echo "SORRY...YOU ARE ALREADY REGISTERED USER...";
    }
}
}
if(isset($_POST['s']))
{
    SignUp();
}
?>
