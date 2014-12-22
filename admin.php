<?
require "models/helper.php";
if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST')
{
	//
	if(isset($_POST["username"])&&$_POST["username"]=="gavin0228"&&$_POST["password"]=="123456")
		{
			session_start();
			alert("Welcome back Administrator!");
			$_SESSION["admin"]="admin";
			js("location.href='/';");
			
		}
		else
		{
			alert("User Name or Password is incorrect!");
		}
}
?>

<html>
<head>
<style>
@font-face {
  font-family: 'Montserrat Alternates';
  font-style: normal;
  font-weight: 20;
  src: local('MontserratAlternates-Regular'), url(/font/Montseralternate.ttf) format('truetype');
}
body{
	background-color:#171717;
	font-family: 'Montserrat Alternates';
	color:#CACACA;
}
.panel{
	width:100%;
	display:table;
}
.panel .row
{
	display:table-row;
	height:30px;
	
}
.panel .row div
{
	display:table-cell;
	padding:5px 10px 5px 10px;
}
.panel .row .left
{
	width:150px;
}
#login
{
	margin:0 auto;
	margin-top:180px;
	display:table;
	width:300px;
	background-color:#474747;
	border-radius:5px 5px 5px 5px;
	box-shadow:5px 5px 5px black;
}
#login input[type='text']
{
	border-radius:3px 3px 3px 3px;
	-webkit-border-radius:3px 3px 3px 3px;
}
#login input[type='password']
{
	border-radius:3px 3px 3px 3px;
	-webkit-border-radius:3px 3px 3px 3px;
}
#header div
{
	font-weight:bold;
	border-top-left-radius:5px;
	border-top-right-radius:5px;
	color:white;
background: -moz-linear-gradient(top, rgba(119,119,119,0.65) 0%, rgba(71,71,71,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(119,119,119,0.65)), color-stop(100%,rgba(71,71,71,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, rgba(119,119,119,0.65) 0%,rgba(71,71,71,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, rgba(119,119,119,0.65) 0%,rgba(71,71,71,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, rgba(119,119,119,0.65) 0%,rgba(71,71,71,1) 100%); /* IE10+ */
background: linear-gradient(to bottom, rgba(119,119,119,0.65) 0%,rgba(71,71,71,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a6777777', endColorstr='#474747',GradientType=0 ); /* IE6-9 */
}
</style>
</head>
<body>
<div class="panel">
	<form name="login_form" method="post" action="?">
		<div id="login">
			<div class="row" id="header">
				<div class="left">Sign In</div>
				<div class=""></div>
			</div>
			<div class="row">
				<div class="left">User Name:</div>
				<div class=""><input type="text" name="username" style="width:150px;" /></div>
			</div>
			<div class="row">
				<div class="left">Password:</div>
				<div class=""><input type="password" name="password" style="width:150px;" /></div>
			</div>
			<div class="row">
				<div class="left"></div>
				<div class=""><input type="submit" value="Sign In" /></div>
			</div>
		</div>
	</form>
</div>
</body>
</html>