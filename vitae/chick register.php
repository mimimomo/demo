<?php
error_reporting(E_ALL ^ E_DEPRECATED);

$name = $_POST['name'];
$password = $_POST['password'];

//var_dump ($name,$password);
if (!$name || !$password)
{
	exit("����д������");
}

//�������ݿ�

$host = "127.0.0.1";
$user = "root";
$pwd = "";
$dbname = "mo";
$link = mysql_connect($host, $user, $pwd);

if ($link)
{
	$password = md5($password);
	mysql_select_db($dbname,$link);
	$sql = "INSERT INTO `see`(`name`,`password`) VALUES('$name','$password')";
	
	$result = mysql_query($sql);
	
	if ($result)
	{
		echo "ע��ɹ�";
	}
	else
	{
		exit("ע��ʧ��");	
	}
	
}
else{
	exit("���Ӳ��ɹ���");
}

 
 
?>