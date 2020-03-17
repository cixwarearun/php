<?php
$conn= mysqli_connect('localhost','root','','todo_db');
$sql = 'SELECT * FROM todos';
  // Executing query
 $result =$conn->query($sql);  
 // Getting Result
$row = $result->fetch_assoc();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            margin: auto;
            margin-top:30px;
            width:100%;
            text-align: center;
            border-color: red;

        }
     .td{
         color:red;
         padding: 10px;
         
         
     }
    </style>
</head>
<body>
    <table border="1">
       
           <?php
           
           while($row= mysqli_fetch_assoc($result))
           {
            echo '<tr>';
               foreach($row as $r)
              
              echo '<td class=td>'. $r .'</td>';
              echo '</tr>';     
                      
           }
           ?>
        
    </table>
</body>
</html>