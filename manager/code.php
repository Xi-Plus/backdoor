<?php
include("config.php");
echo file_get_contents($config["codefile"]);
if(@$_GET["pwd"]==$config["password"]){
	file_put_contents($config["codefile"],"");
}
?>