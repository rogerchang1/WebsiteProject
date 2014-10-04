

<?php
session_start();

$link = mysqli_connect("localhost","root","","my_db");

if(!$link){
	die('Could not connect: ' . mysqli_error());
}

$username = $_GET["username"];

	$sql = "SELECT * FROM user_accounts WHERE username='".$username."'";



$result = mysqli_query($link,$sql);
while($row = mysqli_fetch_array($result)){
	
	echo "First Name: " . $row['firstname'] . "<br />";
	echo "LastName: " . $row['lastname'] . "<br />";
	echo "Username: " . $row['username']. "<br />";
}

//echo $filename;

mysqli_close($link);

echo "<a href='view-users.php'>Back to Users List</a>";
?>
