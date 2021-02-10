<?php
require_once "config.php";
require_once "session.php";
$error =''; 

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $ID = trim($_POST['ID']);
    $password = trim($_POST['password']);

    //validate if ID is empty
    if(empty($ID)) {
      $error .= '<p class="error">Please enter ID.</p>';
    }

    //validate if password is empty
    if(empty($password)) {
        $error .= '<p class="error">Please enter password.</p>';
    }

    if(empty($error)) {
            if($query= $db->prepare("SELECT * FROM users WHERE ID = ?")){
                $query->bind_param('s',$ID);
                $query->execute();
                $row = $query->fetch();

                if($row) {
                    if(password_verify($password,$row['password'])){
                        $_SESSION['ID'] = $row['ID'];
                        $_SESSION['user']= $row;
                        //redirect the user to dashboard
                        header("location:dashboard.html");
                        exit;
                    } else {
                        $error .= '<p class="error"> password not valid.</p>';

                    }
                } else {
                    $error .= '<p class="error">No User exit with that email address.</p>';
                }
            }$query->close();



    }
    //close connection
    mysqli_close($db);


  
}
?>