<?php 

    include "db.php";

    
    if (isset($_POST['izmjena'])) {

        $code=$_POST['code'];
        $name=$_POST['name']; 
        $price=$_POST['price'];
        $id = $_POST['id'];

        $sql = "UPDATE `products` SET `name`='$name',`price`='$price',`code`='$code' WHERE `id`='$id'"; 
        $result = $con->query($sql); 

        if ($result == TRUE) {

            echo 'Updated';
            header('Refresh: 1; URL=http://localhost/A/EC/ec/index.php');

        }else{

            echo "Error:" . $sql . "<br>" . $con->error;

        }

    } 

    if (isset($_GET['id'])) {
        $id = $_GET['id']; 

        $sql = "SELECT * FROM `products` WHERE `id`='$id' ";
        $result = $con->query($sql); 

        if ($result->num_rows > 0) {        
            while ($row = $result->fetch_assoc()) {

                $code=$row['code'];
                $name=$row['name']; 
                $price=$row['price'];
                $id = $row['id'];
            } 
?>

 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="add.css" />
  </head>
  <body>
    <h1>Add article:</h1>
    <div class="frame">
      <form autocomplete="off" method="post" class="forma">
      <input type="hidden" name="id" value="<?php echo $id; ?>">

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required value="<?php echo $name; ?>" />

        <label for="price">Price:</label>
        <input type="text" name="price" id="price" required value="<?php echo $price; ?>"/>

        <label for="code">Code:</label>
        <input type="text" name="code" id="code" required value="<?php echo $code; ?>" />

        <button type="submit" class="button" name="add" id="add">Save</button>
      </form>
    </div>
  </body>
</html>


<?php
    } else{ 

        header('Location: index.php');
    } 
}

?> 