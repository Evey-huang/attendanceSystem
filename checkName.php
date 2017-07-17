<?php
$name = $_POST['name'];
if(empty($name)){
    $arr = array('msg'=>'账号不能为空','status'=>0);
    echo json_encode($arr);
}else{
    $mysql = mysqli_connect("localhost", "root", "", "shixun");
    mysqli_set_charset($mysql, "utf8");
    $sql_check = "select * from user where account='{$name}'";
    $re_check = mysqli_query($mysql, $sql_check);
    if($re_check && mysqli_fetch_assoc($re_check)){
        echo json_encode(array('msg'=>'账号已存在','status'=>0));
    }else{
        echo json_encode(array('msg'=>'账号可以注册','status'=>1));
    }
}