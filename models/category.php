<?php
class category
{
	private $db; //dbhelper object
	public function category()
	{
		$this->db=new dbhelper();
	}
	public function getCategories()
	{
		//$result=$this->db->query("select * from blog_category");
				$sql=<<< EOT
SELECT bc.c_id, bc.c_name, COALESCE(ba.num,0) AS blog_num
FROM blog_category AS bc
LEFT JOIN (
SELECT blog_articles.a_category, COUNT(*) AS num
FROM blog_articles
GROUP BY blog_articles.a_category
)ba ON ba.a_category = bc.c_id
ORDER BY blog_num DESC
EOT;

		//better version
		$rows=$this->db->fetchAll($sql);
		return $rows;
		/*
		//old version
		$result=$this->db->query($sql);
		while($row=$result->fetch_assoc())
		{
			$rows []=$row;
		}
		$result->free();
*/

	}
	public function getCategoryById($id)
	{
		$sql="select * from blog_category where c_id=$id";
		$result=$this->db->fetchAll($sql);
		return $result;
	
	}
	public function deleteCategoryById($id)
	{
		$sql="delete from blog_category where c_id=$id";
		$result=$this->db->query($sql);
		return true;
	}
	public function addCategory($cate)
	{
		$sql="insert into blog_category (c_name) values('$cate')";
		$result=$this->db->query($sql);
		return true;
	}
	public function saveCategory($cate)
	{
		$sql="update blog_category set c_name='".$cate["name"]."' where c_id=".$cate["id"];
		$result=$this->db->query($sql);
		return true;
	}
	
}

?>