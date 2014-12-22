window.onresize=function(){
var state=document.getElementById("edit_bg").style.display;
if(state!="none"&&state!="")
	edit_init();
};

function edit_init()
{
var eb=document.getElementById("edit_bg");
var ep=document.getElementById("edit_panel");


//get screen size
wheight=window.innerHeight;
wwidth=window.innerWidth;
//set the screen size
eb.style.width=wwidth+"px";
eb.style.height=(wheight-50)+"px";

}
function edit_open(pagePath)
{
edit_init();
var eb=document.getElementById("edit_bg");
var ep=document.getElementById("edit_panel");
var cp=document.getElementById("close_panel");
cp.style.display="block";
eb.style.display="block";
ep.style.display="block";//show the panel inside

//load the edit page
ep.innerHTML="<iframe  style='margin:0 auto; border:0px' src='"+pagePath+"' width='100%' height='100%'></iframe>";
}
function edit_close()
{
	var eb=document.getElementById("edit_bg");
	var ep=document.getElementById("edit_panel");
		var ec=document.getElementById("close_panel");
	eb.style.width="0px";
	eb.style.height="0px";
	eb.style.display="none";
	ep.style.display="none";

	window.location.reload(true);
	cp.style.display="none";
	

}
function delete_category(id)
{
	location.href="/edit_category.php?cmd=delete&id="+id;
}
function edit_category(id)
{
	edit_open("/edit_category.php?cmd=edit&id="+id);
}
function add_article()
{
	edit_open("/add_article.php");
}