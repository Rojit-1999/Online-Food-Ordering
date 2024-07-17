
<?php 
include('../connection.php');
if(isset($_REQUEST['rSignup'])){
    if(($_REQUEST['rName'] == "")||($_REQUEST['rEmail'] == "")||($_REQUEST['rMobile'] == "")||($_REQUEST['rAddress'] == "")||($_REQUEST['rPass'] == "")){
        $regmsg1 = '<div class="alert alert-warning mt-2" role="alert">All Fields are Required</div>';
    }else
    {  
$sql = "SELECT email  FROM user WHERE email ='".$_REQUEST['rEmail']."'  limit 1";
$result= $conn->query($sql);
if($result->num_rows == 1){
    $regmsg1 = '<div class="alert alert-primary mt-2" role="alert">User is Already Registered</div>';
}else{
$rName=$_REQUEST['rName'];
$rEmail=$_REQUEST['rEmail'];
$rMobile=$_REQUEST['rMobile'];
$rAddress=$_REQUEST['rAddress'];
$rPass=$_REQUEST['rPass'];
$pass=md5($rPass);

$sql= "INSERT INTO `user`(`name`, `email`, `mobile`, `address`, `password`) VALUES ('$rName','$rEmail','$rMobile','$rAddress','$pass')";
if($conn->query($sql) == TRUE){
    $regmsg1 = '<div class="alert alert-primary mt-2" role="alert">Account Created Successfully..</div>';
    echo "<script> location.href='login.php';</script>";
}else{
    $regmsg1 = '<div class="alert alert-primary mt-2" role="alert">Faild to Create Account..</div>';
}
}
}
}
?>
<!-- registration -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <link rel="stylesheet" href="../style1.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">

    <title>Login</title>
</head>
<body class="hero-image">
  <div class="container pt-5 " id="Register">
  <b><h2 class="text-center text-white">Create an Account</h2><hr class="w-25 mx-auto pt-3 text-dark"></b>
    <div class="row mt-4 mb-4 ">
      <div class="col-md-8 offset-md-2 ">
        <form action="" class="shadow-lg px-5 pb-5 pt-5 formcontainer text-white " method="POST" >
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <i class="fa fa-user iconCol"></i><label for="name" class="font-weight-bold pl-2" >Name</label>
                  <input type="text" class="form-control" placeholder="Name" name="rName" autocomplete="off" required>
                </div>
                <div class="form-group">
                  <i class="fa fa-mobile-phone iconCol"></i><label for="mobile" class="font-weight-bold pl-2" >Mobile</label>
                  <input type="text" class="form-control" placeholder="mobile" name="rMobile" autocomplete="off" required>
                </div>
                <div class="form-group">
                  <i class="fa fa-key iconCol"></i><label for="pass" class="font-weight-bold pl-2">Password</label>
                  <input type="password" class="form-control" placeholder="Password" name="rPass">
                </div>
            </div>
          <div class="col-md-6">
              <div class="form-group">
                <i class="fa fa-envelope iconCol"></i><label for="email" class="font-weight-bold pl-2">Email</label>
                <input type="email" class="form-control" placeholder="Email" name="rEmail" autocomplete="off" required>
              </div>
              <div class="form-group">
                <i class="fa fa-home iconCol"></i><label for="address" class="font-weight-bold pl-2" >Address</label>
                <textarea type="text" class="form-control" rows="4" placeholder="address" name="rAddress" autocomplete="off" required></textarea>
              </div>
          </div>
          </div>
          <button type="submit" class="btn text-white btn-primary about mt-5 btn-block shadow-sm font-weight-bold " name="rSignup">Sign Up</button>
          <em style="font-size:10px">Note- By checking Sign Up ,You agree to our Term, data and Cookie Policy</em>
          <?php if(isset($regmsg1)) { echo $regmsg1;} ?>
        </form>
      </div>
    </div>
</div><br>

 <!-- Bootstrap javascript -->
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
</body>
</html>
