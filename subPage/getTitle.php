<?php
header("Content-type:text/html;charset=utf-8");

$id= $_GET["tableid"];

$tableList=['jokefamily','jokechild','jokeschool','jokecareer','funny_sentence','hilarious_reply','cold_joke','jokelove','jokeeglish'];

// $link=mysqli_connect("127.0.0.1","root","123456");
$link=mysqli_connect("8.129.237.119:3306","joker","123456");
if(!$link){
 
  echo 0;
  exit;

}
mysqli_set_charset($link,"utf8");
mysqli_select_db($link,"joker");

$sql2="select title from {$tableList[$id-1]} ORDER BY ID";

$res2=mysqli_query($link,$sql2);
$row2=mysqli_fetch_all($res2);



if(!$row2){
  echo 0;
  exit;
}

echo(json_encode($row2));

mysqli_close($link);
?>