<?
class pagination
{	
	private $pz;
	private $pn;
	private $pc;
	private $url;//for pagination: not to forget the parameter of typeid when it turns to another page
	
	public function pagination($pageSize,$pageNum,$pageCount,$url)
	{
		$this->pz=$pageSize;
		$this->pn=$pageNum;
		$this->pc=$pageCount;
		$this->url=$url;
	}
	public function getHTML()
	{
		$html="<hr/>";
		//to decide whether or not to print "last page"
		if($this->pn>1)
			$html.="<a class='pagination' href='".$this->url."/".($this->pn-1)."'>Last Page</a> | ";
		
		for($i=1;$i<=$this->pc;$i++)
		{
			if($i==$this->pn)
				$html.=" ".$i." | ";
			else
				$html.=" <a class='pagination' href='".$this->url."/".$i."'> ".$i." </a> |";
		}
		//to decide whether or not to print "next page"
		if($this->pn<$this->pc)
			$html.="<a class='pagination' href='".$this->url."/".($this->pn+1)."'>Next Page</a> | ";
		$html.= " Page ".$this->pn." /".$this->pc;
		return $html;
	}


}
?>