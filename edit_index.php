<?php
require "models/dbhelper.php";
require "models/blogInfo.php";
require "models/helper.php";
require "models/checkAdmin.php";
$info=new blogInfo();
$binfo=$info->getBlogInfo();
if(strtolower($_SERVER["REQUEST_METHOD"])=="post")
{
	if($_POST["editor"]!="")
	{
		$info->saveBlogInfo($_POST["editor"]);
		alert("It has been saved successully!");
		js("window.parent.edit_close()");
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Content editing</title>
	<script src="/editor/ckeditor.js"></script>

</head>
Homepage Editing 
<body>
	<form name="save_info" action="?" method="post">
		<textarea cols="80" id="editor" name="editor" rows="10">
			<?=$binfo?>
			</textarea>
		<script>

			CKEDITOR.replace( 'editor',{height:'400px'});
		</script>
		<input type="submit" style="width:100px;height:30px;" value="Save"/>
	</form>
		
</body>
</html>