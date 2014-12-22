<?php
class blogInfo
{
	private $db;
	private $info;
	public function blogInfo()
	{
		$this->db=new dbhelper();
		$this->info=$this->db->fetchOne("select * from blog_info");
	}
	public function getBlogInfo()
	{
		return $this->info["i_home_info"];
	}
	public function saveBlogInfo($content)
	{
		$this->db->query("update blog_info set i_home_info='".$content."'");
	}
	public function getWorks()
	{
		return $this->info["i_works"];
	}
	public function saveWorks($content)
	{
		$this->db->query("update blog_info set i_works='".$content."'");
	}
	public function getOwner()
	{
		return $this->info["i_owner"];
	}
	public function saveOwner($owner)
	{
		$this->db->query("update blog_info set i_owner='".$owner."'");
	}
	public function getContactInfo()
	{
		return $this->info["i_contact"];
	}
	public function saveContactInfo($content)
	{
		$this->db->query("update blog_info set i_contact='".$content."'");
	}
	public function close()
	{
		
	}
}
?>