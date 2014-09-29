<html>

<head>
</head>
<body>
<?php
session_start();
if(isset($_POST['submit'])){
$link = mysqli_connect("localhost","root","","my_db");
if (!$link){
  die('Could not connect: ' . mysqli_error());
}

//mysql_select_db("my_db",$link);
$sql="SELECT * FROM user_accounts WHERE username='".$_POST['username']."' AND password='".$_POST['password']."'";
$check=mysqli_query($link,$sql);

if(mysqli_num_rows($check)>0){
	session_destroy();
	session_start();
	$userid;
	while($row = mysqli_fetch_array($check)){
		$userid=$row['user_id'];
	}
	$_SESSION['user']=$_POST['username'];
	$_SESSION['userid']=$userid;
	echo "Thank you for signing in, ".$_SESSION['user']."!<br />";
	echo "<meta http-equiv='refresh' content='5;url=main.php'>";
}else{
	echo "Invalid username/password <br />";
}
mysqli_close($link);
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