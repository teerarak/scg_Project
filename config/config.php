<?php

  $connect = mysqli_connect("localhost","root","12345678","moc") or die("Error: " . mysqli_error($connect));
  mysqli_query($connect, "SET NAMES 'utf8' ");
  session_start();
  ob_start();
?>
