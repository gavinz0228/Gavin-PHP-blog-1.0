<?php
require "models/dbhelper.php";
require "models/articles.php";
require "models/helper.php";
require "models/category.php";
require "models/checkAdmin.php";


//create options of select controll
$cate=(new category())->getCategories();
if(is_array($cate))
{
	foreach($cate as $c)
	{
		$check=$c["c_id"]==$category?"selected":"";
		$options.="<option value='".$c["c_id"]."' ".$check." >".$c["c_name"]."</option>";
	}
}


$art=new articles();
//every field needs $content=html_entities($article["a_title"]); ,except for <textarea></textarea>
if(strtolower($_SERVER["REQUEST_METHOD"])=="post")
{
	if($_POST["editor"]!=""&&$_POST["title"]!="")
	{	
		$art->addArticle(array(
		"id"=>$_POST["id"],
		"title"=>$_POST["title"],
		"content"=>$_POST["editor"],
		"category"=>$_POST["category"],
		"readTimes"=>$_POST["read_times"]
		));
		alert("It has been added successully!");
		js("window.parent.edit_close()");
	}
	
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Works editing</title>
<script src="/editor/ckeditor.js"></script>
<style>
body
{
	font-size:18px;
	font-family:"Arial";
	
}
.row{
	display: table-row;
	height:30px;
	width:100%;
	}
.left{
	display: table-cell;
}
</style>
</head>
 
<body>
	<h1>Add an Article</h1>
	<form name="add_article" action="?" method="post">
		<div class="row">
			<div class="left">Title:</div>
			<div><input type="text" name="title" size="35" value=""/></div>
		</div>
		<div class="row">
			<div class="left">Category:</div>
				<div><select name="category">
					<?=$options?>
					</select>
				</div>
			</div>

	
	
		<textarea cols="140" id="editor" name="editor" rows="10">

		</textarea>
		<script>

			CKEDITOR.replace( 'editor',{height:'200px'});
		</script>
		<div class="row">
			<div class="left">Read Times:</div>
			<div><input type="text" name="read_times" size="10" value="<?=$readTimes?>"/></div>
		</div>
		
		<input type="submit" style="width:100px;height:30px;" value=" Add "/>
	</form>
		
</body>
</html>