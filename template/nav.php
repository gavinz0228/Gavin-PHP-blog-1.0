<?php
$cate=new category();
$catea= $cate->getCategories();
$blogc="";	 //blog categories variable
foreach($catea as $_cate )
{	
	$blogc.="['".$_cate["c_name"]."','/blog_list/type/".$_cate["c_id"]."'],";
}
$cate=null;
$catea=null;

?>
	
	<nav id="main_nav" >
		<ul id="menu_list">
			<li onmousemove="dropDown(0)"><a href="/">Home</a></li>
			<li onmousemove="dropDown(1)"><a href="/blog_list">Blogs</a></li>
			<li onmousemove="dropDown(2)"><a href="/contact">Contact Me</a></li>
			<li onmousemove="dropDown(3)"><a href="/works">My Works</a></li>
		</ul>
		<div id="dropdown"></div>
	</nav>
	<script type="text/javascript">
var menu={
				"0":[],
				"1":[<?=$blogc ?>],
				"2":[["Facebook","https://www.facebook.com/gavin.zhang.7"],["E-mail","mailto:gavinz0228@gmail.com"]],
				"3":[]
				};
window.onload=function () {
	var dp= document.getElementById("dropdown");
	dp.addEventListener("mouseout",hidelist,true);

	};


function dropDown(id) {
	var dp= document.getElementById("dropdown");
	
	var mhtml="<ul>";
	for (var i=0;i<menu[id].length;i++) 
	{
		mhtml+="<li><a href='"+menu[id][i][1]+"'>"+menu[id][i][0]+"</a></li>";
	}
	mhtml+="</ul>";
	dp.innerHTML=mhtml;
	var uli=document.querySelectorAll("#main_nav ul li");
	var li=uli[id];
	dp.style.left=li.offsetLeft+"px";

	dp.style.top=li.offsetTop+li.clientHeight+"px";
	if(menu[id].length>0)
		dp.style.display="block";
	else {
	dp.style.display="none";
	}
	
}
function hidelist(event) {

	e = event.toElement || event.relatedTarget;
	//alert(e.parentNode.parentNode.tagName +"->"+ e.parentNode.tagName);
    if (e.parentNode.parentNode.parentNode == this ||  e.parentNode.parentNode == this) {
        return false;
    }
	document.getElementById("dropdown").style.display="none";
}
</script>