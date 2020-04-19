<?php
// Creating new mysqli object and connecting
require('config/config.php');
require('config/database.php');


// Storing post data into variables
if (isset($_POST['sign-in'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Preparing Query
    $query = "SELECT * FROM users";

    // get result
    $result = mysqli_query($conn, $query);

    //fetch data
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //free result
    mysqli_free_result($result);

    //close connecton
    mysqli_close($conn);


    foreach ($users as $user) {
        if ($user['email'] == $email && $user['password'] == $password) {
            session_start();
            $_SESSION['id'] = $user['id'];
            header('Location: home.php');
        } else {

            echo 'ERROR: ' . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="tailwind.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class=" bg-black  rounded-md  w-1/4 text-white text-center mx-auto my-32 pt-4">
        <form class="p-10" action="" method="POST">
            <div>
                <input class="block bg-transparent rounded-full text-xl p-4 border-2 w-full  border-red-700 outline-none text-center mt-4 mb-4" type="text" name="email" placeholder="Enter your email" require>
            </div>
            <div>
                <input class="block bg-transparent rounded-full text-xl mb-10 p-4 border-2 w-full  border-red-700 outline-none text-center mt-4" type="password" name="password" placeholder="Password" require>
            </div>
            <div class=" pb-10">
                <button class="bg-transparent outline-none overflow-hidden text-center text-gray-400 text-xl rounded-full text-xl border-2 w-full  border-red-700 hover:border-blue-700 p-4 " ?>" name="sign-in">Login</button>
            </div>
            <div class=" pb-10">
                <a class="bg-transparent outline-none overflow-hidden text-center text-gray-400 text-xl rounded-full text-xl border-2 w-full  border-red-700 hover:border-blue-700 p-4 " href="createAccount.php">Create Account</a>
            </div>
        </form>
    </div>
</body>

</html>