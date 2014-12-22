<?php
class blogList
{
	private $db;
	private $pageSize;
	private $pageNum;
	//public member
	public $blogCount;
	public $pageCount;
	public function blogList($pageSize,$pageNum,$type=0)
	{

		$this->db=new dbhelper();
		$this->pageSize=$pageSize==0?1:$pageSize;
		$this->pageNum=$pageNum;
		//get the number of blogs first
		if($type==0)
			$bcount=$this->db->fetchOne("select count(*) from blog_articles");
		else
			$bcount=$this->db->fetchOne("select count(*) from blog_articles where a_category=".$type);
		//$bcount=$bcount;
		$this->blogCount=$bcount[0];
		//the calculate the number of page
		if($this->blogCount%$this->pageSize==0)
			$this->pageCount=$this->blogCount/$this->pageSize;
		else
			$this->pageCount=(int)($this->blogCount/$this->pageSize)+1;
		
	}
	
	public function getBlogList()
	{
		$start=($this->pageNum-1)*$this->pageSize;
		$result=$this->db->fetchAll("SELECT blog_articles.a_id,blog_articles.a_title,blog_articles.a_time,blog_category.c_id,blog_category.c_name FROM `blog_articles` INNER JOIN blog_category ON blog_articles.a_category=blog_category.c_id ORDER BY blog_articles.a_time DESC LIMIT ".$start.",".$this->pageSize);
		return $result;
	}
	//get Blog list by categoryid
	public function getBlogListByType($typeid)
	{
		$start=($this->pageNum-1)*$this->pageSize;
		$results=$this->db->fetchAll("SELECT blog_articles.a_id,blog_articles.a_title,blog_articles.a_time,blog_category.c_id,blog_category.c_name FROM `blog_articles` INNER JOIN blog_category ON blog_articles.a_category=blog_category.c_id WHERE blog_category.c_id=$typeid ORDER BY blog_articles.a_time DESC LIMIT ".$start.",".$this->pageSize);

		return $results;
	}
	

}


?>