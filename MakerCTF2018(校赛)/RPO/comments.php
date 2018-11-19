<html>
	<head>
		<meta http-equiv = "Content-Type" content= "text/html; charset=utf-8">
		<style>
			#kuang,#code{
				height:40;
				width:500;
				margin-left: 0px;
				margin-top: 20px;
			}

			#kuang:focus{
				outline: 0;
  			 	border: 1px solid #f95d5d;
    			box-shadow: 0px 0px 10px 0px #f95d5d;
			}

			#code:focus{
				outline: 0;
  			 	border: 1px solid #f95d5d;
    			box-shadow: 0px 0px 10px 0px #f95d5d;
			}
			#tijiao,#view{
				height:40;
				background: #AADFFD;
    			border-color: #78C3F3;
    			color: #004974;
    			text-decoration: none;
			}
			#add{
				display:none;
			}
		</style>
		<title>评论区</title>
	</head>
	<body>
		<center>
			<h2>下方输入你对本博客的评价</h2>
			<form action = "#" method = "POST">
				英文id:&nbsp;&nbsp;&nbsp;<input name = "code" type = "text" id = "code"><br>
				你的评论:<input name = "contents" type = "text" id = "kuang"><br><br>
				<input name = "submit" type = "submit" value = "点击提交" id =  "tijiao">
				<input name = "submit" type = "button" value = "点击预览" id = "view" onclick = "jump();">
			</form>
		</center>

		<script>
			var jump = function(){
				
				window.location.href = document.getElementById('add').innerHTML;
			} 
		</script>
		<p id = "add" ></p>
	</body>
</html>

<?php
error_reporting(0);

function check($str){
	if(preg_match('/[\x{4e00}-\x{9fa5}]/u', $str)>0){
    	return true;
	} 
	else {
		return false;
	}
}



function create_dir(){ 
	$dir = iconv("UTF-8", "GBK", "./users/".strtolower($_POST['code']));
        if (!file_exists($dir)){
            mkdir ($dir,0777,true);
       }
}

function create_html($id){
	$content = htmlspecialchars(trim($_POST['contents']));
	$fp = fopen("./users/".$_POST['code']."/".$id.".html", "w");
	fwrite($fp, $content);
	fclose($fp);
	$site = 'index.php/users/'.$_POST['code'].'\/html\/'.$id;
	return $site;

	
	
	
}



function main(){
	if($_POST['code'] && $_POST['code'] != "" && $_POST['contents'] && $_POST['contents'] != ''){
		if(!check($_POST['code'])){
			create_dir();
			$dir = "./users/".htmlspecialchars(trim($_POST['code']))."/";
			$number = count(scandir($dir))-1;
			$loc = create_html($number);
			echo "
			<script>
				var add = document.getElementById('add');
				add.innerHTML = '".$loc."';
			</script>
			";
		}
		else{
			echo "<html>
					<center>
						<h3 style='color:#F00'>请确保您是非中文ID</h3>
					</center>
				</html>";
		}
		
	}
	else if($_POST['code'] != "" || $_POST['contents'] != ''){
		echo "<html>
				<center>
					<h3 style='color:#F00'>请确保您的信息填写完整</h3>
				</center>
			</html>";
	}

}

main();

?>