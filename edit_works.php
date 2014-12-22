<?php
require "models/dbhelper.php";
require "models/blogInfo.php";
require "models/helper.php";
require "models/checkAdmin.php";
$info=new blogInfo();
$works=$info->getWorks();
if(strtolower($_SERVER["REQUEST_METHOD"])=="post")
{
	if($_POST["editor"]!="")
	{
		$info->saveWorks($_POST["editor"]);
		alert("It has been saved successully!");
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

</head>
Homepage Editing 
<body>
	<form name="save_info" action="?" method="post">
		<textarea cols="140" id="editor" name="editor" rows="10">
			<?=$works?>
			</textarea>
		<script>

			CKEDITOR.replace( 'editor',{height:'400px'});
		</script>
		<input type="submit" style="width:100px;height:30px;" value="Save"/>
	</form>
		
</body>
</html>