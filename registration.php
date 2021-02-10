<?php
   // enter host, username, password and database below
  // localhost has no password, therefore it's blank
    $con = mysqli_connect('localhost','root','');
    $db = 'registration';

    if(!$con)
    {
        echo'Not connected';
    }

    if(mysqli_select_db($con, $db))
    {
        echo 'Database Selected';
    }

    $username = $_POST['username'];
    $ID = $_POST['ID'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (username,ID,email, password) VALUES ('$username','$ID','$email','$password')";

    if(!mysqli_query($con, $sql))
    {
       echo 'Not Inserted';
    } 
    else
       {
          echo 'Inserted';
       }

       header("refresh:2; url=dashboard.html");
?>