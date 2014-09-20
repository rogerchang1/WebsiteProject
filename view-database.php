<html>

<body>

<?php
session_start();
$link = mysql_connect("localhost","root");
if (!$link){
  die('Could not connect: ' . mysql_error());
}
mysql_select_db("my_db",$link);
$result = mysql_query("SELECT * FROM persons");
//$result = mysql_query("SELECT Persons.firstname, Persons.lastname, gundams.pilot FROM persons INNER JOIN gundams ON Persons.personID = gundams.gundamID");
//$result = mysql_query("SELECT * FROM persons UNION SELECT * FROM gundams");

/*
$r = mysql_query("SELECT count(*) FROM persons");
$d = mysql_fetch_row($r);
$rand = mt_rand(0,$d[0] - 1);

$result = mysql_query("SELECT * FROM persons LIMIT $rand");
*/

echo "Persons Database:<br />";
while($row = mysql_fetch_array($result))
  {
  echo "<ul>";
 // echo "<li>".$row['personID'].": ".$row['FirstName'] . " " . $row['LastName']." ".$row['Age']."</li>";
  echo "<li>".$row[0].": ".$row[1] . " " . $row[2]." " . $row[3]."</li>";
  echo "</ul>";
  }
?>

<a href='main.php'>Back to Main Page</a><br />

</body>

</html>