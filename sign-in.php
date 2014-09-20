<html>

<head>
</head>
<body>
<?php
session_start();
if(isset($_POST['submit'])){
$link = mysql_connect("localhost","root");
if (!$link){
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("my_db",$link);

$check=mysql_query("SELECT * FROM user_accounts WHERE username='".$_POST['username']."' AND password='".$_POST['password']."'",$link) or die('Error: ' . mysql_error());
if(mysql_num_rows($check)>0){
	session_destroy();
	session_start();
	$_SESSION['user']=$_POST['username'];
	echo "Thank you for signing in, ".$_SESSION['user']."!<br />";
	echo "<meta http-equiv='refresh' content='5;url=main.php'>";
}else{
	echo "Invalid username/password <br />";
}
mysql_close($link);
}else
{
session_destroy();
echo "Goodbye!<br />";
echo "<meta http-equiv='refresh' content='5;url=main.php'>";
}
?>
<a href='main.php'>Click to go back</a>
</body>
</html>