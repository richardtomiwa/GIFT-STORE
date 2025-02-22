<?php 
session_start();
require("db_config/db_connect.php");
    $username=$_SESSION["name"] ?? "guest";
    if(isset($_SESSION["name"]) && $username==$_SESSION["name"]){
        $query2 = "DELETE FROM users WHERE name= '$username' ";
        if (mysqli_query($conn, $query2)){
            session_unset();
        } 
        }else{
        }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <div id="delete-profile">
<?php

?>

    </div>
</body>
</html>








