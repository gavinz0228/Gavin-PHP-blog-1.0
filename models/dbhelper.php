<?php
class dbhelper
{
	static $host="localhost";
	static $userid="userid";
	static $password="password";
	static $database="databasename";
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
	public function fetchAll($sql)
	{
		$records=$this->query($sql);
		foreach($records as $row)
		{
			$result[]=$row;
		}
		$records->free();
		return $result;
	}
	public function fetchOne($sql)
	{
		$records=$this->query($sql);
		$result=$records->fetch_array();
		return $result;
	
	}
	/*
	//not supported by this php host..sigh..
	public function fetch($sql)
	{
		$records=$this->query($sql)->fetch_all();
		return $records;
	}
	*/
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