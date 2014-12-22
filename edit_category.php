<?php
require "models/dbhelper.php";
require "models/helper.php";
require "models/category.php";
require "models/checkAdmin.php";
//value can be "add","delete","edit","save"
$cmd="";
$cate =new category();

if(isset($_GET["id"])&&is_numeric($_GET["id"]))
{
	$id=$_GET["id"];
}
try{//cmd parameter has to be there
	$cmd=$_GET["cmd"];
	}
catch(Exception $ex)
{
	alert("Please access the websit in a proper way!");
}
switch($cmd)
{
	case "delete":
		$cate->deleteCategoryById($id);
		alert("It has been deleted successfully!");
		js("history.go(-1);");
		
	break;
	case "save":
		$cate->saveCategory(array("id"=>$id,"name"=>$_POST["c_name"]));
		alert("It has been saved successfully!");
		js("location.href='?';");
	break;
	case "add":
		if(isset($_POST["c_name"])&&trim($_POST["c_name"])!="")
		{
			$cate->addCategory($_POST["c_name"]);
			alert("It has been added successfully!");
			js("history.go(-1);");
		}
	break;
}



$categories=$cate->getCategories();
$html.="<ul style='list-style-type:decimal'>";
if(is_array($categories))
{
	foreach($categories as $category)
	{
		$html.="<li>";
		if($category["c_id"]==$id&&$cmd="edit")
		{	
			$html.="<form name='edit_cate' method='post' action='?cmd=save&id=".$category["c_id"]."' >";
			$html.="<input type='text' name='c_name' value='".$category["c_name"]."' />";
			$html.="<input type='submit' value='Save the change' />";
			$html.="</form>";
		}
		else
		{
			$html.=$category["c_name"];
			$html.=" - <a href='?cmd=delete&id=".$category["c_id"]."'>[X] </a> ";
			$html.=" [<a href='?cmd=edit&id=".$category["c_id"]."'> Edit </a>]";
		}
		$html.="</li>";
	}
}
$html.="</ul>";
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Categories Managing</title>

<style>
body
{
	font-size:18px;
	font-family:"Arial";
	
}
</style>
</head>
 
<body>



<form name="add_cate" method="post" action="?cmd=add">
	Category Name: <input type="input" name="c_name" />  <input type="submit" value="Add "/>
</form>

<?=$html?>
</body>
</html>