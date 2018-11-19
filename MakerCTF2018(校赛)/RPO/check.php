<html>
<head>
	<title>网友提交查看</title>
	<meta http-equiv = 'Content-Type' content ='text/html; charset=utf-8'>
	<script>
		function submit(id){
			var xhr = new XMLHttpRequest();
			var id = id-1;
			element = document.getElementsByName("url")[id];
			xhr.open("POST", 'check.php', false);
			xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			xhr.send("visited=" + element.id);
			location.href = element.href;
		}
	</script>
<head>
<body>
	<center>

<?php

//error_reporting(0);
if($_COOKIE['DENGLU'] && $_COOKIE['DENGLU'] == "NCINehEJOIRJ90A12U329W9JDWIQHD82312IOJHD"){
	echo "<h2>下面是有漏洞的链接一定要每条都认真看 O(∩_∩)O~~</h2>";
	$conn = mysql_connect("ctf.k0rz3n.com","root","123456");
	if(!$conn){
			die("Couldn't connect:".mysql_error()); 
	}
	mysql_select_db("message",$conn);
	$sql = "SELECT * FROM contents";
	$res = mysql_query($sql,$conn);
	while($row = mysql_fetch_array($res)){
			echo "<p>".$row['id'].'&nbsp;&nbsp;&nbsp;&nbsp;'."<a id='".$row['id']."' href=".htmlspecialchars($row['content'])." flag = ".$row['status']." name ='url' onclick='submit(this.id);'>".htmlspecialchars($row['content'])."</a>"."</p>";
			echo "<p>----------------------------------------------------------------------------------------------------------------</p>";
	}
}
else{
	header("HTTP/1.1 403 Forbidden");
	die("<html><head><title>403 Forbidden</title><meta http-equiv='Content-Type' content='text/html; charset=utf-8'></head>
<body bgcolor='white'>
<center><h1>403 Forbidden</h1><h2>只有管理员才能看哦</h2></center></html>");
}

function change(){
	if(isset($_POST['visited'])){
		$id = $_POST['visited'];
		//test
		$fp = fopen("./".$id.".html", "w");
		fwrite($fp, $id);
		fclose($fp);
		//
		$conn = mysql_connect("ctf.k0rz3n.com","root","123456");
		if(!$conn){
				die("Couldn't connect:".mysql_error()); 
		}
		mysql_select_db("message",$conn);
		$sql = "UPDATE contents SET status =1 WHERE id =".$id;
		mysql_query($sql,$conn);
		mysql_close($conn);
	}
}
change();
?>
	</center>	
</body>
</html>





