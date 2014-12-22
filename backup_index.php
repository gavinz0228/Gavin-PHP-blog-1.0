<?php
require "models/dbhelper.php";
require "models/category.php";
require "models/blogInfo.php";

$pagetitle="Gavin's Blog - Home";
$boxtitle="About This Website";
$bi=new blogInfo();
$info=$bi->getBlogInfo();

$filepath=$info["i_home_info"];
require "template/master.php";
?>