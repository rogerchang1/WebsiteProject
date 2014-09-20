<?php
if (isset($_REQUEST['email']))
//if "email" is filled out, send email
  {
  //send email
  $email = $_REQUEST["email"] ;
  $subject = $_REQUEST["subject"] ;
  $message = $_REQUEST["message"] ;
  
  //mail("mahjong.mahjong@gmail.com", $subject,$message, "From:" . $email);
  echo "Thank you for using our mail form, but it currently does not work. Sorry.";
  }
  ?>