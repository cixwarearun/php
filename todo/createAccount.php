<?php
require('config/config.php');
require('config/database.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $address = trim($_POST['address']);

    //firstName
    if (strlen($firstName) <= 0) {
        $errors['firstName'] = 'First Name field should be filled';
    } elseif (strlen($firstName) > 255) {
        $errors['firstName'] = 'First Name should not be more than 255 characters';
    }
    //lastName
    if (strlen($lastName) <= 0) {
        $errors['lastName'] = 'Last Name field should be filled';
    } elseif (strlen($lastName) > 255) {
        $errors['lastName'] = 'Last Name should not be more than 255 characters';
    }
    //email
    if (strlen($email) <= 0) {
        $errors['email'] = 'email field should be filled';
    } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
        $errors['email'] = 'Invalid Email';
    }

    //password
    if (strlen($password) <= 0) {
        $errors['password'] = 'Password field should be filled';
    } elseif (strlen($password) < 7) {
        $errors['password'] = 'Password should  be more than 6 characters';
    } elseif (!preg_match('/[0-9]+/', $password)) {
        $errors['password'] = 'One character should be a number';
    }

    //address
    if (strlen($address) <= 0) {
        $errors['address'] = 'Address field should be filled';
    } elseif (strlen($address) > 255) {
        $errors['address'] = 'Address should not be more than 255 characters';
    }
    if(!isset($errors)){
        $query = "INSERT INTO users (first_name,last_name,email,password,address) VALUES ('$firstName', '$lastName', '$email', '$password', '$address')";
        if ($conn->query($query) == true) {
            header('Location: success.php');
        } else {
            echo 'Error: ' . mysqli_error($con);
        }
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  
    <link rel="stylesheet" href="sty.css">
    <style>
        .exit:hover{
            color: red;
        }
    </style>
    

</head>

<body>
    <div id="main">

        <div class="form" style="padding: 20px;">
            <img src="image/ava.jpg" alt="avatar">
            <div id="arun">
                <h1>
                    <!-- <?php 
                    // if(isset($errors)){
                    //     echo '<small> There are/is '. count($errors). ' error(s) </small> ';
                    // }
                    ?> -->
                    Get Started
                </h1>
                <form method="POST">
                    <p>
                        <label for="user">First Name</label>
                        <input type="text" name="firstName" value="<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') echo $firstName; ?>" placeholder="Enter First Name" require>
                        <span style="color: red;">
                            <?php
                            if (isset($errors['firstName'])) {
                                echo $errors['firstName'];
                            }
                            ?>
                        </span>
                    </p>
                    <p>
                        <label for="user">Last Name</label>
                        <input type="text" name="lastName" placeholder="Enter Last Name" value="<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') echo $lastName; ?>" require>
                        <span style="color: red;">
                            <?php

                            if (isset($errors['lastName'])) {
                                echo $errors['lastName'];
                            }
                            ?>
                        </span>


                    </p>
                    <p>
                        <label for="user">Email</label>
                        <input type="text" name="email" value="<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') if ($_SERVER['REQUEST_METHOD'] == 'POST') echo $email; ?>" placeholder="www.email.com" require>
                        <span style="color: red;">
                            <?php
                            if (isset($errors['email'])) {
                                echo $errors['email'];
                            }
                            ?>
                        </span>


                    </p>
                    <p>
                        <label for="pass">Password</label>
                        <input style="display: block; width:100%; background:transparent; outline:none; border:none; color:white;   border-bottom: 1px solid red;" type="password" id="pass" name="password" value="<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') echo $password; ?>" placeholder="Enter Password" require>
                        <span style="color: red;">
                            <?php
                            if (isset($errors['password'])) {
                                echo $errors['password'];
                            }
                            ?>
                        </span>

                    </p>
                    <p>
                        <label for="user">Address</label>
                        <input type="text" name="address" value="<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') echo $address; ?>" placeholder="Enter Address" require>
                        <span style="color: red;">
                            <?php
                            if (isset($errors['address'])) {
                                echo $errors['address'];
                            }
                            ?>
                        </span>


                    </p>
                    <p>
                        <button type="submit" name="register">Sign UP</button>

                    </p>
                    <p style="text-align:center;">
                         <a class="exit" style="  height:30px; font-size:20px;  padding-top:5px; text-align: center; margin: 0 30px;  border-radius: 40px;" href="index.php">Exit</a>

                    </p>
                    
                     <p>
                        <a href="#">Lost your password?</a>
                        <a href="#">Don't have an account?</a>

                    </p> 
                </form>
            </div>
        </div>

    </div>



</body>

</html>