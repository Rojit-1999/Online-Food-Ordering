<?php
define('TITLE','Users');
define('PAGE','Users');
 include('../connection.php');
 include('includes/header.php');
 session_start();
if($_SESSION['is_adminlogin']){
    $aEmail=$_SESSION['aEmail'];
}else{
   echo "<script> location.href='login.php'</script>";
   
}
?>
        <!-- requester table -->
        <div class="col-sm-9 col-md-10">
        <div class="text-center mx-5 mt-5">
            <p class="bg-primary text-white p-2">List of Users</p>
               <?php   $sql = "SELECT * FROM `user`";
               $result= $conn->query($sql);
                if($result->num_rows > 0){
                echo'<table class="table ">
                        <thead>
                        <tr>
                            <th scope="col">User ID</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Address</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>';
                            while($row = $result->fetch_assoc()){
                        echo ' <tr>';
                        echo '<td>'.$row['uid'].'</td>';
                        echo '<td>'.$row['name'].'</td>';
                        echo '<td>'.$row['email'].'</td>';
                        echo '<td>'.$row['mobile'].'</td>';
                        echo '<td>'.$row['address'].'</td>';
                        echo '<td>';
                        echo '<form action="" method="post" class="d-inline mr-2">';
                        echo '<input type="hidden" name="id" value='.$row["uid"].'><button class="btn btn-danger" 
                        name ="delete" value ="delete" type="submit"><i class="fa fa-trash"></i></button>';
                        echo '</form>';
                        echo '</td>';
                        echo     '</tr>';
                            }
                    echo  '</tbody>
                        </table>';
            }
            else{
                echo '0 Result';
            }
            if(isset($_REQUEST['delete'])){
                $sql = "DELETE FROM `user` WHERE uid = {$_REQUEST['id']}";
                if($conn->query($sql) == TRUE){
                    echo '<meta http-equvi="refresh" content= "0;URL=?deleted"/>';
                }else{
                    echo 'Unable to delete';
                }
            }
        ?>
        </div>
    </div>
   </div>

   <!-- footer -->
<?php include('includes/footer.php');?>