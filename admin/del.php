<?php
$no = $_POST['sno'];
echo $no ;
include_once '../connect.php';
$q="DELETE FROM `news` WHERE sno = $no";
$q1=mysqli_query($conn,$q);
 header('Location: news-view.php');

?>