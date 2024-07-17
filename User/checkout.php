<?php 
session_start(); 

if($_SESSION['is_login']){
    $rEmail=$_SESSION['rEmail'];
}else{
    echo "<script> location.href='login.php'</script>";
}
require_once ('../connection.php');

$rEmail=$_SESSION['rEmail'];
$sql ="SELECT * FROM `user` WHERE email ='".$rEmail."'";
 $result= $conn->query($sql);
 if($result->num_rows > 0){
     while($row = $result->fetch_assoc()){
		$userId= $row["uid"];
		$mobile= $row["mobile"];
     }
  }

if(isset($_POST['amount'])){
    $amount= $_POST['amount'];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Checkout</title>
	    <!-- Font Awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
		<!-- Bootstrap CDN -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 						   integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="../style.css">
  </head>
  <body>
  <div class="container py-5">
    <p class="bg-dark text-white text-center  p-2">Checkout Details</p>
  <!-- <h3 class="text-center pb-3"> Checkout Details</h3> -->
     <div class=" text-center  card bg-light">	 
		
		<form method="post" action="esewa/main.php">
			<table class="table table-boardered ">
		<tbody>
			<tr>
				<th>Label</th>
				<th>Value</th>
			</tr>
			<tr>
				<td><label>ORDER ID:</label></td>
				<td><input id="ORDER_ID" tabindex="1" maxlength="20" size="20"
					name="ORDER_ID" autocomplete="off"
					value="<?php echo  "ORDS" . rand(10000,99999999)?>" class="form-control">
				</td>
			</tr>
			<tr>
				<td><label>CUSTOMER ID :</label></td>
				<td><input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo $userId;?>" class="form-control"></td>
			</tr>
			<tr>
				<td><label>CUSTOMER MOBILE:</label></td>
				<td><input id="MSISDN" tabindex="4" maxlength="12" size="12" name="MSISDN" autocomplete="off" value="<?php echo $mobile;?>" class="form-control"></td>
			</tr>
			<tr>
				<td><label>CUSTOMER EMAIL:</label></td>
				<td><input id="EMAIL" tabindex="4" maxlength="12" size="12" name="EMAIL" autocomplete="off" value="<?php echo $rEmail; ?>" class="form-control"></td>
			</tr>
			<tr>
				<td><label>INDUSTRY_TYPE_ID :</label></td>
				<td><input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail" class="form-control"></td>
			</tr>
			<tr>
				<td><label>Channel :</label></td>
				<td><input id="CHANNEL_ID" tabindex="4" maxlength="12"
					size="12" name="CHANNEL_ID" autocomplete="off" value="WEB" class="form-control">
				</td>
			</tr>
			<tr>
				<td><label>Total Amount :</label></td>
				<td><input title="TXN_AMOUNT" tabindex="10"
					type="text" name="TXN_AMOUNT"
					value="<?php echo $amount; ?>" class="form-control">
				</td>
			</tr>

		</tbody>
		</table>
		<input value="Pay Now" type="submit" class="btn btn-primary" name="pay"	onclick="">
		</form><br>
	 </div> 
 	</div>  

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>