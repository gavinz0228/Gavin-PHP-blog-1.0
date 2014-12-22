<?php
session_start();
if(isset($_SESSION["admin"])&&$_SESSION["admin"]=="admin")
	$loggedin=true;
else
	$loggedin=false;
?>