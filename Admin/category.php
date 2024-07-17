<?php
define('TITLE','category');
define('PAGE','category');
 include('../connection.php');
 include('includes/header.php');
 session_start();
if($_SESSION['is_adminlogin']){
    $aEmail=$_SESSION['aEmail'];
}else{
   echo "<script> location.href='login.php'</script>";
   
}
if(isset($_REQUEST['add'])){
    $category = $_REQUEST['category'];
        $sql ="INSERT INTO `category`( `category`) VALUES ('$category')";
        if($conn->query($sql) == TRUE){
            $regmsg = '<div class="alert alert-success mt-2" role="alert">Added Successfully..</div>';
        }else{
            $regmsg = '<div class="alert alert-warning mt-2" role="alert">Unable to Add..</div>';
        }
    }
?>
<div class="col-sm-9 col-md-10">
<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-5 pt-5">
			<form action="" method="post">
				<div class="card">
					<div class="card-header"> Category Form</div>
					<div class="card-body">
						<input type="hidden" name="id">
                    <div class="form-group">
                        <label class="control-label">Category</label>
                        <input type="text" class="form-control" name="category">
                    </div>	
					</div>	
					<div class="card-footer">
					<button type="submit" class="btn btn-sm btn-primary " name="add">Add Category</button>		
					</div>
				</div>
			</form>
			</div>
			<!-- FORM Panel -->

			<!-- Table Panel -->
<div class="col-md-6">
 <p class="bg-primary text-white text-center mt-5 p-2">Types Of Category</p>
    <?php  
    $i = 1;
     $sql = "SELECT * FROM `category`";
        $result= $conn->query($sql);
        if($result->num_rows > 0){
            echo'<table class="table mt-3 mr-5">
                    <thead>
                    <tr>
                        <th scope="col">Category Id</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>';
                        while($row = $result->fetch_assoc()){
                    echo ' <tr>';
                    echo '<td>'.$row['cid'].'</td>';
                    echo '<td>'.$row['category'].'</td>';
                    echo '<td>';
                    echo '<form action="" method="post" class="d-inline mr-2">';
                    echo '<input type="hidden" name="id" value='.$row["cid"].'><button class="btn btn-danger" 
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
            $sql = "DELETE FROM `category` WHERE cid = {$_REQUEST['id']}";
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
</div>
<!-- footer -->
<?php include('includes/footer.php');?>
