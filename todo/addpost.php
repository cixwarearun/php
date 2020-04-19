<?php 
 require ('config/config.php');
 require ('config/database.php');
if(isset($_POST['submit']))
{   
    $subject=mysqli_real_escape_string($conn,$_POST['subject']);
    $description=mysqli_real_escape_string($conn,$_POST['description']);
    $date=mysqli_real_escape_string($conn,$_POST['date']);
    $user_id=mysqli_real_escape_string($conn,$_POST['users_id']);
    $query = "INSERT INTO todos (subject,description,date,users_id) values ('$subject','$description','$date','$user_id')";
    if(mysqli_query($conn,$query))
    {
        header('Location: home.php');
    }else{
        echo 'ERROR: '. mysqli_error($conn);
    }
}

 ?>

<?php include 'inc/header.php'?>
     <div class="bg-black text-white w-1/4 p-8 mx-auto rounded overflow-hidden shadow-lg">     
        <h1 class="text-4xl text-center">Add Post</h1>
        <form  action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
        <!-- subject -->
          <div>
              <input class="block bg-transparent rounded-full text-xl p-4 border-2 w-full  border-red-700 outline-none text-center mt-4 mb-4"  type="text" name="subject" placeholder="subject" >
          </div>
          <!-- description -->
          <div>
              <textarea class="block bg-transparent rounded-full text-xl p-4 border-2 w-full  border-red-700 outline-none text-center mt-4 mb-4" type="text" name="description" placeholder="Description" ></textarea>
          </div>
          <!-- date -->
          <div>
              <input class="block bg-transparent rounded-full text-xl p-4 border-2 w-full  border-red-700 outline-none text-center mt-4 mb-4" type="date"  name="date" class="form-control" require >
          </div>
          <!-- user id -->
          <div> 
              <input placeholder="User_id" class="block bg-transparent rounded-full text-xl p-4 border-2 w-full  border-red-700 outline-none text-center mt-4 mb-4" type="number"  name="users_id"  require >
          </div>
          <!-- submit -->
          <div>
             <input class="bg-transparent outline-none overflow-hidden text-center text-gray-400 text-xl rounded-full text-xl border-2 w-full  border-red-700 hover:border-blue-700 p-4 " type="submit" name="submit" value="submit">
          </div>
          <div class="mt-8 flex justify-center ">
              <a class="bg-transparent outline-none overflow-hidden text-center text-gray-400 text-xl rounded-full text-xl border-2 w-full  border-red-700 hover:border-blue-700 p-4 " href="home.php">Exit</a>
          </div>
         
        </form>
     </div>
 <?php include 'inc/footer.php'?>
 