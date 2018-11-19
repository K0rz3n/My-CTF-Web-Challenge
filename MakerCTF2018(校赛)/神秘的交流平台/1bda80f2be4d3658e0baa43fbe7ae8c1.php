<?php
//view.php
ob_start();
include("./check_inv_code.php");
error_reporting(0);
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
function check_filename($file){
		if(preg_match('/^[0-9a-zA-Z]{16}$/i',$file)){
			header("Location:./Uploads/".$file.".txt");
			exit();
		}
		else{
			echo "<h3 style='color:#F00'>Please do not enter illegal characters.</h3>";
		}
}

?>

<html>
	<head>
		<style>

		</style>
	</head>
	<body>

		<center>
			<h2>Please enter the name of the document you want to read.</h2>
			<form method = "post" action = "#">
				<input type = "text" name =  "file">.txt
				<input type = "submit" value = "read it">
			</form>
			<div id = "sub">
				<?php
					if($_POST['file'] && $_POST['file'] != ""){
					$file = $_POST['file'];
					$file = htmlspecialchars(trim($file),ENT_QUOTES);
					check_filename($file);
				}
				?>
			</div>
		</center>
	</body>
</html>