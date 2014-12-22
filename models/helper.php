<?php
function js($jcode)
{
	echo "<script>".$jcode."</script>";
}
function alert($text)
{
	js("window.alert('".$text."')");
}

?>