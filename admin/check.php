<?php
$uname=$_POST['uname'];
$passwd=$_POST['passwd'];
include_once '../connect.php';
$query="select * from user where userid=$uname and passwd=$passwd";
msqli_connect($conn,$query);
print($query);




?>