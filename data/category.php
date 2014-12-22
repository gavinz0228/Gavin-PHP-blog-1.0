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
		$result=$this->db->query("select * from blog_category");
		while($row=$result->fetch_assoc())
		{
			$rows []=$row;
		}
		$result->free();
		
		return $rows;
		
	}
	public function getCategoryById($id)
	{
	}
	
}

?>