<?PHP
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
echo "<h4>Recent images uploaded:</h4><br />";
$link=mysqli_connect("localhost","root","","my_db");

$sql = "SELECT * FROM images ORDER BY date DESC LIMIT 20";

$result = mysqli_query($link,$sql);
$count=0;
while($row = mysqli_fetch_array($result)){
	echo "<img src='".$row['filepath']."' width='100' height='71' border='0' />";
	$count++;
	if($count==5) echo "<br />";
}
mysqli_close($link);




?>