<?php
//connect to db
$conn=mysqli_connect("localhost","richard","2022/41544","amaterasu");

if(!$conn){
    echo "connection error".mysqli_connect_error();
}

//create your own database with users and products table
    //id, username, email, password for users table
    //id, product_name, product_description, price, product_image, product_content
?>
