<?php
define('TITLE','viewOrder');
define('PAGE','viewOrder');
 include('../connection.php');
 include('includes/header.php');
 session_start();
if($_SESSION['is_adminlogin']){
    $aEmail=$_SESSION['aEmail'];
}else{
   echo "<script> location.href='login.php'</script>";
   
}

?>
<!-- View Order Part -->
<div class="col-sm-9 col-md-10">
    <div class=" mx-5 mt-5 card">
        <p class="bg-primary text-center text-white p-2"><b>Order Details</b></p>
            <?php   
            $total = 0;
            if(isset($_REQUEST['view'])){
                $user=$_REQUEST['email'];
                $oid=$_REQUEST['oid'];
                $sql = "SELECT * FROM `cart` WHERE user='$user'";
                $result= $conn->query($sql);
                if($result->num_rows > 0){
                    echo'<div class=" text-center">';
                    echo'<p>Order ID :'.$oid.'</p><hr>';
                    echo'<p> Customer Email :'.$user.'</p>';
                    echo'</div>';
                    echo'<table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Manu Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantiy</th>
                        <th scope="col">Sub Amount</th>
                    </tr>
                    </thead>
                    <tbody>';
                        while($row = $result->fetch_assoc()){
                    echo ' <tr>';
                    echo '<td>'.$row['name'].'</td>';
                    echo '<td>'.$row['price'].'</td>';
                    echo '<td>'.$row['qty'].'</td>';
                    echo '<td>'.$row['qty']*$row['price'].'</td>';
                    echo '</tr>';
                    $total = $total +$row['price']*$row['qty'];
                        }
                        echo  '</tbody>
                            </table>';        
                }
            }
                else{
                    echo '0 Result';
                }
                echo'<h5 class="mx-5 text-center"> Total Amount :'.$total.'</h5>';
            ?>
    </div>
    <div class="text-center pt-5">
        <form action="" method="post" class="mb-3 mr-3 d-print-none d-inline">
            <input type="submit" name="" id="" value="Print" class="btn btn-warning" onClick="window.print()">
            </form>
            <form action="userOrder.php" method="post" class="mb-3 mr-3 d-print-none d-inline">
            <input type="submit" value="Close" class="btn btn-dark">
            </form>
        </form>
    </div>
</div>

   

<?php include('includes/footer.php');?>