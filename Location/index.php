<html>

<head>
  <style>
    #map {
      height: 400px;
      width: 100%;
    }
  </style>

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
		<!-- Bootstrap CDN -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 						   integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
</head>

<body>


<header id="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a href="../index.php" class="navbar-brand">
            <h3 class="px-5">
            <i class="fas fa-hamburger">Online Food Ordering</i>
            </h3>
        </a>
       
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="mr-auto"></div>
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbardrop"  data-toggle="dropdown"><i class='fas fa-power-off ' style='font-size:22px;color:dark'></i></a>
                <div class="dropdown-menu ">
                <a class="dropdown-item" href="../logout.php"><b>Logout</b></a>
                </div>
            </div>
        </div>
    </nav>
</header>
<br><br><br>


  <div id="map" ></div><br>
  <div class="text-center">
    <button id="startBtn" type="button" class="btn btn-primary">Start Tracking</button>&nbsp &nbsp &nbsp&nbsp &nbsp &nbsp 
    <button id="stopBtn"type="button" class="btn btn-primary">Stop Tracking</button>
  </div>

  <script src="https://maps.googleapis.com/maps/api/js?key=your_api_key"></script>
  <script src="location.js"></script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>