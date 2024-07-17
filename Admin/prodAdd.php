<?php
define('TITLE','AddProduct');
define('PAGE','AddProduct');
 include('../connection.php');
 include('includes/header.php');
 session_start();
if($_SESSION['is_adminlogin']){
    $aEmail=$_SESSION['aEmail'];
}else{
   echo "<script> location.href='login.php'</script>";
   
}
?>
<!-- Add Menu Part -->
<div class="col-md-6  jumbotron ">
<div class=" mx-5 ">
<p class="bg-dark text-white p-2 text-center">Add Menu</p>
  <form method="post" action="" enctype='multipart/form-data'>
  <div class="form-group">
  <label>Name</label>
  <input type="text" name="name" id="user" class="form-control">
  </div>
  <div class="form-group">
  <label>Category</label>
  <select class="form-control" name="category" id="category" >
  <option>Select category</option>
  <?php  
   $sql = "SELECT * FROM `category`";
          $result= $conn->query($sql);
          if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
               echo' <option>'.$row["category"].'</option>';
            }
          }
          ?>
  </select>
  </div>
  <div class="form-group">
  <label>Price</label>
  <input type="text" name="price" id="price" class="form-control">
  </div>
  <div class="form-group">
  <label>Description</label>
  <input type="text" name="description" id="description" class="form-control">
  </div>
  <div class="form-group">
  <label>Profile</label>
  <input type="file" name="file" id="file" class="form-control">
  </div>
    <input type='submit' value='Save' name='submit' class="btn btn-warning">
  </form>
  <?php if(isset($msg)) { echo $msg;} ?>
</div>
</div>
<?php 
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $category = $_POST['category'];
  $price = $_POST['price'];
  $description = $_POST['description'];
  $files =  $_FILES['file'];
  $filename = $files['name'];
  $fileerror = $files['error'];
  $filetmp = $files['tmp_name'];

  $fileext = explode('.',$filename);
  $filecheck = strtolower(end($fileext));

  $fileextstored = array('png','jpeg','jpg','gif');

  if(in_array($filecheck,$fileextstored)){

    $destinationfile ='../User/upload/'.$filename;
    move_uploaded_file($filename,$destinationfile);
    $sql ="INSERT INTO `menu`(`name`, `image`, `category`, `price`, `description`) VALUES ('$name','$destinationfile','$category','$price','$description')";
    if($conn->query($sql) == TRUE){
        $msg ='<div class="alert alert-success mt-2" role="alert">Added Successfully..</div>';
         echo "<script> location.href='menu.php'</script>";

    }else{
        $msg ='<div class="alert alert-warning mt-2" role="alert">Unable to Add..</div>';
    }
  }
  }
?>
<?php include('includes/footer.php');?>