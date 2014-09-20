<?php

$link = mysql_connect("localhost","root");
if (!$link){
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("my_db",$link);
$sql="INSERT INTO Persons (FirstName, LastName, Age) 
VALUES ('$_POST[firstname]', '$_POST[lastname]', '$_POST[age]')";

  if (!mysql_query($sql,$link))
  {
  die('Error: ' . mysql_error());
  }

$result = mysql_query("SELECT * FROM Persons ORDER BY firstname, lastname");

echo "Persons Database:<br />";
while($row = mysql_fetch_array($result))
  {
  echo "<ul>";
  echo "<li>".$row['FirstName'] . " " . $row['LastName']." ".$row['Age']."</li>";
  echo "</ul>";
  }
echo "1 record added: ".$_POST["firstname"] . " " . $_POST["lastname"]." ".$_POST["age"];
mysql_close($link);

/*
$link = mysql_connect("localhost","root");
if (!$link)
  {
  die('Could not connect: ' . mysql_error());
  }
  
  if (mysql_query("CREATE DATABASE my_db",$link))
  {
  echo "Database created";
  }
else
  {
  echo "Error creating database: " . mysql_error();
  }
  
  // Create table
mysql_select_db("my_db", $link);
$sql = "CREATE TABLE Persons
(
personID int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(personID),
FirstName varchar(15),
LastName varchar(15),
Age int
)";

// Execute query
mysql_query($sql,$link);
*/
?>