<?php
session_start();
$v3=$_SESSION["id"];
echo "hello";
var_dump($v3);
$con = mysqli_connect("localhost","task","Task_Lin@pwd1") or die("cann't connect to database server");
mysqli_select_db($con,"task") or die("database not found");
$sql5="DELETE FROM category where `id`='$v3'";
$res= mysqli_query($con,$sql5);
echo "<br> hello <br>";
$val1=mysqli_affected_rows($con);
var_dump($val1);

?>
