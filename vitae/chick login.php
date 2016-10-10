<head>
<title>简历查阅</title>
<link rel="stylesheet" href="css/register.css"/>
</head>
<body>
<h1>简历查阅</h1>

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
	$sql = "SELECT * FROM `see` WHERE `name`='$username'  AND `password`='$userpassword'";
	
	$result = mysql_query($sql);
	//var_dump($result);
	if ($result)
	{
		$sql = "SELECT * FROM `jianli`";
		$userresult = mysql_query($sql);
		
			while($row =  mysql_fetch_array($userresult))
			{?>
            	<br /><br /><br /><br />
				<table align="center" class="show">
                <tr><td>name:</td><td> <?php echo $name = $row["name"]?></td>
                <tr><td>age:</td>   <td> <?php echo $age = $row["age"]?></td></tr>
				<tr><td>sex:</td>   <td> <?php echo $sex = $row["sex"]?></td></tr>
				<tr><td>email:</td>    <td> <?php echo $email  = $row["email"]?></td><tr>					
				<tr><td>add:</td>     <td> <?php echo $add = $row["add"]?></td></tr>	
                <tr><td>advice:</td><td colspan="2">
                <form action="advice.php" method="post">
                <textarea name="advice" cols="45" rows="5"></textarea>
                <input type="hidden" name="primary" value="<?php echo $name?>">
                <input type="submit" name="okadvice" value="OK" class="button">
                </form>
                </td></tr>
                </table>          
<?php			}
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