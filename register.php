<html>
<head>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>

$(document).ready(function(){
	$('#registerBtn').prop('disabled', true);
	$('.requiredInput').change(function() {
		inspectAllInputFields();
	});	
});

function check_available(){
	var username=$('#username').val();
	$.post('check-username.php',{username : username},function(result){
		if(result==1){
			$('#username-result').html(username + " is available");
		}else{
			$('#username-result').html(username + " is not available");
			 $('#registerBtn').prop('disabled', true);
		}
	});
}

function inspectAllInputFields(){
     var count = 0;
     $('.requiredInput').each(function(i){
       if( $(this).val() === '') {
           //show a warning?
           count++;
        }
        if(count == 0){
		check_available();
          $('#registerBtn').prop('disabled', false);
        }else {
          $('#registerBtn').prop('disabled', true);
        }

    });
}
</script>
</head>


<body>
<?php
session_start();


if(isset($_POST['register'])){
$link = mysql_connect("localhost","root");
if (!$link){
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("my_db",$link);

$sql="INSERT INTO user_accounts (username, password, firstname,lastname) 
VALUES ('$_POST[username]', '$_POST[password]', '$_POST[firstname]', '$_POST[lastname]')";

  if (!mysql_query($sql,$link))
  {
  die('Error: ' . mysql_error());
  }
session_destroy();
session_start();
$_SESSION['user']=$_POST['username'];
echo "Thank you for registering, ".$_SESSION['user']."!<br />";
$sql="CREATE TABLE ".$_SESSION['user']."_images ( imageid int NOT NULL AUTO_INCREMENT, filename varchar(20), filesize int, filetype varchar(20), filepath varchar(130), PRIMARY KEY(imageid))";
if (!mysql_query($sql,$link))
  {
  die('Error: ' . mysql_error());
  }
mysql_close($link);
//make new path dir for user
$path="user_images/".$_POST['username']."_images";

if(!is_file($path)&&!is_dir($path)){
mkdir($path);
}else{
echo "<br />Error: Directory Exists <br />";
}

echo "<meta http-equiv='refresh' content='5;url=main.php'>";


}else{
?>
<form method="post" action="register.php">
<label>Username: </label>
<input type="text" name="username" id="username" class="requiredInput">
<span id="username-result">
</span>
<br />
<label>Password: </label>
<input type="password" name="password" class="requiredInput">
<br />
<label>First Name: </label>
<input type="text" name="firstname" class="requiredInput">
<br />
<label>Last Name: </label>
<input type="text" name="lastname" class="requiredInput">
<br />
<input type="submit" value= "Register" id="registerBtn" name="register">
</form>
<?php
}
?>
<a href='main.php'>Back to Main Page</a>
</body>
</html>