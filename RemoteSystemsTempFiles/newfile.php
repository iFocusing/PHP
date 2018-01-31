<?php
header("Content-type:text/html;charset=utf-8");
require_once('conn.php');





$name="淘宝商城";
$name1="hjj";
$time="2015-01-05";

?>



<!DOCTYPE html>
<html>
  <head>
    <title>SystemList</title>
    <style type="text/css">
    html{font-size:12px;}
	fieldset{width:750px; margin: 0 auto;}
	legend{font-weight:bold; font-size:14px;}
	.label{float:left; width:70px; margin-left:10px;}
	.left{margin-left:80px;}
	.input{width:150px;}
	span{color: #666666;}
  	</style>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>  
  </head>
<body>
<h1 align="center">系统列表</h1>
<div>
<fieldset>
<legend>我参与的系统列表</legend>
<div>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp系统名称&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  项目经理  &nbsp&nbsp&nbsp&nbsp&nbsp项目开启时间</div>	
<div>
	<?php
	 
	for ($x=0; $x<=10; $x++) {
 	echo "系统$x:";
 	?>
 	<a href=""><?php echo "$name";?></a>
 	<?php
 	echo "&nbsp&nbsp&nbsp&nbsp&nbsp$name1&nbsp&nbsp&nbsp&nbsp&nbsp","$time<br>";
	}
	
	?>
</div>
</fieldset>
</div>
<div>
<fieldset>
<legend>正在开发的系统列表</legend>
<div>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp系统名称&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  项目经理  &nbsp&nbsp&nbsp&nbsp&nbsp项目开启时间</div>	
<div>
	<?php
	 
	for ($x=0; $x<=10; $x++) {
 	echo "系统$x:";
 	?>
 	<a href=""><?php echo "$name";?></a>
 	<?php
 	echo "&nbsp&nbsp&nbsp&nbsp&nbsp$name1&nbsp&nbsp&nbsp&nbsp&nbsp","$time<br>";
	}
	
	?>
</div>

</fieldset>
</div>
<div>
<fieldset>
<legend>已经结束的系统列表</legend>
<div>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp系统名称&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  项目经理  &nbsp&nbsp&nbsp&nbsp&nbsp项目开启时间</div>	
<div>
	<?php
	 
	for ($x=0; $x<=10; $x++) {
 	echo "系统$x:";
 	?>
 	<a href=""><?php echo "$name";?></a>
 	<?php
 	echo "&nbsp&nbsp&nbsp&nbsp&nbsp$name1&nbsp&nbsp&nbsp&nbsp&nbsp","$time<br>";
	}
	
	?>
</div>
</fieldset>
</div>
</body>
</html>   