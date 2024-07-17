<?php
define('TITLE','menu');
define('PAGE','menu');
 include('../connection.php');
 include('includes/header.php');
 session_start();
if($_SESSION['is_adminlogin']){
    $aEmail=$_SESSION['aEmail'];
}else{
   echo "<script> location.href='login.php'</script>";  
}
?>
<!-- Menu Part -->
 <div class="col-sm-9 col-md-10 text-center ">
    <p class="bg-primary text-white  mt-5 p-2">Menu Details</p>
    <?php   $sql = "SELECT * FROM `menu`";
    $result= $conn->query($sql);
    if($result->num_rows > 0){
        echo'<table class="table mt-3 mr-5 ">
                <thead>
                <tr>
                    <th scope="col">Menu ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>';
                    while($row = $result->fetch_assoc()){
                        ?>
                        <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><img src=" <?php echo $row['image']; ?>" height="60px",width="20px"></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['category'] ?></td> 
                        <td><?php echo $row['description'] ?></td>
                        <td>Rs.<?php echo $row['price'] ?></td>
                        <?php
                        echo' <td>
                        <form action="editMenu.php" method="post"class=" d-inline mr-2">
                        <input type="hidden" name="id" value='.$row['id'].'><button class="btn btn-primary" 
                        name ="edit" value ="Edit" type="submit"><i class="fas fa-pen"></i></button>
                        </form>
                        <form action="" method="post" class="d-inline mr-2">
                        <input type="hidden" name="id" value='.$row['id'].'><button class="btn btn-danger" 
                        name ="delete" value ="delete" type="submit"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>';
                    ?>
                        </tr>
                        <?php
                    }
            echo '</tbody>
                </table>';
    }
    else{
        echo '0 Result';
    }
               ?>
               <?php
                   if(isset($_REQUEST['delete'])){
                        $sql = "DELETE FROM `menu` WHERE id = {$_POST['id']}";
                        if($conn->query($sql) == TRUE){
                           echo '<meta h-ttp-equvi="refresh" content= "0;URL=?deleted"/>';
                        }else{
                            echo 'Unable to delete';
                        }
                     }
               ?>
</div>
</div>
<div class="float-right"><a href="prodAdd.php" class="btn btn-primary mx-3 mb-5"><i class="fa fa-plus "></i></a></div>
 </div>
<!-- footer -->
<?php include('includes/footer.php');?>