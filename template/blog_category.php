<?php
$cate=new category();
$catea= $cate->getCategories();
$blogcate="";	 //blog categories variable
$blogcate.="<li><a href='/blog_list'>All</a></li>";
foreach($catea as $_cate )
{	
	$blogcate.="<li>";
	$blogcate.="<a href='/blog_list/type/".$_cate["c_id"]."'>".$_cate["c_name"]." (".$_cate["blog_num"].")</a>";
	$blogcate.=" <a href='#' onclick='delete_category(".$_cate["c_id"].")'><span class='hl'>[X] </span></a> ";
	$blogcate.=" [<a href='#' onclick='edit_category(".$_cate["c_id"].")'><span class='hl'> Edit</span> </a>]";
	$blogcate.="</li>";
}

//if it's logged in, then show the editing options
$blogcate.="<li><a href='#' onclick=edit_open('edit_category.php') ><span class='hl'>[ Add New ]</span></a></li>";
?>
			<div id="category">
				<div class="box_title">Blog Category</div>
				<ul>
					<?=$blogcate?>
					
				</ul>
			</div>