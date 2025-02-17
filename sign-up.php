<?php
require("db_config/db_connect.php");
require("oop.php");
if (isset($_POST["submit"])) {
    $valemail = htmlspecialchars($_POST["email"]);
    $query = "SELECT * FROM users WHERE email='$valemail' ";
    $result = mysqli_query($conn, $query);
    $sqli = mysqli_fetch_assoc($result);

    $validation = new UserValidator($_POST);
    $errors = $validation->ValidateForm();

    if (!empty(array_values($errors))) {
    } else {
        $name = mysqli_real_escape_string($conn, $_POST["name"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $age = mysqli_real_escape_string($conn, $_POST["age"]);
        $gender = mysqli_real_escape_string($conn, $_POST["gender"]);

        if ($email == $sqli["email"]) {
            $errors["email"] = "Email already registered";
        } else {
            $sql = "INSERT INTO users(name,email,password,age, gender) VALUES('$name','$email', '$password', '$age', '$gender')";
            if (mysqli_query($conn, $sql)) {
                header("location:index.php");
            } else {
                echo "query error:" . mysqli_error($conn);
            }
        }
    }
}


?>



<!DOCTYPE html>
<html lang="en">

<?php require "templates/header.php" ?>

<div class="container">
    <form id="contact" method="POST" action=<?php echo $_SERVER["PHP_SELF"] ?>>
        <h3>AMATERASU Form</h3>
        <h4>fill all required area</h4>
        <fieldset>
            <input name="name" id="name" placeholder="Your full name" type="text" value="<?php echo !empty($_POST["name"]) ? htmlspecialchars($_POST["name"]) : '' ?>" tabindex="1" autofocus>
            <div class="error" aria-live="polite" id="error-name"><?php echo $errors["name"] ?? "" ?></div>
        </fieldset>
        <fieldset>
            <input name="email" placeholder="Your Email Address" type="text" tabindex="2" value="<?php echo !empty($_POST["email"]) ? htmlspecialchars($_POST["email"]) : '' ?>">
            <div class="error" aria-live="polite"><?php echo $errors["email"] ?? "" ?></div>
        </fieldset>
        <fieldset>
            <input name="password" placeholder="Your password" name="password" id="password" type="password"
                tabindex="3" value="<?php echo !empty($_POST["password"]) ? htmlspecialchars($_POST["password"]) : ''  ?>"><br>
            <div class="error" id="error-password" aria-live="polite"><?php echo $errors["password"] ?? "" ?></div>
        </fieldset>
        <fieldset>
            <input name="confirm-password" placeholder="confirm password" name="confirm-password"
                id="confirmpassword" type="password" tabindex="4" value="<?php echo !empty($_POST["confirm-password"]) ? htmlspecialchars($_POST["confirm-password"]) : '' ?>">
            <div id="error-cpassword" class="error" aria-live="polite"></div>
        </fieldset>
        <fieldset>
            <input placeholder="age" name="age" type="number" tabindex="5" id="age" value="<?php echo !empty($_POST["age"]) ? htmlspecialchars($_POST["age"]) : '' ?>">
            <div id="error-age" class="error" aria-live="polite"><?php echo $errors["age"] ?? "" ?></div>
        </fieldset>
        <fieldset>
            <label for="">Gender:</label>
            <input placeholder="gender" name="gender" type="radio" value="male" tabindex="6" id="gender_male"
                required><label for="male">&nbsp;Male</label>
            <input placeholder="gender" name="gender" type="radio" value="female" tabindex="6" id="gender_female"
                required><label for="female">&nbsp;Female</label>
            <div id="error-gender" aria-live="polite"></div>
        </fieldset>


        <input type="submit" name="submit" value="Submit">

    </form>
</div>
<script src="scripts/script.js"></script>
<?php require("templates/footer.php") ?>