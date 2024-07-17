<?php
include 'setting.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 						   integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="../style.css">
    <title>Payment</title>
</head>
<body>

    <form action="<?php echo $epay_url?>" method="POST">
    <input value="100" name="tAmt" type="hidden">
    <input value="100" name="amt" type="hidden">
    <input value="0" name="txAmt" type="hidden">
    <input value="0" name="psc" type="hidden">
    <input value="0" name="pdc" type="hidden">
    <input value="EPAYTEST" name="scd" type="hidden">
    <input value="<?php echo $pid?>" name="pid" type="hidden">
    <input value="http://merchant.com.np/page/esewa_payment_success?q=su" type="hidden" name="su">
    <input value="http://localhost:8011/Online%20Food%20Ordering/User/esewa/failed.php" type="hidden" name="fu">
    <br><input value="Esewa Payment" class="btn btn-primary" type="Submit" >
    <input value="Cash On Deliver" class="btn btn-primary" type="hidden" >
    <input value="Cash On Deliver" class="btn btn-primary" type="hidden" >
    </form>


    <form action="../index.php" method="GET">
    <input value="100" name="tAmt" type="hidden">
    <input value="100" name="amt" type="hidden">
    <input value="0" name="txAmt" type="hidden">
    <input value="0" name="psc" type="hidden">
    <input value="0" name="pdc" type="hidden">
    <input value="EPAYTEST" name="scd" type="hidden">
    <input value="<?php echo $pid?>" name="pid" type="hidden">
    <input value="http://merchant.com.np/page/esewa_payment_success?q=su" type="hidden" name="su">
    <input value="http://localhost:8011/Online%20Food%20Ordering/User/esewa/failed.php" type="hidden" name="fu">
    <br><input value="Esewa Payment" class="btn btn-primary" type="Hidden" >
    <input value="Cash On Deliver" class="btn btn-primary" type="Submit" >
    </form>


</body>
</html>


<!-- 
<?php
include 'setting.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 						   integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="../style.css">
    <title>Payment</title>
</head>
<body>

    <form action="http://localhost:8011/Online%20Food%20Ordering/User/order.php" method="POST">
    <input value="100" name="tAmt" type="hidden">
    <input value="100" name="amt" type="hidden">
    <input value="0" name="txAmt" type="hidden">
    <input value="0" name="psc" type="hidden">
    <input value="0" name="pdc" type="hidden">
    <input value="EPAYTEST" name="scd" type="hidden">
    <input value="<?php echo $pid?>" name="pid" type="hidden">
    <input value="http://merchant.com.np/page/esewa_payment_success?q=su" type="hidden" name="su">
    <input value="http://localhost:8011/Online%20Food%20Ordering/User/esewa/failed.php" type="hidden" name="fu">
    <br><input value="Esewa Payment" class="btn btn-primary" type="submit" >
    <input value="Cash On Deliver" class="btn btn-primary" type="hidden" >
    </form>

</body>
</html> -->