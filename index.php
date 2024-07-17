<!DOCTYPE html>
<html>
<head>
<title>Online Food Ordering</title>    
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style1.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
</head>
<body>
<!-- navbar section -->
<nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top">
<b><a class="navbar-brand" href="#"><i class="fas fa-hamburger">Online Food Ordering</i></a></b>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="collapsibleNavbar">
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link" href="#">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#about">About</a>
  </li>
  <!-- Dropdown -->
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Menu</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#product">Veg</a>
      <a class="dropdown-item" href="#product">Non-veg</a>
      <a class="dropdown-item" href="#product">Snacks</a>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#contact">Contact</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="location_login.php">Track my Order</a>
  </li>
</ul>
</div>
<div class="text-left">

<a href="User/userReg.php"><button type="button" class="btn btn-primary">Register</button></a>
<a href="Admin/login.php"><button type="button" class="btn btn-primary">Admin</button></a>
</div>

</nav>
  <br>
  <!-- header Section -->
<div class="hero-image">
<div class="hero-text">
  <h1 style="font-size:50px">Online Food Ordering</h1>
  <p>Customer Happieness is Our Aim !</p>
  <a href="User/login.php"> <button >&nbsp;Get Started&nbsp;</button></a>
</div>
</div>
<!-- about Section -->
<section id="about">
<b><h2 class="pt-5 text-center ">About Us</h2><hr class="w-25 mx-auto pt-3"></b>
<div class="container pb-3">
  <div class="row">
    <div class="col-lg-7 col-md-7 col-12 text-center pb-3">
    <p>Online Food Ordering systems partner with local restaurants that offer home delivery and prepare a database of customers and restaurants.
    We believe food lovers should have an amazing ordering experience for their delivery. We think this should be possible without ripping off restaurants by charging high commission payments on every order.
    We love the convenience of ordering online for food delivery and we order all the time. But we noticed that, while many restaurants have great food, they lose potential sales because they don't provide 
    an online ordering service. And many of those who have built their own online ordering service end up with a buggy program, resulting in bad user experiences. This is when we noticed that restaurant owners
    don't have a choice. Either they go with one of the big portals, who charge between 10%-40% commission on every order, or ask the web agency of their choice to build a custom module - which turns out to 
    be very expensive as well. It is our goal to solve this problem and provide a solution that restaurant owners and their customers love.</p>
    <button type="submit" class="btn btn-primary">Read More..</button>
      </div>
      <div class="col-lg-5 col-md-5 col-12">
      <img src="./User/upload/about.jpg" alt="Image1" class="img-fluid card-img-top">
      </div>
  </div>
</div> 
</section >
<!-- Product section -->
<section id="product">
<b><h2 class="pt-5 text-center ">Our Product</h2><hr class="w-25 mx-auto pt-3"></b>
  <section>
  <div class="container">
      <div class="row text-center py-5">
      <?php
          include('connection.php');
          $sql = "SELECT * FROM `menu` ORDER BY name LIMIT 8";
          $result= $conn->query($sql);
          if($result->num_rows > 0){
              while($row = $result->fetch_assoc()){
              echo '<div class="col-md-3 col-sm-6 my-3 my-md-0 extra-div ">
                    <form action="" method="post">
                    <div class="card shadow mt-3">
                    <div>
                    <img src="User/'.$row["image"].'" alt="Image1" class="img-fluid card-img-top">
                    </div>
                    <div class="card-body">
                    <h2 class="card-title">'.$row["name"].'</h2>
                    <h2>
                        
                        <span class="price">Rs.'.$row["price"].'</span>
                    </h2> 
                    <a href="User\order.php" class="btn btn-primary">Purchase</a>
                    </div>
                    </div>
                    </form>
                </div> ';
              }
          }
      ?>
      </div>
</div>
</section>
<!-- contact us -->
<section id="contact" >
<b><h2 class="pt-5 text-center ">Contact Us</h2><hr class="w-25 mx-auto pt-3"></b>
<div class="cont-image py-3">
<?php include('User/contact.php') ?> 
</div>
</section>
<!-- available  -->
<section>
<b><h2 class="pt-5 text-center ">Available Now!</h2><hr class="w-25 mx-auto pt-3"></b>
  <div class="container heading text-center pb-5">
    </div>
    <div class="container d-flex justify-content-around align-item-center text-center pb-5">
      <div>
        <h2 class="count"><b>1000</b></h2>
        <p>Available product</p>
      </div>
      <div>
        <h2 class="count"><b>1500</b></h2>
        <p>Happy Customer</p>
      </div>     
      <div>
        <h2 class="count"><b>150</b></h2>
        <p>Product catogary</p>
      </div>
      </div>
</section>
<!-- footer section -->
<footer class="bg-primary text-white">
<div class="container pt-5">
  <div class="row ">
    <div class="col-lg-4 col-md-4 col-12">
    <div>
        <h4>NVIGATION LINK</h4><br>
        <li><a href="#" class="text-white"> HOME</a></li>
        <li><a href="#about" class="text-white">ABOUT</a></li>
        <li><a href="#product" class="text-white">PRODUCT</a></li>
        <li><a href="#contact" class="text-white">CONTACT US</a></li>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-12">
    <div>
    <h5 class="fas fa-phone text-white">&nbsp;&nbsp;+977 9840040828</h5><br>
    <h4 class="fa fa-envelope text-white">&nbsp;&nbsp;rojitdhakal40@gmail.com</h4><br><br>
    </div>
    </div>
    
    <div class="col-lg-4 col-md-4 col-12 pt-3">
    <div><h5 >Follow Us</h5></div><br>
    <div class="row">
      <button class="btn btn-light ml-3"><i class="fab fa-facebook"></i></button>&nbsp;
      <button class="btn btn-light"><i class="fab fa-youtube"></i></button>&nbsp;
      <button class="btn btn-light"><i class="fab fa-twitter"></i></button>&nbsp;
      <button class="btn btn-light"><i class="fab fa-google-plus-g"></i></button>
    </div>
    </div>
    </div>
  </div>
</div> 
</br>   
<div class="scrolltop float-right">
    <i class="fa fa-arrow-up" onclick="topFunction()" id="myBtn"></i>
  </div> 
<div class=" text-center text-white bg-primary p-2 "><p>Copyright &copy;2023 All rights reserverd | Designed and Developed by Rojit Dhakal. </p></div>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script> 
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script>
  $('.count').counterUp({
  delay:10,
  time:3000
})
// for scrolltop
// mybutton =document.getElementById("myBtn");
// window.onscroll = function() {scrollFunction()};
// function scrollFunction(){
//   // when the user scroll down 20px from the top of the document ,show the button
//   if(document.body.scrollTop >20 || document.documentElement.scrollTop > 20){
//     mybutton.style.display ="block";

//   }else{
//     mybutton.style.display ="none";

//   }
// }
// // when the user click on the button ,scroll the top 
// function topFunction(){
//   document.body.scrollTop = 0;// for safari
//   document.documentElement.scrollTop = 0;// for chrome, firefox and opera
// }

</script>
</body>
</html>
