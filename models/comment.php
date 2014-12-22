<?php
class comment
{
	private $id;
	private $db;
	public function comment()
	{
		$this->id=$cid;
		$this->db=new dbhelper();
	}
	public function getComments($num)
	{
		$result=$this->db->fetchAll("SELECT bc.c_id,bc.c_content, bc.a_id,ba.a_title FROM blog_comments as bc LEFT JOIN blog_articles AS ba ON bc.a_id=ba.a_id ORDER BY c_id limit 0,".$num);

		return $result;	
	}

	public function showCommentsById($id)
	{
		echo $this->getHTMLById($id);
	}
	public function getHTMLById($id)
	{
		$records=$this->db->fetchAll("SELECT * FROM blog_comments WHERE a_id=$id ORDER BY c_id");
		$html.="<hr/><p>Comments:</p>";
		if(is_array($records))
		{
			foreach($records as $row)
			{
				$html.="<div class='comment_list'><div class='comment_row'><div class='comment_left'><a name='m".$row["c_id"]."'></a>E-mail:</div><div class='comment_email'>";
				$html.=$row["c_email"];
				$html.="</div></div><div class='comment_row'><div class='comment_left'>Comment:</div><div class='comment_content'>";
				$html.=$row["c_content"];
				$html.="</div></div></div>";
			}
		}
	$html.="<hr/>";
	$html.= <<<EOT
	<form name="acomment" method="post" action="?cmd=save">
	<div class='comment_box'><div class='comment_row'><div class='comment_left' >E-mail:</div><div><input name='cemail' type='text' />
	</div></div><div class='comment_row'><div class='comment_left'>Comment:</div><div><textarea name='ccontent' ></textarea>
	</div></div><div class='comment_row'><div class='comment_left'> </div><div class='comment_submit'><input type='submit' name="c_submit" value="Post!"/>
	</div></div></div></form>
EOT;


		return $html;
	}
}
?>