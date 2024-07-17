<?php

session_start();
if($_SESSION['is_login']){
    $rEmail=$_SESSION['rEmail'];
}else{
    echo "<script> location.href='login.php'</script>";
}
require_once ('../connection.php');

if (isset($_POST['add'])){
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if(in_array($_POST['product_id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'order.php'</script>";
        }else{

            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id'],
                'qty'=>$_POST['qty']
            );
            $_SESSION['cart'][$count] = $item_array;
        }
    }else{
        $item_array = array(
            'product_id' => $_POST['product_id'],
            'qty'=>$_POST['qty']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Cart</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">

    
</head>
<body>
<!-- header section -->
<?php
    require_once ('php/header.php');
?>


<div class="row text-center py-5">
    <?php
        $sql = "SELECT * FROM `menu`";
        $result= $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
        echo '<div class="col-md-3 col-sm-6 my-3 my-md-0 ">
            <form action="" method="post">
            <div class="card shadow mt-3">
                <div>
                    <img src="'.$row["image"].'" alt="Image1" class="img-fluid card-img-top">
                </div>
                <div class="card-body">
                    <h5 class="">'.$row["name"].'</h5>
                    <input type="hidden" name="name" value='.$row["name"].'>
                    <h6>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </h6>
                    <h6 class="row container ">
                    <div class="text-center">
                    Qty:
                    <input type="number" name="qty" value="1" style="width: 25%;">
                    </div>
                    </h6>
                    <h5>
                        
                        <span class="price">RS.'.$row["price"].'</span>
                    <input type="hidden" name="price" value='.$row["price"].'>

                    </h5>

                    <button type="submit" class="btn btn-primary " name="add">Add to Cart <i class="fas fa-shopping-cart"></i></button>
                        <input type="hidden" name="product_id" value="'.$row["id"].'">
                </div>
            </div>
            </form>
        </div> ';
            }
        }
    ?>
    <?php 
    if (isset($_POST['add'])){
        $name = $_REQUEST['name'];
        $price = $_REQUEST['price'];
        $qty = $_REQUEST['qty'];
        $mid = $_REQUEST["product_id"];
        $user =$rEmail;
            $sql ="INSERT INTO `cart`(`name`, `price`, `qty`, `user`, `mid`) VALUES ('$name','$price','$qty','$user','$mid')";
            if($conn->query($sql) == TRUE){
                $regmsg = '<div class="alert alert-success mt-2" role="alert">Added Successfully..</div>';
            }else{
                $regmsg = '<div class="alert alert-warning mt-2" role="alert">Unable to Add..</div>';
            }
    }
    ?>
</div>
</div>





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
