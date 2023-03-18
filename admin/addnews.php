
<?php
$news=addslashes($_POST["news"]);
if($news!='')
{
include_once '../connect.php';
$new="UPDATE `flash` SET `flash`='$news' WHERE flash_id=1";
mysqli_query($conn,$new);
$status= "UPDATE `dept` SET reload_status=1";
$st=mysqli_query($conn,$status);
header('Location: updfnews.php');
}
?>
