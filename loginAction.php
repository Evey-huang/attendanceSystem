<?php
header("content-type:text/html;charset=utf-8");
$name=$_POST['username'];
$pwd=$_POST['pwd'];
$mysql=mysqli_connect("localhost","root","","shixun");
mysqli_set_charset($mysql, "utf8");

$sql_check="select * from user where account='{$name}' and password='{$pwd}'";
$re_check=mysqli_query($mysql, $sql_check);

if($re_check&&mysqli_fetch_assoc($re_check)){
    header("location:checkwork.html");
}
else{
    echo "<script>alert('用户名或密码错误，请重试');window.location.href='login.html';</script>";
}