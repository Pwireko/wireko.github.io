<?php 
/*connect to Database */
 $con= mysqli_connect('localhost', 'root', '' );
 $db ='registration';

 //check db connection
 if($db === false){
     die("Error: connection error." .mysqli_connect_error());
    }
?>