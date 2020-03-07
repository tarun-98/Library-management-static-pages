<?php
    $t1="";
    $t2="";
    $conn = new mysqli("localhost","root","","db");
    function getposts()
    {
	    $posts=array();
	    $posts[0]=$_POST['t1'];
	    $posts[1]=$_POST['t2'];
	    return $posts;
    }
    if(isset($_POST['s']))
	{
		$data = getposts();

		$search_Query= "SELECT * FROM book WHERE t2=$data[1]";
		$search_Result= mysqli_query($conn,$search_Query);

		if($search_Result)
		{
			if(mysqli_num_rows($search_Result))
			{
				while($row=mysqli_fetch_array($search_Result))
				{
					$cname=$row['t1'];
					$cid=$row['t2'];
				}

			}


			else {
				echo "no data";
			}
		}
		else
		{
			echo "result error";
		}
	}
	if(isset($_POST['r']))
{

$sql= "DELETE FROM book WHERE t2=$_POST[t2]";
mysqli_query($conn,$sql);
}
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Homepage</title>
		<link rel="stylesheet" href="login.css">
	</head>
	<body>
		<div class="nav">
			<div class="logo">
				<img src="logo1.png">
				<h2>KL University</h2>
			</div>
			<div class="navleft">
				<ul>
					<li><a href="search.php">Search</a></li>
					<li><a href="insert.html">Insert</a></li>
					<li><a href="edit.html">Edit</a></li>
					<li><a class="active" href="delete2.php">Delete</a></li>
					<li><a href="report.html">Report</a></li>
				</ul>
			</div>
			<div class="navright">
				<a href="homepage.html"><button>Log Out</button></a>
			</div>
		</div>
		<div class="loginBox">

			<h2>Enter Book Record</h2>
			<form name="f" action="delete.php" method="POST" >
				<table style="float: left;">
					<tr>
						<td>
							<p style="color:black">Book Name:</p></td>
							<td>
							<input id="inp1" type="text" style="border-color: black;" name="t1" placeholder="Enter bookname" required></td>
					</tr>
					<tr>
						<td>
							<p style="color:black">Book ID:</p></td>
							<td>
							<input type="text"  id="inp2" style="border-color: black;" name="t2" placeholder="Enter BookID" required>
						</td>
					</tr>

					<tr>
						<td>
							<input  type="submit" name="" value="Done">
						</td>

					</tr>
				</table>

			</form>


	</body>
</html>
