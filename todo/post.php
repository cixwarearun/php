<?php
require('config/config.php');
require('config/database.php');
if (isset($_POST['delete'])) {
    $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);
    $query = "DELETE FROM todos where id = {$delete_id}";
    if (mysqli_query($conn, $query)) {
        header('Location: home.php');
    } else {
        echo 'ERROR: ' . mysqli_error($conn);
    }
}
//get id
$id = mysqli_real_escape_string($conn, $_GET['id']);

//select query
$query = 'SELECT *FROM todos where id=' . $id;


// get result
$result = mysqli_query($conn, $query);


//fetch data
$todo = mysqli_fetch_assoc($result);


//free result
mysqli_free_result($result);

//close connecton
mysqli_close($conn);
?>

<?php include 'inc/header.php' ?>

    <div class="   text-center ">
        <a class="bg-blue-700   text-white p-4  flex justify-center hover:bg-yellow-700" href="home.php">Home</a>
    </div>
    <div class="flex flex-col items-center ">

        <div class="w-2/4 bg-red-700 mt-2 text-white rounded overflow-hidden shadow-lg text-center p-8">
            <h1 class="text-5xl font-bold"><?php echo $todo['subject']; ?></h1>
            <div>
                Created on <?php echo $todo['date'] ?> 
            </div>
            <p class="text-xl"><?php echo $todo['description']; ?></p>
        </div>
    </div>
        <div>
            <div class="text-center mt-2 bg-green-700">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" name="delete_id" value="<?php echo $todo['id']; ?>">
                    <input class=" bg-transparent rounded-md text-white p-4 px-8 hover:bg-yellow-700" type="submit" name="delete" value="Delete">
                    <a class=" bg-transparent text-white p-4 px-8 ml-10  rounded-md  hover:bg-yellow-700" href="editpost.php?id=<?php echo $todo['id']; ?>">Edit</a>
                </form>
            </div>
        </div> 

    
    <?php include 'inc/footer.php' ?>