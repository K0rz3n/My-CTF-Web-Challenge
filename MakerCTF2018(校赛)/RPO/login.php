<html>
	<head>
		<meta http-equiv="Content-Type" content = "text/html; charset=utf-8">
		<title>
			后台管理
		</title>
		<style>
			#log {
				position:absolute; /*绝对定位*/
				top:50%; /*距顶部50%*/
				left:50%;
				margin:-100px 0 0 -150px; /*设定这个div的margin-top的负值为自身的高度的一半,margin-left的值也是自身的宽度的一半的负值.(感觉在绕口令)*/
				width:300px; /*宽为400,那么margin-top为-200px*/
				height:200px; /*高为200那么margin-left为-100px;*/
				z-index:99; /*浮动在最上层 */
			}

			#button{
				margin-top: 40;
				margin-left: 180px;
				height:40;
				width:100;
				background: #AADFFD;
    			border-color: #78C3F3;
    			color: #004974;
    			text-decoration: none;
			}

			#login{
				margin-left: 190px;
			}

			#name,#password{
				height:40;
				width:500;
			}

			#name:focus{
				outline: 0;
  			 	border: 1px solid #f95d5d;
    			box-shadow: 0px 0px 10px 0px #f95d5d;
			}
			#password:focus{
				outline: 0;
  			 	border: 1px solid #f95d5d;
    			box-shadow: 0px 0px 10px 0px #f95d5d;
			}

			#tip{
				margin-top: 40;
				margin-left:0px;
				width:1000;
				color:#F00			
			}

		</style>
	</head>
	<body>
		<div id = "log">
			<h2 id = "login">后台登录</h2>
			<form action = "#" method = "POST">
			name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type = "text" name = "name" id = "name"><br>
			password:<input type = "text" name = "password" id = "password"><br>
			<input type= "submit" name = "submit" value = "提交" id = "button">
			</form>
		<div>



<?php
error_reporting(0);
if($_POST['password'] && $_POST['password'] != ""){
	echo "<div id ='tip'><h3>Sorry, your name or password is wrong please try again.<br>Unless you have the ability to get admin's cookie</h3></div>";
}

if($_COOKIE['DENGLU'] && $_COOKIE['DENGLU'] == "NCINehEJOIRJ90A12U329W9JDWIQHD82312IOJHD"){
	header("Location:/admin.php");
	die();
}


?>

	</body>
</html>



