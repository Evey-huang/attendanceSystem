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
<title>个人资料</title>
<link type="text/css" rel="stylesheet" href="css/main.css">
<style type="text/css">
	.checkConLeft ul li:nth-child(1){border:1px solid #0f8ff2;}
	.checkConLeft ul li:nth-child(1):before,.checkConLeft ul li:nth-child(1):after{background-color:#0f8ff2;}
	.checkConLeft ul li:before{content:"";position:absolute;top:18px;left:156px;width:17px;height:2px;}
	.checkConLeft ul li:after{content:"";position:absolute;top:11px;left:173px;width:15px;height:15px;background-color:#eaeaea;border-radius:50%;}
	.infoBox table{border:1px solid #d9d9d9;width:700px;font-size:14px;margin-bottom:20px;}
	.infoBox th{height:50px;font-weight:500;}
	.infoBox .infoTr th{border-bottom:1px solid #d9d9d9;}
	.thLeft{width:140px;background:#fafafa;text-align:right;}
	.thRight{text-align:left;padding-left:20px;}
	#edit{color:#fff;background:#ffab16;font-size:14px;width:140px;height:40px;border:none;border-radius:5px;display:block;margin:0 auto;}
</style>
</head>
<body>
<div class="loginTop clear">
	<div class="topLeft">
		<img src="img/logo.png"/>
		<span></span>
	</div>
	<div class="topRight registerTr">
		<span>欢迎您，<?php echo $data['account'];?> </span><a href="logout.php">注销</a>
	</div>
</div>
<div class="checkWorkContent clearfix">
	<div class="checkTop clearfix">
		<div class="checkTopTitle">
			<dl class="topInfo">
				<dd class="userName">暂无昵称<b></b></dd>
				<dd>账&nbsp;&nbsp;号：<?php echo $data['account'];?></dd>
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
		<div class="checkConRight perInfo">
			<div class="rightTitle"><h1>个人资料</h1></div>
			<form class="infoBox" action="infoAction.php" method="post">
				<table>
					<tr class="infoTr">
						<th class="thLeft">姓名:</th>
						<th class="thRight"><?php echo $data['account'];?></th>
					</tr>
					<tr class="infoTr">
						<th class="thLeft">性别:</th>
						<th class="thRight">未填</th>
					</tr>
					<tr class="infoTr">
						<th class="thLeft">身份证号:</th>
						<th class="thRight">1234567890</th>
					</tr>
					<tr class="infoTr">
						<th class="thLeft">出生日期:</th>
						<th class="thRight">1996-05-17</th>
					</tr>
					<tr class="infoTr">
						<th class="thLeft">所在地区:</th>
						<th class="thRight">未填</th>
					</tr>
					<tr class="infoTr">
						<th class="thLeft">所属行业:</th>
						<th class="thRight">IT行业</th>
					</tr>
					<tr class="infoTr">
						<th class="thLeft">月收入状况:</th>
						<th class="thRight">未填</th>
					</tr>
					<tr class="infoTr">
						<th class="thLeft">QQ:</th>
						<th class="thRight">未填</th>
					</tr>
					<tr>
						<th class="thLeft">微信:</th>
						<th class="thRight">未填</th>
					</tr>
				</table>
			</form>
			<input type="submit" id="edit" name="Submit" value="编辑"/>
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