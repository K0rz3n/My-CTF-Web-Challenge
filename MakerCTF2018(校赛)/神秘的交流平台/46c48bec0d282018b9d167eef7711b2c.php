<?php
//up.php
error_reporting(E_ALL & ~E_NOTICE);
include("./check_inv_code.php");
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
if($_POST['submit']){
	$raw_name = $_FILES['file']['name'];
	$temp_file = $_FILES['file']['tmp_name'];
	$save_file =rand_name().".txt";
	$ext = trim(test_ext($raw_name));
	if($ext === 'txt'){
		if(move_uploaded_file($temp_file, './Uploads/'.$save_file)){
			die("
				<html>
					<head>
					</head>
					<body>
						<center>
							<h2>The article has uploaded successfully!</h2><br>
							<h3>Your filename is ".$save_file." and you can read it by visiting /1bda80f2be4d3658e0baa43fbe7ae8c1.php</h3>
						</center>
					</body>			
				</html>
				 ");
			exit();
		}
		else{
			 die('Upload failed..');
		}

	}
	else{
		die("<center><h3 style='color:#F00'>Sorry,You can only upload TXT files.</h3></center>");
	}
}





function test_ext($filename){
	return strtolower(substr($filename,strrpos($filename,'.')+1));
}

function rand_name(){
	$new_name = '';
	$str = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	for ($i = 0; $i < 16; $i++){
		$new_name.= $str[rand(0,strlen($str)-1)];
	}
	return $new_name;
}


?>


<html>
	<head>

	</head>
	<body>
		<center>
			<h2>You can upload your article from this page and the suffix of the file must be TXT.</h2>
			<form method="post" action="#" enctype="multipart/form-data">
				<input type="file" name="file" value=""/>
				<input type="submit" name="submit" value="upload">
			</form>
		</center>
	</body>
</html>

