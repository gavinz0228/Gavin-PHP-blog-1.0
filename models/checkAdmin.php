<?php
require "models/checkLogin.php";
if(!$loggedin)
{
	alert("You logged in session has expired.\n Please Log in again!");
	js("location.href='/admin/'");
}
?>