<?php
$db_host="localhost";
$db_user="root";
$db_password="";
$db_name="Onlinefood";

//creating connection
$conn = new mysqli($db_host,$db_user,$db_password,$db_name);
//checking connection
if($conn->connect_error){
    die("connection faild");
}
?>
