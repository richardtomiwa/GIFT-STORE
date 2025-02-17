<?php
//connect to db
$conn=mysqli_connect("localhost","richard","2022/41544","amaterasu");

if(!$conn){
    echo "connection error".mysqli_connect_error();
}


?>