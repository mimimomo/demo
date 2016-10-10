<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>


<?php

error_reporting(E_ALL ^ E_DEPRECATED);

$cadvice = $_POST['advice'];
$cname = $_POST['primary'];

//var_dump($cemail,$csuggest);
//连接数据库
$host = "127.0.0.1";
$user = "root";
$pwd = "";
$dbname = "mo";
$link = mysql_connect($host, $user, $pwd);

if ($link)
{
	//var_dump($cemail,$csuggest);
	mysql_select_db($dbname,$link);
	$sql = "UPDATE `jianli` SET `chicksuggest`='$cadvice' WHERE `name`='$cname'";
	
	$result = mysql_query($sql);
	//var_dump($result);
	if ($result)
	{
	echo "<br/><br/>建议提交成功！";
	}
	else
	{
	exit("建议提交失败");	
	}
	
}
else{
	exit("连接不成功！");
}

 
?>




