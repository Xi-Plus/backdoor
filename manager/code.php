<?php
include("config.php");
if(@$_GET["pwd"]==$config["password"]){
	echo file_get_contents($config["codefile"]);
	unlink($config["codefile"]);
}
?>