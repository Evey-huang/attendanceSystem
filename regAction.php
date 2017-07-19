<?php
    
    $name = $_POST['username'];
    $pwd= $_POST['pwd'];
    $pwd_repeat = $_POST['pwd_repeat'];
   
    if(empty($name) || empty($pwd) || empty($pwd_repeat)){
        $arr = array('msg'=>'请仔细填写','status'=>0);
        echo json_encode($arr);
    }
    else{
        
        if($pwd == $pwd_repeat){
            $mysql = mysqli_connect("localhost", "root", "", "shixun");
            mysqli_set_charset($mysql, "utf8");
            $sql_check = "select * from user where account='{$name}'";
            $re_check = mysqli_query($mysql, $sql_check);
                if($re_check && mysqli_fetch_assoc($re_check)){
                    echo json_encode(array('msg'=>'账号已存在！','status'=>0));
                }
                else{
                    $pwd = md5(sha1("@".$pwd."@"));
                    $sql = "insert user(account,password) values('{$name}','{$pwd}')";
                    $re = mysqli_query($mysql, $sql);
                    mysqli_close($mysql);
                        if($re){
                            echo json_encode(array('msg'=>'注册成功','status'=>1));
                        }
                        else{
                            echo json_encode(array('msg'=>'服务器繁忙','status'=>0));
                        }  
                 }
        }
        else{
            $arr = array('msg'=>'密码不一致','status'=>-1);
            echo json_encode($arr);
        }
    }
