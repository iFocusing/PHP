<?php
header("Content-type:text/html;charset=utf-8");
require_once('conn.php');





$name="�Ա��̳�";
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
<h1 align="center">ϵͳ�б�</h1>
<div>
<fieldset>
<legend>�Ҳ����ϵͳ�б�</legend>
<div>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspϵͳ����&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  ��Ŀ����  &nbsp&nbsp&nbsp&nbsp&nbsp��Ŀ����ʱ��</div>	
<div>
	<?php
	 
	for ($x=0; $x<=10; $x++) {
 	echo "ϵͳ$x:";
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
<legend>���ڿ�����ϵͳ�б�</legend>
<div>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspϵͳ����&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  ��Ŀ����  &nbsp&nbsp&nbsp&nbsp&nbsp��Ŀ����ʱ��</div>	
<div>
	<?php
	 
	for ($x=0; $x<=10; $x++) {
 	echo "ϵͳ$x:";
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
<legend>�Ѿ�������ϵͳ�б�</legend>
<div>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspϵͳ����&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  ��Ŀ����  &nbsp&nbsp&nbsp&nbsp&nbsp��Ŀ����ʱ��</div>	
<div>
	<?php
	 
	for ($x=0; $x<=10; $x++) {
 	echo "ϵͳ$x:";
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