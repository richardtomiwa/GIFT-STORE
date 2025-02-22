<?php session_start();
$firstname=explode(" ", $_SESSION["name"]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>

    :root{
        --nav-color:#f3f3f3;
        --accent:#000;
        --background:#0c0c0c;
    }

::-webkit-scrollbar{
    display: none;
}

    * {
        margin: 0;
        padding: 0;
        text-rendering: optimizeLegibility;
    }

    body {
        font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-weight: 100;
        font-size: 12px;
        line-height: 50px;
        color: white;
        background: var(--background);
        max-width: 100vw;
        
    }

    div#navbar {
        color: black;
        background-color: var(--nav-color);
        font-size: 16px;
        font-weight: bold;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
        margin-bottom: 0;
    }

    ul#right-nav {
        list-style: none;
        display: flex;
        justify-content: end;
        max-width: 400px;
        width: 100%;
    }

    ul#right-nav>li {
        margin-left: 5%;
        transition: all 0.3s;
    }

    ul#right-nav>li>a.active-link {
        border-bottom:2px solid var(--accent);
        color: black;
        border-radius: 0px;
    }

    ul#right-nav>li>a:hover,
    ul#right-nav>li>a.active-link:hover {
        background-color: var(--accent);
        border-radius: 5px;
        border: 0px;
        color: #FFF;
        transition: all 0.3s;
    }

    ul#right-nav:has(li>a:hover) li>a:not(:hover),
    ul#right-nav:has(li:hover) li:not(:hover){
        transition: all 0.3s;
        color: grey;
        border-color: grey;
        scale: 0.8;
    }




    ul#right-nav>li>a {
        color: black;
        text-decoration: none;
        padding: 5px;
        border-radius: 5px;
        transition: all 0.3s;
    }


    .container {
        max-width: 600px;
        width: 100%;
        margin:auto ;
        margin-top: 30px;
        padding-top: 20px;
        padding-bottom: 20px;
        max-height: 800px;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-color: white;
        color: black;
        border-radius: 5px;
    }


    #contact {
        background: #fff;
        color: #000;
        border-radius: 5px;
        display: flex;
        flex-direction: column;
        max-width: 90%;
        width: 70%;
        justify-content: center;
        align-items: center;
    
    }

    #contact h3 {
        display: block;
        font-size: 30px;
        font-weight: 300;
        text-align: center;
    }

    #contact h4 {
        margin: 5px 0 15px;
        display: block;
        font-size: 13px;
        font-weight: 400;
        text-align: center;
    }

    fieldset {
        border: medium none !important;
        margin: 0 0 10px;
        min-width: 100%;
        padding: 0;
        width: 100%;
    }

    #contact input[type="text"],
    #contact input[type="email"],
    #contact input[type="password"],
    #contact input[type="number"],
    #contact textarea,
    #contact select {
        width: 100%;
        border: 1px solid #ccc;
        background: #FFF;
        margin: 0 0 5px;
        padding: 10px;
        border-radius: 5px;
    }

    #contact input[type="text"]:hover,
    #contact input[type="email"]:hover,
    #contact input[type="number"]:hover,
    #contact input[type="password"]:hover {
        -webkit-transition: border-color 0.3s ease-in-out;
        -moz-transition: border-color 0.3s ease-in-out;
        transition: border-color 0.3s ease-in-out;
        border: 1px solid #aaa;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }


    #contact input[type="submit"] {
        cursor: pointer;
        width: 60%;
        border: none;
        background: #000;
        color: #FFF;
        margin: 0 0 5px;
        padding: 10px;
        font-size: 15px;
        border-radius: 5px;
    }

    #contact input[type="submit"]:hover {
        background: #1a1919;
        -webkit-transition: background 0.3s ease-in-out;
        -moz-transition: background 0.3s ease-in-out;
        transition: background-color 0.3s ease-in-out;
    }

    #contact input[type="submit"]:active {
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
    }



    #contact input:focus{
        outline: 0;
        border: 1px solid #aaa;
    }

    ::-webkit-input-placeholder {
        color: #888;
    }

    :-moz-placeholder {
        color: #888;
    }

    ::-moz-placeholder {
        color: #888;
    }

    :-ms-input-placeholder {
        color: #888;
    }

    #error-password,
    #error-cpassword,
    #error-age,
    #error-name {
        width: 100%;
        font-size: 80%;
        color: #900;
    }


    div.error{
        width: 100%;
        font-size: 80%;
        color: #900;
    }

    #contact input.valid:focus{
        outline: 0;
        border: 1px solid green;
    }

    #contact input.invalid:focus{
        outline: 0;
        border: 1px solid red;
    }


    section.season{
        max-width: 100vw;
        width: 100%;
        position: relative;
        color: darkgrey;
        padding: 0;
        height: 511px;
        display: flex;
    }
    section.season>img.banner{
        max-width: 100%;
        filter:brightness(0.5) blur(7px);
        width: 50%;
        height: 511px;
        margin: 0px;
    }

    section.season>h4{
        position: absolute;
        font-size: 2vw;
        top: 25%;
        right:5px ;
        width: 50%;

    }

    a.buy{
        position: absolute;
        font-size: 2vw;
        bottom: 15%;
        right:5px ;
        width: 10%;
        color: white;
        border: 2px solid var(--accent);
        border-radius:5px ;
        padding: 5px;
        text-align: center;
        text-decoration: none;
        transition: all 0.3s;

        border-radius: 20px;
    }

    a.buy:hover{
        transition: all 0.3s;
        background: var(--accent);
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        scale: 1.05;
    }


    span.hearts{
        color: red;
    }

    span.romantic{
        color: white;
    }

    img.giftbox{
        width: 100%;
        min-height:209.64px;
        border-radius: 25px 25px 0px 0px;

    }

    h2.pname{
        font-weight: bold;
        font-size: 20px;
        font-family:Helvetica;
    }
