<?php
class dbhelper
{
	static $host="localhost";
	static $userid="setupcoo_gavin";
	static $password="8524560";
	static $database="setupcoo_blog";
	public static function connection()
	{
		//$conn=mysql_connect(self::$host,self::$userid,self::$password) or die(mysql_error());
		$conn=new mysqli();
		$conn->connect(self::$host,self::$userid,self::$password,self::$database);
		if($conn->connect_error)
		{
			die($conn->connect_error);
			echo "Error: Failed to connect to the database.";
			}

		return $conn;
	}
	
	public function query($sql)
	{
		$conn=self::connection();
		return $conn->query($sql);
	}
	public function dbhelper()
	{
		
	}
	/*
	public function getAssoc($records)
	{
		$result=$records->fetch_assoc();
		return $result;
	}
	public function getArray($records)
	{
		$result=$records->fetch_array();
		return $result;
	}
	
	public function count($records)
	{
		return $records->num_rows;
	}
	*/
	
}
?>