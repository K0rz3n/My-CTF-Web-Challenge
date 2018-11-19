<?php
error_reporting(0);
if(isset($_GET['dir']) && isset($_GET['page'])){
	$dir = $_GET['dir'];
	$page = $_GET['page'];
	include("users/$dir/$page.html");
}
else if(isset($_POST['link'])){
	include("home.html");
	include("conn_.php");
}
else{
	include("home.html");
}

?>