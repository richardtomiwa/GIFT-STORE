<?php

require("db_config/db_connect.php");
require("oop.php");
if (isset($_POST["submit"])) {
    $valemail = htmlspecialchars($_POST["email"]);
    $valpassword = htmlspecialchars($_POST["password"]);
    $query = "SELECT * FROM users WHERE email='$valemail' AND password='$valpassword'";
    $result = mysqli_query($conn, $query);
    $sqli = mysqli_fetch_assoc($result);

    $validation = new Logininput($_POST);
    $errors = $validation->ValidateForm();

    if (!empty(array_values($errors))) {
    } else {
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
        $email = mysqli_real_escape_string($conn, $_POST["email"]);

        if (isset($sqli["email"]) && $email == $sqli["email"] && $password == $sqli["password"]) {
            session_start();
            $_SESSION["name"] = $sqli["name"];
            $_SESSION["id"] = $sqli["id"];
            $_SESSION["email"] = $sqli["email"];
            $_SESSION["age"] = $sqli["age"];
            $_SESSION["password"] = $sqli["password"];
            $_SESSION["gender"] = $sqli["gender"];
            $_SESSION["joined_at"] = $sqli["joined_at"];
            header("location:index.php");
            echo $sqli["password"];
        } else {


            $errors["email"] = "User does not exist";
        }
    }
}


?>



<!DOCTYPE html>
<html lang="en">

<?php require "templates/header.php" ?>

<div class="container">
    <form id="contact" method="POST" action=<?php echo $_SERVER["PHP_SELF"] ?>>
        <h3>Login Form</h3>
        <fieldset>
            <input name="email" placeholder="Your Email Address" type="text" tabindex="2" value="<?php echo !empty($_POST["email"]) ? htmlspecialchars($_POST["email"]) : '' ?>">
            <div class="error" aria-live="polite"><?php echo $errors["email"] ?? "" ?></div>
        </fieldset>
        <fieldset>
            <input name="password" placeholder="Your password" name="password" id="password" type="password"
                tabindex="3" value="<?php echo !empty($_POST["password"]) ? htmlspecialchars($_POST["password"]) : ''  ?>"><br>
            <div class="error" id="error-password" aria-live="polite"><?php echo $errors["password"] ?? "" ?></div>
        </fieldset>

        <a href="" class="forgot-password">Forgot password?</a>
        <input type="submit" name="submit" value="Submit">

    </form>
</div>
<?php require("templates/footer.php") ?>