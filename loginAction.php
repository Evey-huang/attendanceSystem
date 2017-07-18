<?php
header("content-type:text/html;charset=utf-8");

$account = $_POST['username'];
$pwd = $_POST['pwd'];

if(empty($account) || empty($pwd)){
    echo "<script>alert('请仔细填写');location.href='login.html';</script>";
}else{
    $mysql = mysqli_connect('localhost','root','','shixun');
    mysqli_set_charset($mysql,"utf8");
    $pwd = md5(sha1("@".$pwd."@"));
    $sql = "select * from user where account='$account' and password='$pwd'";
    $re = mysqli_query($mysql, $sql);
    $rs = mysqli_fetch_assoc($re);
    mysqli_close($mysql);
    if($rs){
        setcookie("uid",$rs['id'],time()+3600);
        date_default_timezone_set('Asia/Shanghai');
        if($_COOKIE['lastLoginTime']){
            header("location:attendance.php");
        }
        else{
            setcookie('lastLoginTime',date('Y-m-d H:i:s'),time()+24*3600*365);
        }
    }else{
        echo "<script>alert('账号或密码错误');location.href='login.html';</script>";
    }
    
}
