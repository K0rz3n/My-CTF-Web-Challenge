<?php
error_reporting(0);
function check_inv_code($code){
	if(preg_match('/^(?![A-WYZ]{4})[A-Z]{4}-(?![A-CE-Z]{4})[A-Z]{4}-(?![A-RT-Z]{4})[A-Z]{4}-(?![A-DF-Z]{4})[A-Z]{4}-(?![A-BD-Z]{4})[A-Z]{4}$/',$code)){
		//XAEF-DESF-SDER-ESDR-CSDE
		return true;
	}
	else{
		return false;
	}
}

function get_ip(){
	if(check_inv_code($_POST['TOKEN'])){
		$code_name = $_POST['name'];
		echo "Congratulations, ".$code_name." ! Your ip is 172.31.".rand(1,10).".".rand(2,254)."  and you can access 46c48bec0d282018b9d167eef7711b2c.php with your IP to upload your article";
	}
	else{
		echo "Sorry , your invitation code is wrong , please try again!";
	}
}


function check_ip($ip){
	if(preg_match('/^172\.31\.([1-9]|10)\.([1-9]?[2-9]|1\d{2}|2[0-4]\d|25[0-4])$/', $ip)){
		return true;
	}
	else{
		return false;
	}

}