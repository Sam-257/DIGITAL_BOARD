<?php
$date=$_POST['date'];
$news=addslashes($_POST['news']);
include_once '../connect.php';
$new="INSERT INTO `news`( `date`, `news`) VALUES ('$date','$news')";

$p=mysqli_query($conn,$new);
header('Location: viewsnews.php');
?>