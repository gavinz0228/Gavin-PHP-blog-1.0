<?php
$com=new comment();
$com_records= $com->getComments(5);

foreach($com_records as $_com )
{	
	$html.="<div class='comment_box'><div class='comment_article'><a href='/article/".$_com["a_id"]."'>".$_com["a_title"];
	$html.="</a></div><div class='comment_item'><a href='/article/".$_com["a_id"]."/#m".$_com["c_id"]."'>";
	$html.=$_com["c_content"];
	$html.="</a></div></div>";
}

?>
<div id='comments'><div class='box_title'>Recent Comments</div>
<?=$html?>
			</div>
