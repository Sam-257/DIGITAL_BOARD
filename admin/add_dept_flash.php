<?php
    include '../connect.php';
    if(isset($_POST['news'])){
        $news=$_POST['news'];
        $time=$_POST['time'];
        echo $news ."<br>". $time;
        $query="UPDATE dept_flash SET flash_news='$news', time='$time',status=1 WHERE dept_id=3";
        echo $query."<br>";
        $result=mysqli_query($conn,$query);
        echo $result;
        header('Location: dept-flash.php');
    }

?>