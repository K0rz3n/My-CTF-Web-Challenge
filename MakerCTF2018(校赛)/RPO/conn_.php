<?php
error_reporting(0);
function check_url($url){
	if(!preg_match('/http:\/\/ctf.k0rz3n.com\/[^\s]+\??[\w=&\+\%]*/is',$url)){
		return false;
	}
	return true;
}


$conn = mysql_connect("ctf.k0rz3n.com","root","123456");
if(!$conn){
	die("Couldn't connect".mysql_error());
}

mysql_select_db("message",$conn);
if(isset($_POST['link']) && $_POST['link'] != "" ){
	if(check_url($_POST['link'])){
		$message = htmlspecialchars(mysql_real_escape_string($_POST['link']));
		$sql = "INSERT INTO contents(content,status) VALUES ('".$message."',0)";
		mysql_query($sql,$conn);
		
		echo "<script>
				var ins = document.getElementById('insert2');
				ins.innerHTML ='<h2>提交成功，客官你真厉害，嘤嘤嘤..............</h2>';
			</script>";
	}
	else{
		echo "<script>
				var ins = document.getElementById('insert1');
				ins.innerHTML = '<h2>客官,请再检查一下你的URL地址哦！</h2>';
			</script>";
	}
	mysql_close($conn);
	
}

?>