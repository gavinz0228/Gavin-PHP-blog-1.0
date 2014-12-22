<!DOCTYPE html>
<head>
		<title><?=$pageTitle?></title>
<link rel="stylesheet" type="text/css" href="/css/default.css">
<link rel="shortcut icon" href="/images/icon.ico" />
<style>
@font-face {
  font-family: 'Montserrat Alternates';
  font-style: normal;
  font-weight: 20;
  src: local('MontserratAlternates-Regular'), url(/font/Montseralternate.ttf) format('truetype');
}
</style>
<?if($loggedin){?>
<link href="/css/admin.css" rel="stylesheet" type="text/css" /> 
<script src="/js/admin.js" type="text/javascript"></script> 
<?}?>
</head>
<body>
	<div id="banner">
		<div id="banner_left"><img src="/images/home_icon.gif"></div>
		<div id="banner_right"><a href="#">Bookmark</a></div>
	</div>
	
<? require "template/nav.php"?>
	
	<div id="main_box">
		<div id="main_left_box">
			<?require "template/blog_category.php"?>			
			<div id='comments'><div class='box_title'>Recent Comments</div>
<div class='comment_box'><div class='comment_article'><a href='/article/1'>The PDO(PHP Data Object) Class</a></div><div class='comment_item'><a href='/article/1/#m1'>This is a good article!</a></div></div>			</div>
		</div>
		<div id="main_right_box">
			<div class="articles">
				<div class="box_title"><?=$boxTitle?><? if ($loggedin&&isset($editPage)&&$editPage!="") 
				echo "[<a href='#' onclick=edit_open('".$editPage."')>Edit</a>]"?></div>
				<div class="content">
					<?=$pageContent?>			
					
				</div>
			</div>
		</div>
	</div>
	<div id="foot_box">
		Designed and Programmed By Gavin(Jialang) Zhang As An Experiment!<br/>
		Thanks for visiting
	</div>	
<div id="edit_bg">
	<div id="close_panel" onclick="edit_close()">[Close]</div>
	<div id="edit_panel">For admin's use</div>
</div>
</body>
</html>