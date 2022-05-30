<?php 
  $server = "localhost";
  $user ="root";
  $pass = "";
  $database = "hire_register_pure_coding";
  
  $conn = mysqli_connect($server, $user, $pass, $database);

  if(!$conn) {
      die("<script>alert('Connection Failed')</script>");
  }

?> 