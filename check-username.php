<?php
session_start();


$link = mysqli_connect("localhost","root","","my_db");
if (!$link){
  die('Could not connect: ' . mysqli_error());
}

//mysql_select_db("my_db",$link);
$sql ="SELECT * FROM user_accounts WHERE username='".$_POST['username']."'";
$check=mysqli_query($link,$sql);
if(mysqli_num_rows($check)>0)
	echo 0;
else
	echo 1;

mysqli_close($link);

?>