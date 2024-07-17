<?php
define('TITLE','Dashboard');
define('PAGE','dashboard');
 include('../connection.php');
 include('includes/header.php');
 session_start();
if($_SESSION['is_adminlogin']){
    $aEmail=$_SESSION['aEmail'];
}else{
   echo "<script> location.href='login.php'</script>";
   
}
//for user
$sql1 = "SELECT count(*) FROM `user`";
$result1= $conn->query($sql1);
$row1 = mysqli_fetch_row($result1);

//for category
$sql2 = "SELECT count(*) FROM `category`";
$result2= $conn->query($sql2);
$row2 = mysqli_fetch_row($result2);
//for manu
$sql3 = "SELECT count(*) FROM `menu`";
$result3= $conn->query($sql3);
$row3 = mysqli_fetch_row($result3);

//for order
$sql4 = "SELECT count(*) FROM `payment`";
$result4= $conn->query($sql4);
$row4 = mysqli_fetch_row($result4);

 ?>
    <!-- dashboard -->
    <div class="col-sm-9 col-md-10">
    <h1 class="text-center pt-5 text-dark"><b><i>Welcome to Online Food Ordering System</i></b></h1>
    <h6 class="text-center pt-3"><b><i class="fas fa-smile text-primary fa-2x"></i><h5>Customer's Happiness is our Aim...!</h5></b></h6>
        <div class="row text-center mx-5 ">
            <div class="col-sm-3 mt-5 ">
                <div class="card text-white bg-primary mb-3" style="max-width:18rem;">
                    <div class="pt-3">Registerd User</div>
                    <div class="card-body">
                    <h4 class="card-title"><?php echo $row1[0];?></h4>
                    <a href="user.php" class="btn text-white">View</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 mt-5">
            <div class="card text-white bg-success mb-3" style="max-width:18rem;">
                    <div class="pt-3">Category</div>
                    <div class="card-body">
                    <h4 class="card-title"><?php echo $row2[0];?></h4>
                    <a href="category.php" class="btn text-white">View</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 mt-5">
            <div class="card text-white bg-warning mb-3" style="max-width:18rem;">
                    <div class="pt-3">Types of Menu</div>
                    <div class="card-body">
                    <h4 class="card-title"><?php echo $row3[0];?></h4>
                    <a href="menu.php" class="btn text-white">View</a>
                    </div>
                </div>
            </div>
            <!-- <div class="col-sm-3 mt-5">
            <div class="card text-white bg-info mb-3" style="max-width:18rem;">
                    <div class="pt-3">New Orders</div>
                    <div class="card-body">
                    <h4 class="card-title"><?php echo $row4[0]?></h4>
                    <a href="userOrder.php" class="btn text-white">View</a>
                    </div>
                </div>
            </div> -->
        </div>

    </div>

    <?php include('includes/footer.php');?>