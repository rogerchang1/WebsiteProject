<?php
session_start();


$link = mysql_connect("localhost","root");
if (!$link){
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("my_db",$link);
$check=mysql_query("SELECT * FROM user_accounts WHERE username='".$_POST['username']."'",$link) or die('Error: ' . mysql_error());
if(mysql_num_rows($check)>0)
	echo 0;
else
	echo 1;

mysql_close($link);

?>