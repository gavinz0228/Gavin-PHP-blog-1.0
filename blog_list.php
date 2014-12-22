<?php
require "models/dbhelper.php";
require "models/category.php";
require "models/blogList.php";
require "models/pagination.php";
require "models/comment.php";
include "models/checkLogin.php";
$pageTitle="Gavin's Blog - My Blogs";

$pageSize=20;
if($loggedin)
{	
	$pageContent.="<a href='#' onclick='add_article()'><h1><span class='hl'> ++ Add an article</span></h1></a>";
}

//start to make the list
$pageContent.="<ul>";
if(isset($_GET["page"])&&is_numeric($_GET["page"]))
{
	$pageNum=$_GET["page"];
}
else{
$pageNum=1;
}

if(isset($_GET["typeid"])&&is_numeric($_GET["typeid"]))
{
	$id=$_GET["typeid"]; //it's also for pagination
	//get blog list of specific type from database
	$bl=new blogList($pageSize,$pageNum,$id);
	$boxTitle.=" - ( ".$bl->blogCount." )";
	//get category's name
	$blist=$bl->getBlogListByType($_GET["typeid"]);
	$cate=new category();
	$_cate=$cate->getCategoryById($id);
	$boxTitle="Articles of Category - ".$_cate["c_name"];//assign to the box title
	
}
else
{	
	//get the general blog list from database
	$bl=new blogList($pageSize,$pageNum);
	$boxTitle.=" - ( ".$bl->blogCount." )";
	$blist=$bl->getBlogList();
	$boxTitle="All of My Blogs";
	$id=""; //for pagination: not to forget the parameter of typeid when it turns to another page
}
//get the numbers that stand in front of each title of the list
$counter=($pageNum-1)*$pageSize+1;
if($blist!=null)
	foreach($blist as $blog)
	{
		$pageContent.="<li>".$counter.". <a class='blog_list_title' href='/article/".$blog["a_id"]."'>".$blog["a_title"]."</a> [ <a href='/category/".$blog["c_id"]."'>".$blog["c_name"]."<a> ] - ".$blog["a_time"]."</li>";
		$counter++;
	}
else
{
	$pageContent="There is no article under this category so far.";
}
$pageContent.="</ul>";
//Start to do pagination
$pageCount=$bl->pageCount;
$id=$id==""?"/blog_list":"/blog_list/type/".$id;
$page=new pagination($pageSize,$pageNum,$pageCount,$id);
$pageContent.=$page->getHTML();
//all set, call the master page
require "template/master.php";
?>