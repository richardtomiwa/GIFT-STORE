<?php 

require("db_config/db_connect.php");
$errors=["prod-name"=>"", "prod-desc"=>"", "prod-price"=>"","prod-content"=>"","image"=>""];
if (isset($_POST["submit"])) {
    if (empty($_POST["prod-name"])) {
        $errors["prod-name"] = "name cannot be empty";
    } else {
        $errors["prod-name"]="";
    }

    if (empty($_POST["prod-desc"])) {
        $errors["prod-desc"] = "product description cannot be empty";
    } else {
        if( strlen($_POST["prod-desc"])>255) {
            $errors["prod-desc"] = "product description cannot be longer than 255 words";
        };
    }


    if ($_POST["prod-price"]<0.1) {
        $errors["prod-price"] = "product price cannot be empty";
    } else {
        
    }

    if (empty($_POST["prod-content"])) {
        $errors["prod-content"] = "product content cannot be empty";
    } else {

    }

    if (isset($_FILES["image"])){
        if($_FILES["image"]["error"]>0){
            $errors["image"]="image cannot be empty";
        }else{
            $filename=$_FILES["image"]["name"];
            $filesize=$_FILES["image"]["size"];
            $tmpname=$_FILES["image"]["tmp_name"];
            $validimgext=["jpg", "png", "jpeg"];
            $imgext=explode(".",$filename);
            $imgext=strtolower(end($imgext));
            if(!in_array($imgext,$validimgext)){
                $errors["image"]="select a valid image type";
            }else{
                if($filesize>500000){
                    $errors["image"]="file size too large";
                  
                }else{
                    if (!array_filter($errors)) {
                    $prod_name=htmlspecialchars($_POST["prod-name"]);
                    $prod_desc=htmlspecialchars($_POST["prod-desc"]);
                    $prod_price=htmlspecialchars($_POST["prod-price"]);
                    $prod_content=htmlspecialchars($_POST["prod-content"]);
                    $newimgname=uniqid();
                    $newimgname .= "." . $imgext;
                    move_uploaded_file($tmpname, "product-images/".$newimgname);
                    $query = " INSERT INTO products (prod_name, prod_desc, prod_price, prod_content, prod_image) VALUES('$prod_name','$prod_desc', '$prod_price', '$prod_content', '$newimgname' )";
                    mysqli_query($conn, $query);
                    }
                }
            }

        }
    }else{

    }



    if (array_filter($errors)) {

    } else {
        //CONVERT POST DATA TO VARIABLES AND PROTECT YOUR DATABASE FOR SQL INJECTIONS
        //UPLOAD TO DATABASE

        //    redirect to login page 
        //    header("location: login.php");

    };

    // $valemail = htmlspecialchars($_POST["email"]);
    // $query = "SELECT * FROM users WHERE email='$valemail' ";
    // $result = mysqli_query($conn, $query);
    // $sqli = mysqli_fetch_assoc($result);

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
<?php require "templates/header.php" ?>

<div class="container">
    <form id="contact" method="POST" action=<?php echo $_SERVER["PHP_SELF"] ?> enctype="multipart/form-data">
        <h3>Product Upload</h3>
        <fieldset>
            <input name="prod-name" placeholder="Your product name" type="text" tabindex="2" value="">
            <div class="error" aria-live="polite"><?php echo $errors["prod-name"] ?? "" ?></div>
        </fieldset>
        <fieldset>
            <input name="prod-desc" placeholder="Product description"  id="product-desc" type="text"
                tabindex="3" value="">
                <div class="error" aria-live="polite"><?php echo $errors["prod-desc"] ?? "" ?></div>

        </fieldset>

        <fieldset>
            <input name="prod-price" placeholder="Product Price"  id="product-price" type="number"
                tabindex="3" value=""><br>
                <div class="error" aria-live="polite"><?php echo $errors["prod-price"] ?? "" ?></div>

        </fieldset>

        <fieldset>
            <input name="prod-content" placeholder="Product Content"  id="product-content" type="text"
                tabindex="3" value=""><br>
                <div class="error" aria-live="polite"><?php echo $errors["prod-content"] ?? "" ?></div>

        </fieldset>

        <fieldset>
            <input name="image" placeholder="Product Image"  id="image" type="file"
                tabindex="3" value="" accept="jpg,jpeg,png"><br>
                <div class="error" aria-live="polite"><?php echo $errors["image"] ?? "" ?></div>

        </fieldset>
        <input type="submit" name="submit" value="Submit">

    </form>
</div>
<?php require("templates/footer.php") ?>
</body>
</html>