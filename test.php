<?php
  header("Content-type:text/html;charset=utf-8");
  $link=mysqli_connect("localhost","root","123456");
  if($link->connect_error){
    die("fail: " . $conn->connect_error);
  }
  mysqli_set_charset($link,"utf8");
  mysqli_select_db($link,"joker");
  
  $sql2="select title from cold_joke limit 30;";

  $res2=mysqli_query($link,$sql2);
  $row2=mysqli_fetch_all($res2);

  var_dump($row2);
    
?>