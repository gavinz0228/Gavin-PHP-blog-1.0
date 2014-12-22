<?php
require "models/dbhelper.php";
require "models/category.php";
require "models/blogInfo.php";
require "models/comment.php";
include "models/checkLogin.php";

$pageTitle="Gavin's Blog - Ways to Contact Me";
$boxTitle="Contact Information";
if($loggedin)
	$editPage="/edit_contact.php";
$info=new blogInfo();

$pageContent.=$info->getContactInfo();
require "template/master.php";
?>