<?php
//获取邀请码.php(js中有访问)
error_reporting(0);

function is_ajax(){
	return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH'])=='XMLHTTPREQUEST';   
}

function is_get(){
	return isset($_SERVER['REQUEST_METHOD']) &&  strtoupper($_SERVER['REQUEST_METHOD'])=='GET';
}

function is_post(){
	return isset($_SERVER['REQUEST_METHOD']) && strtoupper($_SERVER['REQUEST_METHOD'])=='POST';    
}  
 
  
function echoJSON($content,$enctype){
      	$data = array('status' => '200','success' => '1','data' => array('content' => $content, 'enctype' => $enctype));
        $jsonstring = json_encode($data);
        header('Content-Type: application/json');
        echo $jsonstring;
    }

function main(){
	if(is_get()){
		header('HTTP/1.1 405 Method Not Allowed');
		exit();
	}
	else if(is_post()){
		$invitation_code = make_inv_code();
		$invitation_code = base64_encode($invitation_code);
		echoJSON($invitation_code,'BASE64');
	}
}



function make_inv_code(){
	$code = array();
	$arr_lett = array("X","D","S","E","C");
	for($i = 0;$i < 5;$i++){
		array_push($code,group_inv($arr_lett[$i]));
	}
	$inv_code = join("-",$code);
	return $inv_code;
}



function group_inv($letter){
	$inv_code = "";
	for($i =0 ;$i <3 ;$i++){
		$inv_code.= chr(rand(65,90));
	}
	return substr_replace($inv_code,$letter,rand(0,3),0);
}









main();