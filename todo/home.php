

<?php 
 require ('config/config.php');
 require ('config/database.php');

 session_start();
 $query = 'SELECT *FROM todos WHERE users_id ='.$_SESSION['id'];
 // get result
 $result = mysqli_query($conn, $query);
 //fetch data
 $todos =mysqli_fetch_all($result, MYSQLI_ASSOC);
 //free result
 mysqli_free_result($result);
 //close connecton
 mysqli_close($conn);
 ?>
<?php include 'inc/header.php'?>
<div class="text-white" >
     <div >     
        <h1 class="text-center bg-blue-700 text-5xl ">Todos</h1>
        <div class="bg-green-700 text-xl  p-2 text-center">
                 <a class="p-2 rounded hover:bg-yellow-700" href="addpost.php">Add Post</a>
                 <a class="p-2 rounded hover:bg-yellow-700" href="index.php">Log Out</a>
        </div>
      <?php  foreach($todos as $todo) : ?>
      <div class="mt-8 flex justify-center">
                <div class="w-2/4 bg-red-700 rounded overflow-hidden shadow-lg text-center mb-4 p-10">
                    <h1 class="text-5xl"><?php echo $todo['subject']; ?></h1>
                    <div >
                        Created on <?php echo $todo['date']?> 
                   </div>
                    <p class="mb-8 text-xl"><?php echo $todo['description']; ?></p>
                    <a class="bg-blue-700 p-2 rounded hover:bg-yellow-700" href="post.php?id=<?php echo $todo['id'];?> ">Read More</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
 <?php include 'inc/footer.php'?>