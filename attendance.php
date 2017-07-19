<?php 
date_default_timezone_set('Asia/Shanghai');
    $uid = $_COOKIE['uid'];
    if(empty($uid)){
        header("location:login.html");
    }
    $mysql = mysqli_connect("localhost", "root", "", "shixun");
    mysqli_set_charset($mysql, "utf8");
    $sql_check = "select * from user where id='{$uid}'";
    $re_check = mysqli_query($mysql, $sql_check);
    $data = mysqli_fetch_assoc($re_check);
    if(empty($data)){
        echo "<script>alert('非法操作');location.href='login.html';</script>";
    }
   
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>我的考勤</title>
<link type="text/css" rel="stylesheet" href="css/main.css">
<style type="text/css">
	.checkConLeft ul li:nth-child(2){border:1px solid #0f8ff2;}
	.checkConLeft ul li:nth-child(2):before,.checkConLeft ul li:nth-child(2):after{background-color:#0f8ff2;}
	.checkConLeft ul li:before,.checkConLeft ul li:after{
	    content:"";
    	position:absolute;
	}
	.checkConLeft ul li:before{
    	top:18px;
    	left:156px;
		
    	width:17px;
    	height:2px;
    }
	.checkConLeft ul li:after{
        top:11px;
        left:173px;
		
		border-radius:50%;
        width:15px;
        height:15px;
		
        background-color:#eaeaea; 
    }
    .recordBox,.recordBox img{
	    border-radius: 3px;
    }
	.recordBox{
    	display:inline-block;	
    	float:left;
    	
    	border: 1px solid #f1f1f1;
    	width: 340px;
        height: 170px;
    		
    	margin: 5px;	
        padding: 10px;
        
        transition: all .2s;
    }
    .recordBox:hover{
    	border-color:#ffb83b;
    	background:#fafafa;
    	box-shadow:0 0 8px #999;
    }
    .recordBox img{
    	width: 230px;
        height: 170px;
    }
    .recordBox ul{
    	float:right;
        width: 100px;
        padding-left: 4px;
    }
	.recordBox li a{
    	display: block;
    	overflow: hidden;
    				
    	width: 70px;
        height: 28px;
    		
        font-size: 12px;
    	line-height: 28px;	
        text-align: center;
        vertical-align: middle;
        
        color: #6c6c6c;
        background: url(img/my.png) no-repeat -92px -247px;
        
        margin: 20px auto;
        padding-left: 20px;
    }
    .recordBox li a:hover{
    	color:#fff;
        background: url(img/my.png) no-repeat 0px -247px;
    }
</style>
</head>
<body>
<div class="loginTop clear">
	<div class="topLeft">
		<img src="img/logo.png"/>
		<span></span>
	</div>
	<div class="topRight registerTr">
		<span>欢迎您，<?php echo $data['account'];?></span> <a href="logout.php">注销</a>
	</div>
</div>
<div class="checkWorkContent clearfix">
	<div class="checkTop clearfix">
		<div class="checkTopTitle">
		
			<dl class="topInfo">
				<dd class="userName">暂无昵称<b></b></dd>
				<dd>账&nbsp;&nbsp;号：<?php echo $data['account'];?></dd>
				<dd>上一次登录时间：<?php echo $_COOKIE['lastLoginTime'];setcookie('lastLoginTime',date('Y-m-d H:i:s'),time()+24*3600*365);?></dd>
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
		</div><!-- checkConLeft结束 -->
		<div class="checkConRight">
			<div class="rightTitle"><h1>我的考勤</h1></div>
			<div class="recordContent">
				<div class="recordBox clear">
					<a href="attendance.php">
					    <img alt="教室图片" src="img/recordImg.jpg">
					</a>
					<ul>
						<li><a href="attendanceAction.php?address=崇礼楼&action=1">签到</a></li>
						<li><a href="attendanceAction.php?address=崇礼楼&action=2">迟到</a></li>
						<li><a href="attendanceAction.php?address=崇礼楼&action=3">请假</a></li>
					</ul>
				</div>
				<div class="recordBox">
					<a href="attendance.php">
					    <img alt="教室图片" src="img/recordImg.jpg">
					</a>
					<ul>
						<li><a href="attendanceAction.php?address=崇仁楼&action=1">签到</a></li>
						<li><a href="attendanceAction.php?address=崇仁楼&action=2">迟到</a></li>
						<li><a href="attendanceAction.php?address=崇仁楼&action=3">请假</a></li>
					</ul>
				</div>
				<div class="recordBox">
					<a href="attendance.php">
					    <img alt="教室图片" src="img/recordImg.jpg">
					</a>
					<ul>
						<li><a href="attendanceAction.php?address=崇义楼&action=1">签到</a></li>
						<li><a href="attendanceAction.php?address=崇义楼&action=2">迟到</a></li>
						<li><a href="attendanceAction.php?address=崇义楼&action=3">请假</a></li>
					</ul>
				</div>
				<div class="recordBox">
					<a href="attendance.php">
					    <img alt="教室图片" src="img/recordImg.jpg">
					</a>
					<ul>
						<li><a href="attendanceAction.php?address=钩深楼&action=1">签到</a></li>
						<li><a href="attendanceAction.php?address=钩深楼&action=2">迟到</a></li>
						<li><a href="attendanceAction.php?address=钩深楼&action=3">请假</a></li>
					</ul>
				</div>
				<div class="recordBox">
					<a href="attendance.php">
					    <img alt="教室图片" src="img/recordImg.jpg">
					</a>
					<ul>
						<li><a href="attendanceAction.php?address=诚意楼&action=1">签到</a></li>
						<li><a href="attendanceAction.php?address=诚意楼&action=2">迟到</a></li>
						<li><a href="attendanceAction.php?address=诚意楼&action=3">请假</a></li>
					</ul>
				</div>
				<div class="recordBox">
					<a href="attendance.php">
					    <img alt="教室图片" src="img/recordImg.jpg">
					</a>
					<ul>
						<li><a href="attendanceAction.php?address=正心楼&action=1">签到</a></li>
						<li><a href="attendanceAction.php?address=正心楼&action=2">迟到</a></li>
						<li><a href="attendanceAction.php?address=正心楼&action=3">请假</a></li>
					</ul>
				</div><!-- recordBox结束 -->
			</div><!-- recordContent结束 -->
 		</div><!--checkConRight结束 -->
	</div><!-- checkContent结束 -->
</div><!-- checkWorkContent结束 -->

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
			</div><!-- footerLinks结束 -->
			<div class="copyright">技术支持重庆游致科技有限公司 copyright&copy2004-2017 XXXXX 版权所有</div>
		</div><!-- footerLeft结束 -->
		<div class="footerRight">
		    <img alt="二维码" src="img/weixin_qrcode.jpg">
		</div>
   </div>
</body>
</html>