<?php 

include "db.php"; 

if (isset($_GET['id'])) {
    define('CSS_PATH', 'styles.css'); //define CSS path 


    $id = $_GET['id'];
    
    $sql = "DELETE FROM `products` WHERE `id`='$id'";

     $result = $con->query($sql);

     if ($result == TRUE) {

        echo "<div>Product is deleted!</div>";

    }else{

        echo "Error:" . $sql . "<br>" . $con->error;

    }
    header('Refresh: 1; URL=http://localhost/A/EC/ec/index.php');
} 

?>