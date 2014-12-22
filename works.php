<?php
require "models/dbhelper.php";
require "models/category.php";
require "models/blogInfo.php";
require "models/comment.php";
include "models/checkLogin.php";
$pageTitle="Gavin's Blog - List of My Works";
$boxTitle="My Works";
if($loggedin)
	$editPage="/edit_works.php";
$info=new blogInfo();
$pageContent=$info->getWorks();
require "template/master.php";
?>