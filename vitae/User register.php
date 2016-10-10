<?php
error_reporting(E_ALL ^ E_DEPRECATED);

$username = $_POST['name'];
$userage = $_POST['age'];
$usersex = $_POST['sex'];
$useremail = $_POST['email'];
//$userphoto = $_POST['photo'];
$useradd = $_POST['add'];
$userpassword = $_POST['password'];
$usersuggest = $_POST['suggest'];

//var_dump ($userfirstname,$userlastname,$usergender,$useremail,/*$userphoto,*/$usercity,$userstreet,$userpassword,$userrepassword);
if (!$username ||  !$userpassword)
{
	exit("须填写必须项");
}


/*
//图片处理
//print_r($_FILES["upfile"]); 
if(is_uploaded_file($_FILES['photo']['tmp_name'])){ 
$upfile=$_FILES["photo"]; 
//获取数组里面的值 
$name=$upfile["name"];//上传文件的文件名 
$type=$upfile["type"];//上传文件的类型 
$size=$upfile["size"];//上传文件的大小 
$tmp_name=$upfile["tmp_name"];//上传文件的临时存放路径 
//判断是否为图片 
switch ($type){ 
case 'image/jpg':$okType=true; 
break; 
case 'image/jpeg':$okType=true; 
break; 
case 'image/gif':$okType=true; 
break; 
case 'image/png':$okType=true; 
break; 
} 

if($okType){ 
$error=$upfile["error"];//上传后系统返回的值 
move_uploaded_file($tmp_name,'up/'.$name); 
$destination="up/".$name; 
//echo "================<br/>"; 
//echo "上传信息：<br/>"; 
if($error==0){ 
//echo "头像上传成功啦！"; 
//echo "<br>头像预览:<br>"; 
//echo "<img src=".$destination.">"; 
//echo " alt=\"图片预览:\r文件名:".$destination."\r上传时间:\">"; 
}elseif ($error==1){ 
echo "超过了文件大小，在php.ini文件中设置"; 
}elseif ($error==2){ 
echo "超过了文件的大小MAX_FILE_SIZE选项指定的值"; 
}elseif ($error==3){ 
echo "文件只有部分被上传"; 
}elseif ($error==4){ 
echo "没有文件被上传"; 
}else{ 
echo "上传文件大小为0"; 
} 
}else{ 
echo "请上传jpg,gif,png等格式的图片！"; 
} 
} 
*/
//连接数据库

$host = "127.0.0.1";
$user = "root";
$pwd = "";
$dbname = "mo";
$link = mysql_connect($host, $user, $pwd);

if ($link)
{
	$userpassword = md5($userpassword);
	mysql_select_db($dbname,$link);
	$sql = "INSERT INTO `jianli`(`name`,`password`,`age`,`sex`,`email`,`add`,`suggest`) 
	VALUES('$username','$userpassword','$userage','$usersex','$useremail','$useradd','$usersuggest')";

	$result = mysql_query($sql);
	
	if ($result)
	{
		echo "<br/><br/>注册成功！";
	}
	else
	{
		exit("注册失败");	
	}
	
}
else{
	exit("连接不成功！");
}

 
 
?>

