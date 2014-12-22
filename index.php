<?php
require "models/dbhelper.php";
require "models/category.php";
require "models/blogInfo.php";
require "models/comment.php";
include "models/checkLogin.php";
$pageTitle="Gavin's Blog - Home";
$boxTitle="About This Website";
$bi=new blogInfo();
if($loggedin)
	$editPage="/edit_index.php";
$pageContent=$bi->getBlogInfo();
require "template/master.php";
?>