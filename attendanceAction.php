<?php
    header("content-type:text/html;charset=utf-8");
    $uid = $_COOKIE['uid'];
    if(!$uid){
        header("location:login.html");
    }
    $action = $_GET['action'];
    $address = $_GET['address'];
    $time = time();
    if(empty($action) || empty($address)){
        header("location:attendance.php");
    }else{
        $mysql = mysqli_connect('localhost','root','','shixun');
        mysqli_set_charset($mysql,"utf8");
        $sql = "insert kaoqin(address,create_time,status,uid) values('$address',$time,$action,$uid)";
        $re = mysqli_query($mysql, $sql);
        mysqli_close($mysql);
        if($re){
            header("location:attendanceRecord.php");
        }else{
            echo "<script>alert('数据异常');location.href='attendance.php';</script>";
        }
    }