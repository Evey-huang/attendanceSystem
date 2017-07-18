<?php 
    header("content-type:text/html;charset=utf-8");
    date_default_timezone_set("Asia/Chongqing");
    $uid = $_COOKIE['uid'];
    if(!$uid){
        header("location:login.html");
    }
    $mysql = mysqli_connect("localhost", "root", "", "shixun");
    mysqli_set_charset($mysql, "utf8");
    
    $sql_check1 = "select * from user where id='{$uid}'";
    $re_check1 = mysqli_query($mysql, $sql_check1);
    $data1 = mysqli_fetch_assoc($re_check1);
    if(empty($data1)){
        echo "<script>alert('非法操作');location.href='login.html';</script>";
    }
    
    $sql_check = "select * from kaoqin where uid='{$uid}' order by create_time desc";
    $re_check = mysqli_query($mysql, $sql_check);
    $temp = array();
    while ($data = mysqli_fetch_assoc($re_check)){
        $temp[] = $data;
    }

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>考勤记录</title>
<link type="text/css" rel="stylesheet" href="css/main.css">
<style type="text/css">
    .rightBox {padding: 10px 0;}
    .user-attendanceR-list {width: 724px;height: 30px;padding: 10px;border: 1px solid #f1f1f1; border-radius: 3px;margin: 10px 0px;transition: all .2s;}
    .user-attendanceR-list:hover{border-color:#ffb83b;background:#fafafa;box-shadow:0 0 8px #999}
    .user-attendanceR-detail {line-height:30px;font-size:12px;color:#6c6c6c;cursor:default;padding-left:30px;}
    .user-attendanceR-detail .time{display:inline-block;width:150px;}
    .user-attendanceR-detail .address{display:inline-block;width:200px;}
    .user-attendanceR-detail span.right{color:#0f8ff2;}
    .user-attendanceR-detail span.warning{color:#ff8d13;}
    .user-attendanceR-detail span.error{color:#f25277;}
    .btn-attendance {width: 70px;height: 28px;display: inline-block;text-align: center;overflow: hidden;vertical-align: middle;color: #6c6c6c;font-size:12px;line-height: 28px;margin-left: 140px;padding-left: 20px;background: url(img/my.png) no-repeat -92px -247px;}
    .btn-attendance:hover{color:#fff;background: url(img/my.png) no-repeat 0px -247px;}
    .page_list{text-align:right;margin-top:20px;margin-bottom:20px;font-size:12px;}
    .page_list a{display:inline-block;text-decoration:none;height: 26px;line-height: 26px;padding: 0 14px;margin-right: 5px;color: #333;border: 1px solid #ddd;background: #f7f7f7;}
    .page_list a:hover{background: #fff;}
</style>
</head>
<body>
<div class="loginTop clear">
	<div class="topLeft">
		<img src="img/logo.png"/>
		<span></span>
	</div>
	<div class="topRight registerTr">
		<span>欢迎您，<?php echo $data1['account'];?></span> <a href="logout.php">注销</a>
	</div>
</div>
<div class="checkWorkContent clearfix">
	<div class="checkTop clearfix">
		<div class="checkTopTitle">
			<dl class="topInfo">
				<dd class="userName">暂无昵称<b></b></dd>
				<dd>账&nbsp;&nbsp;号：<?php echo $data1['account'];?></dd>
				<dd>上一次登录时间：<?php echo $_COOKIE['lastLoginTime'];?></dd>
			</dl>
			<div class="changePasswd"><a href="#">修改密码</a></div>
		</div>
		<div class="checkNav">
			<ul>
				<li class="navLi1">
				   <b></b><a href="personalInfo.php">个人信息</a>
				</li>
				<li class="navLi2">
				   <b></b><a href="#">我的课表</a>
				</li>
				<li class="navLi3">
				   <b></b><a href="attendanceRecord.php">考勤记录</a>
				</li>
			</ul>
		</div>
		<div class="photo">
			<img alt="个人头像" src="img/fg-a-ava-0.png">
			<p>修改头像</p>
		</div>
	</div>
	<div class="checkContent clearfix">
		<div class="checkConLeft">
			<ul>
				<li><a href="personalInfo.php">个人资料</a></li>
				<li><a href="attendance.php">我的考勤</a></li>
				<li><a href="#">我的课表</a></li>
				<li><a href="#">账户安全</a></li>
				<li><a href="#">我的消息</a></li>
			</ul>
		</div>
		<div class="checkConRight">
			<div class="rightTitle"><h1>考勤记录</h1></div>
			<div class="rightBox">
                <?php foreach ($temp as $key=>$value){?>
                <div class="user-attendanceR-list ">
                    <div class="user-attendanceR-detail">
                        <span class="time"><?php echo date("Y-m-d H:i:s",$value['create_time']);?></span>
                        <span class="address"><?php echo $value['address'];?></span>
                        <?php switch ($value['status']){
                            case 1:
                                echo '<span class="right">正常</span>';
                                break;
                            case 2:
                                echo '<span class="error">迟到</span>';
                                break;
                            case 3:
                                echo '<span class="warning">请假</span>';
                                break;
                            default:
                                echo '<span class="error">异常</span>';
                                break;
                        }?>
                        <a href="#" target="_blank" class="btn-attendance">查看详情</a>
                    </div>
                </div>
                <?php }?>
			<div class="page_list">
                <a href="#">首页</a>
                <a href="#">上一页</a>
                <a class="page_num" href="#">1</a>
                <a class="page_num" href="#">2</a>
                <a class="page_num" href="#">3</a>
                <a class="page_num" href="#">4</a>
                <a class="page_num" href="#">5</a>
                <a href="#">下一页</a>
                <a href="#">尾页</a>
            </div>
		</div>
	</div>
</div>

<div class="footer clearfix">
		<div class="footerLeft">
			<div class="footerSns">
			    <b>友情链接：</b>
				<ul>
					<li><a href="#" target="_blank" title="中国教育网">中国教育网</a></li>
					<li class="liSns"><a href="#" target="_blank" title="重庆市教委">重庆市教委</a></li>
					<li class="liSns"><a href="#" target="_blank" title="重庆大学">重庆大学</a></li>
					<li class="liSns"><a href="#" target="_blank" title="学历查询">学历查询</a></li>
					<li class="liSns"><a href="#" target="_blank" title="教育资讯">教育资讯</a></li>
					<li class="liSns"><a href="#" target="_blank" title="中软国际">中软国际</a></li>
				</ul>
			</div>
			<div class="footerLinks">
				<ul>
					<li><a href="#" target="_blank">关于我们</a></li>
					<li><a href="#" target="_blank">公司首页</a></li>
					<li><a href="#" target="_blank">招商合作</a></li>
					<li><a href="#" target="_blank">手机网站</a></li>
					<li><a href="#" target="_blank">技术支持</a></li>
					<li><a href="#" target="_blank">人才招聘</a></li>
					<li><a href="#" target="_blank">联系我们</a></li>
					<li><a href="#" target="_blank">网站地图</a></li>
					<li><a href="#" target="_blank">中软国际</a></li>
					<li><a href="#" target="_blank">法律申明</a></li>
				</ul>
			</div><!-- footer-links结束 -->
			<div class="copyright">技术支持重庆游致科技有限公司 copyright&copy2004-2017 XXXXX 版权所有</div>
		</div><!-- footer-left结束 -->
		<div class="footerRight">
		    <img alt="二维码" src="img/weixin_qrcode.jpg">
		</div>
   </div>
</body>
</html>
