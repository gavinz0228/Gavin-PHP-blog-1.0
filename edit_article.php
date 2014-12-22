<?php
require "models/dbhelper.php";
require "models/articles.php";
require "models/helper.php";
require "models/category.php";
require "models/checkAdmin.php";
if(isset($_GET["id"])&&is_numeric($_GET["id"]))
{
	$id=$_GET["id"];
	$art=new articles();
	$article=$art->getArticleById($id);
}
else
{
	die("Please Access the Website in a valid way!!");
}
$id=$article["a_id"];
$title=$article["a_title"];
$content=$article["a_content"];
$readTimes=$article["a_read_times"];
$time=$article["a_time"];
$category=$article["a_category"];

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


//$content=html_entity_decode($article["a_title"]);
if(strtolower($_SERVER["REQUEST_METHOD"])=="post") //submited by using post method
{
	if($_POST["editor"]!=""&&$_POST["title"]!="")
	{	
		$art->updateArticle(array(
		"id"=>$_POST["id"],
		"title"=>$_POST["title"],
		"content"=>$_POST["editor"],
		"category"=>$_POST["category"],
		"readTimes"=>$_POST["read_times"]
		));
		alert("It has been saved successully!");
		js("window.parent.edit_close()");
	}
}
if(isset($_GET["cmd"])&&$_GET["cmd"]=="delete")
{
	$art->deleteArticle($id);
	alert("It has been deleted successully!");
	js("window.parent.location.href='/blog_list'");

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
	<h1>Article Editing</h1> [<a href="edit_article.php?cmd=delete&id=<?=$id?>">Delete</a>]
	<form name="save_info" action="?id=<?=$id?>" method="post">
		<div class="row">
			<div class="left">Title:</div>
			<div><input type="text" name="title" size="35" value="<?=$title?>"/></div>
		</div>
		<div class="row">
			<div class="left">Category:</div>
				<div><select name="category">
					<?=$options?>
					</select>
				</div>
			</div>

	
	
		<textarea cols="140" id="editor" name="editor" rows="10">
			<?=$content?>
		</textarea>
		<script>

			CKEDITOR.replace( 'editor',{height:'200px'});
		</script>
		<div class="row">
			<div class="left">Read Times:</div>
			<div><input type="text" name="read_times" size="10" value="<?=$readTimes?>"/></div>
		</div>
		<div class="row">
			<div class="left">Published Time:</div>
			<div><?=$time?></div>
			<input name="id" type="hidden" value="<?=$id?>"/>
		</div>
		
		<input type="submit" style="width:100px;height:30px;" value="Save"/>
	</form>
		
</body>
</html>