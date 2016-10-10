<head>
<title>用户登录</title>
<link rel="stylesheet" href="css/register.css"/>
</head>
<body>
<h1 align="center">User Iformation</h1>
<hr />
<?php
error_reporting(E_ALL ^ E_DEPRECATED);

$username = $_POST['name'];
$userpassword = $_POST['password'];

if (!$username  || !$userpassword)
{
	exit("请填写登录信息");
}

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
	//var_dump ($userfirstname,$userlastname,$userpassword);
	$sql = "SELECT * FROM `jianli` WHERE `name`='$username'  AND `password`='$userpassword'";
	
	$result = mysql_query($sql);
	
	if ($result)
	{
		
			while($row =  mysql_fetch_array($result))
			{?>
				<table>
                <tr><td>Name:</td><td> <?php echo $uname = $row["name"]?></td>
			    <tr><td>Age:</td> <td> <?php echo $uage = $row["age"]?></td> </tr>
				<tr><td>Sex:</td>   <td> <?php echo $sex = $row["sex"]?></td></tr>
				<tr><td>Email:</td>    <td> <?php echo $email  = $row["email"]?></td><tr>					
				<tr><td>Add:</td>     <td> <?php echo $add = $row["add"]?></td></tr>	
                <tr><td>Suggestion:</td> <td colspan="2"> <?php echo $suggest = $row["suggest"]?></td></tr>
                <tr><td>Advice:</td> <td colspan="2"> <?php echo $advice = $row["chicksuggest"]?></td></tr>
                </table>          
 <?php               
		}
	}
	else
	{
		exit("登录失败");	
	}
	
}
else
{
	exit("连接不成功！");
}

?>
</body>