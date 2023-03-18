<?php
$no=$_POST['sno'];
$date=$_POST['date'];
$news=addslashes($_POST['news']);

include_once '../connect.php';
$q="UPDATE `news` SET `date`='$date',`news`='$news' WHERE sno = $no";
$q1=mysqli_query($conn,$q);
header('Location: news-view.php');

?>