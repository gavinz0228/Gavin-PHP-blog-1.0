<?php

require "data/dbhelper.php";
require "data/category.php";

?>

<!DOCTYPE html>
<head>
		<title></title>
<link rel="stylesheet" type="text/css" href="css/default.css">
<style>
@font-face {
  font-family: 'Montserrat Alternates';
  font-style: normal;
  font-weight: 20;
  src: local('MontserratAlternates-Regular'), url(font/Montseralternate.ttf) format('truetype');
}
</style>
</head>
<body>
	<div id="banner">
		<div id="banner_left"><img src="images/icon.png" height="50" width="50" /></div>
		<div id="banner_right"><a href="#">Bookmark</a></div>
	</div>
<?php include "template/nav.php";?>
	
	<div id="main_box">
		<div id="main_left_box">
			<? require "template/blog_category.php";?>
		</div>
		<div id="main_right_box">
			<div class="articles">
				<div class="box_title">About This Website</div>
				<div class="content">
					<p>y</p> <p> y</p> <p> y</p> <p>y </p>
					<p>y</p> <p> y</p> <p> y</p> <p>y </p>
					<p>y</p> <p> y</p> <p> y</p> <p>y </p>
					<p>
					 Designed By Jialang Zhang
					</p>
					
					
				</div>
			</div>
		</div>
	</div>
	<div id="foot_box">
	</div>
	
	
</body>
</html>