<?php

session_start();
if($_SESSION['is_login']){
    $rEmail=$_SESSION['rEmail'];
}else{
    echo "<script> location.href='login.php'</script>";
}

require_once ('../connection.php');

$regmsg;
if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["product_id"] == $_GET['id']){
            $sql = "DELETE FROM `cart` WHERE mid = {$_GET['id']}";
            if($conn->query($sql) == TRUE){
              unset($_SESSION['cart'][$key]);
            echo'<div class="alert alert-primary mt-2" role="alert">Product Removed Successfully..</div>';
              echo "<script>window.location = 'cart.php'</script>";
          }
        }
      }
  }
}
if (isset($_POST['save'])){
    echo "<script>window.location = 'order.php'</script>";
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-light">

<?php require_once ('php/header.php');?>

<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
            <div class="row ">
               <a href="order.php" ><button type="submit" class="btn btn-primary "><i class="fas fa-arrow-alt-circle-left">&nbsp;</i>Go Back..</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               <h5> My Cart</h5>
            </div>
                <hr>

                <?php
                $qty=0;
                $total_p = 0; 
                $total = 0;
                $p_id = 0;
                $price = 0;
                if (isset($_SESSION['cart'])){
                $sql = "SELECT * FROM `menu`";
                $result= $conn->query($sql);
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                    foreach ($_SESSION['cart'] as $a){
                        if ($row['id'] == $a['product_id']){
                            $p_id = $a['product_id'];
                            $price = $row["price"];
                            $qty = $a['qty'];
                            $total_p =(int)$row["price"]*$qty ;
                            echo '<form action="cart.php?action=remove&id='.$row["id"].'" method="post" class="cart-items">
                            <div class="border rounded">
                            <div class="row bg-white">
                            <div class="col-md-3 pl-0">
                            <img src="'.$row["image"].'" alt="Image1" class="img-fluid">
                            </div>
                            <div class="col-md-5">
                            <h5 class="pt-2">'.$row["name"].'</h5>
                            
                            <h5 class=""><b>RS.'.$price.'</b></h5>
                            <p class="">Qty:'.$qty.'</p>
                            <p class=""><b>Total:'.$total_p.'</b></p>
                            </div>
                            <div class="col-md-4 pt-5">
                            <button type="submit" class="btn btn-primary " name="save">Add More</button>
                            <button type="submit" class="btn btn-danger " name="remove">Remove</button>
                            </div>
                            </div>
                            </div>
                        </form>';
                        $total = $total + (int)$row['price']*$a['qty'];
                        }
                        }
                    }
                  }
            
                }else{
                    echo "<h5>Cart is Empty</h5>";
                }
           ?>
        </div>
        </div>
    <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
    <div class="pt-4">
    <h6>PRICE DETAILS</h6>
    <hr>
    <div class="row price-details">
        <div class="col-md-6">
            <?php
                if (isset($_SESSION['cart'])){
                    $count  = count($_SESSION['cart']);
                    echo "<h6>Price ($count items)</h6>";
                }else{
                    echo "<h6>Price (0 items)</h6>";
                }
            ?>
            <h6>Delivery Charges</h6>
            <hr>
            <h6>Amount Payable</h6>
        </div>
        <div class="col-md-6">
            <h6>RS.<?php echo $total; ?></h6>
            <h6 class="text-success">Free</h6>
            <hr>
            <form action="checkout.php" method="post">
            <h6>RS.<?php echo $total; ?></h6>
                <input type="hidden" name="amount" value="<?php echo $total; ?>">
                <button type="submit" class="btn btn-primary" name="addProd" >Pay Now</button>
            </form><br>
        </div>
       </div>
   </div>
  </div>   
  </div>
 </div>
<?php 
?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
