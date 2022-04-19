<?php

session_start();
include('db.php');
$status="";

if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query(
$con,
"SELECT * FROM `products` WHERE `code`='$code'"
);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$code = $row['code'];
$price = $row['price'];
$image = $row['image'];
 
$cartArray = array(
 $code=>array(
 'name'=>$name,
 'code'=>$code,
 'price'=>$price,
 'quantity'=>1,
 'image'=>$image)
);
 
if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
}else{
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($code,$array_keys)) {
 $status = "<div class='box' style='color:red;'>
 Product is already added to your cart!</div>"; 
    } else {
    $_SESSION["shopping_cart"] = array_merge(
    $_SESSION["shopping_cart"],
    $cartArray
    );
    $status = "<div class='box'>Product is added to your cart!</div>";
 }
 
 }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
<div class="headder">
    <div class="logo">
      <h2>Ecommerce</h2>
    </div>
      <div class="navbar">
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Products</a></li>
        <li><a href="#">Account</a></li>
        <li><a href="/A/EC/ec/add.html">Add item</a>
        <li><a href="/A/EC/ec/cart.php"><img src="./images/cart-icon.png"/></a></li>
</li>
</ul>
</div>
</div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>
<br>
    

<h2 class="mobiles">Products</h2>  
<div class="center">
<div class='product_wrapper'>
<?php
$result = mysqli_query($con,"SELECT * FROM `products`");
while($row = mysqli_fetch_assoc($result)){
    
    echo "
    
    
    <div class='product-frame'>
    <div class='buttons'>
    <a  href='delete.php?id=" .$row['id']."'><img src='./images/del.svg'/></a> 
    <a  href='update.php?id=" .$row['id']."'><img src='./images/update.svg'/></a>
    </div>
    
    <form method='post' action=''>
    <input type='hidden' name='code' value=".$row['id']." />
    <input type='hidden' name='code' value=".$row['code']." />
    <div class='name'>".$row['name']."</div>
    <div class='price'>".$row['price']."$</div>
    <button type='submit' class='buy'>Add to Cart</button>
 
    </form>
    
    </div>";
        }
    
?>
  </div>
  </div>


<div style="clear:both;"></div>
 
<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>

</body>
</html>