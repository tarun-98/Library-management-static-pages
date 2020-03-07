<?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="db";
    $ptname="";
    $ptid="";
    $date="";
    $time="";
    $doctors="";
    $conn=new mysqli($servername,$username,$password,$dbname);
    function getposts()
    {
	    $posts=array();
	    $posts[0]=$_POST['ptname'];
	    $posts[1]=$_POST['ptid'];

	    return $posts;
    }
    if(isset($_POST['s']))
	{
		$data = getposts();

		$search_Query= "SELECT * FROM book WHERE id=$data[1]";
		$search_Result= mysqli_query($conn,$search_Query);

		if($search_Result)
		{
			if(mysqli_num_rows($search_Result))
			{
				while($row=mysqli_fetch_array($search_Result))
				{
					$ptname=$row['bname'];
					$ptid=$row['id'];
					$date=$row['author'];
					$time=$row['Genre'];
					$doctors=$row['price'];
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
				<h2>KLUNIVERSITY</h2>
			</div>
			<div class="navleft">
				<ul>
					<li><a class="active" href="search.php">Search</a></li>
					<li><a href="insert.html">insert</a></li>
					<li><a href="edit.php">edit</a></li>
					<li><a href="delete.php">delete</a></li>
					<li><a href="report.html">Report</a></li>
				</ul>
			</div>
			<div class="navright">
				<a href="homepage.html"><button>Log Out</button></a>
			</div>
		</div>

		<div class="loginBox">
			<form name="if" action="search.php" method="POST">
				<h2>Search Book</h2>
				<table>
					<tr>
						<td><span>Name of the Book</span></td>
						<td><span>:</span><input style="border-color: black; color:black; " type="text" name="ptname" value="<?php echo $ptname;?>"></td>
					</tr>
					<tr>
          <td><span>Book id</span></td>
						<td><span>:</span><input style="border-color: black;color:black;" type="text" name="ptid" value="<?php echo $ptid;?>"></td>
					</tr>
					<tr>
					<td><span>author</span></td>
						<td><span>:</span><input style="border-color: black;color:black;" type="text" name="date" value="<?php echo $date;?>"></td>
					</tr>
					<tr>
					<td><span>Genre</span></td>
						<td><span>:</span><input style="border-color: black;color:black;" type="text" name="time" value="<?php echo $time;?>"></td>
					</tr>

					<tr>
					<td><input type="submit" name="s" value="Search"></td>

					</tr>
				</table>

			</form>
		</div>

	</body>
</html>
