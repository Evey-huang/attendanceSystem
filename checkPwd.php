<?php
header("content-type:text/html;charset=utf-8");
$pwd = $_POST['pwd'];
if(empty($pwd)){
    $arr = array('msg'=>'密码不能为空','status'=>0);
    echo json_encode($arr);
}else{
    echo json_encode(array('msg'=>'密码可以使用','status'=>1));
}
