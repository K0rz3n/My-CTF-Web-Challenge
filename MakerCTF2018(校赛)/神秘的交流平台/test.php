<?php

include("./check_inv_code.php");
//error_reporting(0);
if(!check_ip($_SERVER['HTTP_X_FORWARDED_FOR'])){
	header('HTTP/1.1 403 Forbidden');
	die("<html>
			<head>
			</head>
			<body>
				<center>
					<h2>Your IP address is not allowed.</h2>
				</center>
			</body>			
		</html>");
}

if(array_key_exists("rf", $_GET)){
	$page = $_GET['rf'];
	if($page != ''){
		include $page.".php" ;
	}
}
else{
	echo '<script>window.location.href = "./test.php?rf="</script>';
}


?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	</head> 
	<body>
		<center>
			<h2>管理员测试页： rf=include($input.".php");</h2>
			<h3>----测试完毕后请立即删除----</h3>
		</center>
	</body>
</html>
