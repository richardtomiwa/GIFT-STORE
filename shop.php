<?php
//connect to db
require("db_config/db_connect.php");
require("templates/header.php"); 
$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);
$sqli = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
</head>
<body>
<section class="top-sellers">
    <ul class="products" id="test">
        <?php foreach ($sqli as $sql) {?>
            <li>
            <img src="product-images/<?php echo $sql["prod_image"] ?>" alt="twoboxes" class="giftbox">
            <h2 class="pname"> <?php echo $sql["prod_name"] ?> </h2>
            <p class="content"><span><?php echo $sql["prod_content"] ?></span> <span>more</span></p>
            <h3 class="pricing"> <span class="price">$<?php echo $sql["prod_price"] ?></span><a href="#" class="read-more">Read more</a></h3>

        </li>
       <?php } ?>
 
        </ul>
</section>
</body>
</html>