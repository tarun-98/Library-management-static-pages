<?php

    $conn=new mysqli("localhost","root","","db");
        if($conn->connect_error)
        {
            die("connection Failed".$conn->connect_error);
        }
        $sql="insert into book(id,bname,author,Genre,price)values('$_POST[t1]','$_POST[t2]','$_POST[t3]','$_POST[t4]','$_POST[t5]')";
        if($conn->query($sql)===True)
        {
          
          header('Location: insert.html');
        }
        else
        {
          header('Location: insert.html');
        }

    $conn->close();
?>
