<?php

    $conn=new mysqli("localhost","root","","db");
    $Name=$_POST["t1"];

        if($conn->connect_error)
        {
            die("connection Failed".$conn->connect_error);
        }
        $sql="DELETE FROM book WHERE bname=\"$Name\"";

        if($conn->query($sql)===True)
        {

          header('Location: delete.html');
        }
        else
        {
          echo "correct your code";
        }

    $conn->close();
?>
