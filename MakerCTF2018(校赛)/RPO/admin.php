<?php
error_reporting(0);
if($_COOKIE['DENGLU'] && $_COOKIE['DENGLU'] == "NCINehEJOIRJ90A12U329W9JDWIQHD82312IOJHD"){
	echo "flag{asdhoqihe128498129u4jlk1h2edpi1h34948e1903ujd}";
}
else{
	header("HTTP/1.1 403 Forbidden");
	die("<html><head><title>403 Forbidden</title><meta http-equiv='Content-Type' content='text/html; charset=utf-8'></head>
<body bgcolor='white'>
<center><h1>403 Forbidden</h1><h2>只有管理员才能看哦</h2></center></html>");
}


?>