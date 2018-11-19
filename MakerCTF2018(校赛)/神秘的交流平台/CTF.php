<?php
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
	else if(is_post() && is_ajax()){
		$n=rand(1,5);
		switch($n){
			case '1':
				echoJSON('SWYgeW91IHdhbnQgZnVydGhlciBpbmZvcm1hdGlvbiwgcGxlYXNlIHVzZSBQT1NUIHRvIGFjY2VzcyAvCTRkZjgxMGZmOWQwY2FiOGUzNDI0NjlmZTNhOWFhODg1LnBocC4=','BASE64');
				break;
			case '2':
				echoJSON('Vs lbh jnag shegure vasbezngvba, cyrnfr hfr CBFG gb npprff/4qs810ss9q0pno8r342469sr3n9nn885.cuc.','ROT13');
				break;
			case '3':
				echoJSON('JFTCA6LPOUQHOYLOOQQGM5LSORUGK4RANFXGM33SNVQXI2LPNYWCA4DMMVQXGZJAOVZWKICQJ5JVIIDUN4QGCY3DMVZXGIBPBE2GIZRYGEYGMZRZMQYGGYLCHBSTGNBSGQ3DSZTFGNQTSYLBHA4DKLTQNBYC4===','BASE32');
				break;
			case '4':
				echoJSON('da1b12b09fe8b3fa8c1bdbd6185a8560','MD5');
				break;
			case '5':
				echoJSON('c1b48c46','CRC-32');
				break;
		}
		
	}
}


main();


?>