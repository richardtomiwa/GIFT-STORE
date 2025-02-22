<?php
//connect to db
require("db_config/db_connect.php");
require("templates/header.php"); 
$username=$_SESSION["name"] ?? "guest";
if(!isset($_SESSION["name"]) or $username=="guest"){
}else{
    $firstname=explode(" ", $_SESSION["name"]);
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <section class="season">
        <img src="assets/holidays-celebration-pretty-woman-celebrating-birthday-blowing-air-kiss-receive-gifts-flower.jpg"
            alt="" class="banner">
        <img src="assets/holidays-celebration-happy-birthday-girl-holding-gift-posing-near-party-helium-balloons-smil.jpg"
            alt="" class="banner">
        <h4>Capture <span class="hearts">HEARTS</span> this Valentine's Day with our exclusive gift event—indulge in
            <span class="romantic">ROMANTIC</span> offers and charming
            surprises that will make this love-filled season truly unforgettable!
        </h4>
        <a href="" class="buy">Shop</a>
    </section>


    <section class="top-sellers">
    <ul class="products" id="test">
        <li>
            <img src="assets/prepared-gifts-birthday.jpg" alt="twoboxes" class="giftbox">
            <h2 class="pname"> Love package </h2>
            <p class="content"><span>necklace</span> <span>perfume</span> <span>more</span></p>
            <h3 class="pricing"> <span class="price">$15</span><a href="#" class="read-more">Read more</a></h3>

        </li>
        <li>
            <img src="assets/gifts-with-different-sizes.jpg" alt="" class="giftbox">
            <h2 class="pname"> Honey package </h2>
            <p class="content"><span>necklace</span> <span>perfume</span> <span>more</span></p>
            <h3 class="pricing"> <span class="price">$15</span><a href="#" class="read-more">Read more</a></h3>
        </li>
        <li>
            <img src="assets/white-gift-boxes-with-red-ribbon.jpg" alt="" class="giftbox">
            <h2 class="pname"> Sweet package </h2>
            <p class="content"><span>necklace</span> <span>perfume</span> <span>more</span></p>
           <h3 class="pricing"> <span class="price">$15</span><a href="#" class="read-more">Read more</a></h3>
        </li>


        <li>
            <img src="assets/white-gift-boxes-with-red-ribbon.jpg" alt="" class="giftbox">
            <h2 class="pname"> Sweet package </h2>
            <p class="content"><span>necklace</span> <span>perfume</span> <span>more</span></p>
            <h3 class="pricing"> <span class="price">$15</span><a href="#" class="read-more">Read more</a></h3>
        </li>
    </ul>

    </section>

    <?php require("templates/footer.php"); ?>