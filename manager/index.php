<?php
include("config.php");
if(isset($_POST["replace"])){
	$content=$_POST["code"];
	file_put_contents($config["codefile"],$content);
}
if(isset($_POST["add"])){
	$content=@file_get_contents($config["codefile"]);
	$content.="\r\n".$_POST["code"];
	file_put_contents($config["codefile"],$content);
}
if(isset($_POST["delete"])){
	file_put_contents($config["codefile"],"");
}
?>
Now/Replace:<br>
<form method="POST">
<input type="hidden" name="replace" value="replace">
<textarea name="code" cols="100" rows="10">
<?=htmlentities(@file_get_contents($config["codefile"]))?>
</textarea>
<br>
<input type="submit" value="Replace">
</form>

Add:<br>
<form method="POST">
<input type="hidden" name="add">
<textarea name="code" cols="100" rows="10">
</textarea>
<br>
<input type="submit" value="Add">
</form>

<form method="POST">
<input type="hidden" name="delete">
<input type="submit" value="Delete All">
</form>