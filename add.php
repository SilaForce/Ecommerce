<?php

    include "db.php";
    
    $code=$_POST['code'];
    $name=$_POST['name']; 
    $price=$_POST['price']; 
   
    
    $sql = "INSERT INTO `products` (`id`, `name`, `price`, `code`) 
    VALUES (NULL, '$name', '$price', '$code')";

  $execute=mysqli_query($con,$sql);

  if($execute==true)
  {
    echo "<div>Product is added !</div>";
  }
  else{
    echo  "Error: " . $sql . "<br>" . mysqli_error($con);
  }
  header('Refresh: 1; URL=http://localhost/A/EC/ec/index.php');
?>
