

<?php
session_start();

$link = mysqli_connect("localhost","root","","my_db");

if(!$link){
	die('Could not connect: ' . mysqli_error());
}

$sql = "SELECT username FROM user_accounts";



$result = mysqli_query($link,$sql);
echo "<table border = '1' >";
echo"<tr><td><b>List of Users</b></td>><td><b>View Images</b></td></tr>";
while($row = mysqli_fetch_array($result)){
	//echo $row['filepath'];
	echo"<tr><td>".$row['username']."</td>><td><a href='view-user-images.php?username=".$row['username']."'>Images</a></td></tr>";
//	echo "<a href='".$row['filepath']."'>";
//	echo "<img src='".$row['filepath']."' width='100' height='71' border='0' />";
//	echo "</a> <br />";
}

//echo $filename;

mysqli_close($link);




?>
<br />
<a href='main.php'>Back to Main Page</a>