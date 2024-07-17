<?php
define('TITLE','editMenu');
define('PAGE','editMenu');
 include('../connection.php');
 include('includes/header.php');
 session_start();
if($_SESSION['is_adminlogin']){
    $aEmail=$_SESSION['aEmail'];
}else{
   echo "<script> location.href='login.php'</script>";
   
}
?>
<!-- Edit Menu part -->
<div class="col-sm-6 mt-3 mx-5 jumbotron">
 <p class="bg-dark text-white p-2 text-center">Update Menu</p>
  <?php 
   if(isset($_REQUEST['edit'])){
   $sql = "SELECT * FROM `menu` WHERE id = {$_REQUEST['id']}";
   $result= $conn->query($sql);
   $row = $result->fetch_assoc();
   }
   if(isset($_REQUEST['update'])){
    if(($_REQUEST['id'] == "")||($_REQUEST['name'] == "")||( $_REQUEST['category'] == "")||($_REQUEST['price'] == "")||($_REQUEST['description'] == "")){
        $regmsg = '<div class="alert alert-primary mt-2" role="alert">Please Complete all  field..</div>';
    }else{
        $id = $_REQUEST['id'];
        $name = $_REQUEST['name'];
        $category = $_REQUEST['category'];
        $price = $_REQUEST['price'];
        $description = $_REQUEST['description'];
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
        $sql ="UPDATE `menu` SET `id`='$id',`name`='$name',`category`='$category',`price`='$price',`description`='$description' WHERE id ='$id'";
        if($conn->query($sql) == TRUE){
            $regmsg = '<div class="alert alert-primary mt-2" role="alert">Updated Successfully..</div>';
            echo "<script> location.href='menu.php'</script>";
        }else{
            $regmsg = '<div class="alert alert-primary mt-2" role="alert">Unable to Update..</div>';
        }
      }
    }
}
?>
    <form action="" method="post" class="mx-3" autocomplete="off" enctype='multipart/form-data'>
    <div class="form-group">
        <label for="request">Menu ID</label>
        <input type="text" name="id" id="id" class="form-control" 
        value="<?php if(isset($row["id"])) echo $row["id"];?>" readonly>
    </div>
    <div class="form-group">
        <label for="name">Menu Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Name" 
        value="<?php if(isset($row["name"])) echo $row["name"];?>">
    </div>
    <div class="form-group">
        <label for="name">Category</label>
        <input type="text" name="category" id="category" class="form-control" placeholder="category" 
        value="<?php if(isset($row["category"])) echo $row["category"];?>">
    </div>
    <div class="form-group">
        <label for="name">Price</label>
        <input type="number" name="price" id="price" class="form-control" placeholder="price" 
        value="<?php if(isset($row["price"])) echo $row["price"];?>">
    </div>
    <div class="form-group">
        <label for="email">Description</label>
        <input type="text" name="description" id="description" class="form-control" placeholder="description"
         value="<?php if(isset($row["description"])) echo $row["description"];?>">
    </div>
    <div class="form-group">
        <label for="email">Image</label>
        <input type="file" name="file" id="file" class="form-control" placeholder="file"
         value="<?php if(isset($row["image"])) echo $row["image"];?>">
    </div>
    
    <div class="text-center mt-5">
    <button type="submit" class="btn btn-warning" name="update">Update</button>
    <a href="menu.php" class="btn btn-dark" name="close">Close</a>
    </div>
    <?php if(isset($regmsg)) { echo $regmsg;} ?>
    </form>
 </div>

<!-- Footer Part -->
<?php include('includes/footer.php');?> -->