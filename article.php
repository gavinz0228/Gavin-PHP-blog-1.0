<?php
require "models/dbhelper.php";
require "models/category.php";
require "models/blogInfo.php";
require "models/articles.php";
require "models/comment.php";
include "models/checkLogin.php";
if(isset($_GET["id"])&&is_numeric($_GET["id"]))
{	$id=$_GET["id"];
	$blog=new articles();
	$art=$blog->getArticleById($id);
	$blog->addReadTimes($id);
	$pageTitle="Gavin's Blog - ".$art["a_title"];
	$boxTitle=$art["a_title"];

	$pageContent.=" Published Time: <span id='article_ptime'>".$art["a_time"]."</span> | ";
	$pageContent.=" Read Times: <span id='article_rtimes'>".$art["a_read_times"]."</span>";
	$pageContent.=<<<EOT
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=205031026367088";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-like" data-href="https://setupcool.com/article/{$id}" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>	
EOT;
	
	$pageContent.="<hr/>";
	$pageContent.=$art["a_content"];
	if($loggedin)
		$editPage="/edit_article.php?id=".$id;
	$com=new comment();
	$pageContent.=$com->getHTMLById($id);
	
	
	require "template/master.php";
	}
?>