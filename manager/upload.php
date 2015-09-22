<?php
include("config.php");
if(@$_POST["pwd"]==$config["password"]&&isset($_POST["result"])){
	file_put_contents("result/".date("Y_m_d_h_i_s").".txt",$_POST["result"]);
}
?>