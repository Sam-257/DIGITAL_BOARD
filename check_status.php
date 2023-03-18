<?php
    include 'connect.php';
    if(isset($_POST['check'])){
        $dept_id=$_POST['dept_id'];
        $check= "SELECT reload_status FROM `dept` WHERE dept_id=$dept_id";
        $result=mysqli_query($conn,$check);
        $res=mysqli_fetch_assoc($result);
        echo $res['reload_status'];
    }
    
    if(isset($_POST['dept_flash'])){
        $dept_id=$_POST['dept_id'];
        $time=$_POST['time'];
        $query= "SELECT * FROM `dept_flash` WHERE time > '$time' and status=1 and dept_id=$dept_id";
        // echo $query;
        $row=mysqli_query($conn,$query);
        $num_row= mysqli_num_rows($row);
        $row=mysqli_fetch_assoc($row);
        if($num_row > 0){
            echo $row['time'];
        }
        else{
            echo "0";
        }
    }

    if(isset($_POST['dept_flash_status'])){
        $arr=array();
        $dept_id=$_POST['dept_id'];
        $time="SELECT time from dept_flash where dept_id=$dept_id";
        $time=mysqli_query($conn,$time);
        $time=mysqli_fetch_assoc($time);
        $arr[0]=$time['time'];
        $q="UPDATE dept_flash SET status=0 where dept_id=$dept_id";
        $q=mysqli_query($conn,$q);
        if($q){
            $arr[1]=1;
        } else{
            $arr[1]=0;
        }
        $arr=json_encode($arr);
        echo $arr;
    }
?>