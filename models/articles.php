<?php
class articles
{
	private $db;
	public function articles()
	{
		$this->db=new dbhelper();
	}
	public function getArticleById($id)
	{
		$result=$this->db->fetchOne("select * from blog_articles where a_id=".$id);
		return $result;
	}
	public function addReadTimes($id)
	{
		$this->db->query("update blog_articles set a_read_times = a_read_times +1 where a_id =".$id);
	}
	public function addArticle($article)
	{
		$this->db->query("insert into blog_articles(a_title,a_content,a_category,a_time) values('".$article["title"]."','".$article["content"]."',".$article["category"].",now())");
	}
	public function updateArticle($art)
	{
		$this->db->query("update blog_articles set a_title='".$art["title"]."', a_content='".$art["content"]."',a_category=".$art["category"].",a_read_times=".$art["readTimes"]." where a_id=".$art["id"]);
	}
	public function deleteArticle($id)
	{
		$this->db->query("delete from blog_articles where a_id=$id");
	}
}
?>