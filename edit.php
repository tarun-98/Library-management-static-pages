<?php

    $conn=new mysqli("localhost","root","","db");
        if($conn->connect_error)
        {
            die("connection Failed".$conn->connect_error);
        }
        $sql="UPDATE book SET bname='$_POST[t2]',author='$_POST[t3]',Genre='$_POST[t4]',price='$_POST[t5]' WHERE id='$_POST[t1]'";
        if($conn->query($sql)===True)
        {

          header('Location: edit.html');
        }
        else
        {
          header('Location: edit.html');
        }

    $conn->close();
?>
