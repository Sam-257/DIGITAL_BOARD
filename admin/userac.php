<?php


$user=$_POST['mail'];
$passwd=$_POST['passwd'];

include_once '../connect.php';

$new="SELECT `passwd` FROM `user` WHERE userid = '$user'";

$p=mysqli_query($conn,$new);
$p1=mysqli_fetch_assoc($p);

if($passwd == $p1['passwd'])
{
    session_start();
    $_SESSION['user']=$user;
    header('Location: updfnews.php');
   
} 
else
{
   header('Location: index.php?err');
}
?>