section.top-sellers{
    margin-top: 20px;
}
    section.top-sellers>ul.products{
        display: flex;
        justify-content: center;
        padding: 20px 10px 20px 10px;
        flex-wrap: wrap;
        gap:10px ;
    }

    section.top-sellers>ul.products>li{
        width: 290px;
        max-width: 500px;
        max-height: 389px;
        border: 2px solid white;
        border-radius: 25px;
        background: var(--nav-color);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: black;
        transition: all 0.3s;

    }
    section.top-sellers>ul.products>li:hover{
        scale: 1.03;
    }

    section.top-sellers>ul.products:has(li:hover) li:not(:hover){
        transition: all 0.3s;
        filter: brightness(0.5) ;
        scale: 0.97;
    }

    p.content>span:nth-of-type(odd){
        background-color: red;
        color: white;
        padding: 3px;
        border-radius:10px ;
        font-family: georgia;
    }

    p.content>span:nth-of-type(even){
        background-color:black;
        color: white;
        padding: 3px;
        border-radius:10px ;
        font-family: georgia;
    }

    h3.pricing{
        display: flex;
        justify-content: space-between;
        width: 90%;
        padding: 10px;
        align-items: center;
    }

    h3.pricing>span{
        font-weight: Bold;
        font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
        font-size: 17px;
        padding: 5px 10px 5px 10px;
    }

    a.read-more{
        color:black;
        text-decoration: none;
        font-size: 15px;
        background: black;
        color: white;
        border-radius: 20px;
        padding: 5px 10px 5px 10px;
    }

    footer{
        display: flex;
        padding: 20px;
        margin: 10px;
        justify-content: space-evenly;
        align-items: center;
        color: white;
        font-size: 15px;
        text-align: center;
    }

    ul{
       list-style: none;
    }

    footer>ul>li>a,
    footer>h2>a{
        color: white;
        text-decoration: none;
    }

    footer>ul>li{
        position: relative;
    }

    footer>ul>li::after{
        content: "";
        height: 2px;
        background-color: var(--accent);
        width:0px ;
        position: absolute;
        left: 0;
        bottom: 0;
        transition: width 0.3s;
    }


    footer>ul>li:hover:after{
        width: 100%;
        
    }

    p>a{
        color: var(--accent);
        text-decoration: none;
    }


    </style>
</head>

<body>

    <div id="navbar">
        <p><a href="index.php">AMATERASU</a></p>
        <ul id="right-nav">
            <li><a href="/php/index.php">Home</a></li>
            <li><a href="">About</a></li>
            <li><a href="/php/sign-up.php">Sign-up</a></li>
            <li><a href="/php/profile.php"><?php echo end($firstname)?? "Profile"?></a></li>
        </ul>
    </div>