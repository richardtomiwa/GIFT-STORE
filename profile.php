<?php 
require("templates/header.php") ;
require("db_config/db_connect.php");
    $username=$_SESSION["name"] ?? "guest";
    if(isset($_SESSION["name"]) && $username==$_SESSION["name"]){
    $query = "SELECT * FROM users WHERE name='$username'";
    $result = mysqli_query($conn, $query);
    $sql = mysqli_fetch_assoc($result);
    }else{
        $sql=["name"=>"guest"];
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

<div id="data">
    <li><?php echo $sql["name"]??"a" ?></li>
    <li><?php echo $sql["email"]??"a" ?></li>
    <li><?php echo $sql["password"]??"a" ?></li>
    <li><?php echo $sql["age"]??"a" ?></li>
    <li><?php echo $sql["gender"]??"a" ?></li>
    <li><?php echo $sql["joined_at"]??"a" ?></li>

    </div>

    <div id="delete-data">
    <input type="button" value="click to delete data" id="btn-del">
    </div>

<div id="test">
    
</div>

    <script src="scripts/jquery.js"></script>
    <script>

        $(document).ready(function(){
            $("#btn-del").click(function(){
                $("#delete-data").load("data-del.php")
                window.location.href="login.php";
            });
        });


        $(document).ready(function(){
            $(window).scroll(function(){
                $("#test").load("test.php");
               
            });
        });
    </script>
</body>
</html>









<?php require("templates/footer.php") ?>