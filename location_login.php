<?php 
require_once ('connection.php');
session_start();
if(!isset($_SESSION['is_login'])){
if(isset($_REQUEST['rEmail'])){
$rEmail=mysqli_real_escape_string($conn,trim($_REQUEST['rEmail']));
$rPass=mysqli_real_escape_string($conn,trim($_REQUEST['rPass']));
$pass=md5($rPass);
$sql = "SELECT email, password  FROM user WHERE email ='".$rEmail."' AND password ='".$pass."' limit 1";
$result= $conn->query($sql);
if($result->num_rows == 1){
    $_SESSION['is_login'] = true;
    $_SESSION['rEmail'] = $rEmail;
    echo "<script> location.href='./Location/index.php';</script>";
    exit;
}
else{
    $regmsg = '<div class="alert alert-warning mt-2" role="alert">Enter Valid Email and Password..</div>';
}
}
}else{
    echo "<script> location.href='./Location/index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <link rel="stylesheet" href="style1.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    

    <title>Login</title>
</head>
<body class="hero-image">
 <div class="mt-5 mb-2 text-center ">
 <span class="text-center text-white" style="font-size:30px;"><i><b>Online Food Ordering</b</i></span>
 </div> 
 <div class="container-fluid text-white">
    <div class="row justify-content-center mt-3">
        <div class="col-sm-6 col-md-4 ">
        <form action="" method="POST" class="shadow-lg px-4 py-5 formcontainer " autocomplete="off">
        <div class="text-center">
        <i class="fa fa-user-circle fa-4x text-primary mx-2"></i >
        <p class=" text-white">Customer Login </p> 
        </div>
        <div class="form-group">
            <i class="fa fa-envelope" ></i><label for="email" class="font-weight-bold pl-2" >Email</label>
            <input type="email" name="rEmail" class="form-control" placeholder="Email" autocomplete="off" required>
            <small class="form-text"> We'll never share your email with anyone eles.</small>
        </div>
        <div class="form-group">
        <i class="fa fa-key"></i><label for="pass" class="font-weight-bold pl-2">Password</label>
        <input type="password" class="form-control" placeholder="Password" name="rPass">
        </div>
        <button type="submit" class="btn btn-primary mt-5  btn-block shadow-sm font-weight-bold " name="rSignup">Login</button>
        <div class="text-center"><a href="../index.php" class="btn btn-dark  btn-block shadow-sm font-weight-bold ">Back to Home</a></div>
        <?php if(isset($regmsg)) { echo $regmsg;} ?>
       </form>  
        </div>
    </div>
 </div>
 <!-- Bootstrap javascript -->
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
</body>
</html>