<?php
header("Content-type:text/html;charset=utf-8");
$obj = (object) null;
$id= $_GET["id"];
$tableID=$_GET['tableid'];
$tableList=['jokefamily','jokechild','jokeschool','jokecareer','funny_sentence','hilarious_reply','cold_joke','jokelove','jokeeglish'];


$response=["code"=>0,"message"=>"","count"=>0,'joke'=>$obj]; 
// $link=mysqli_connect("127.0.0.1","root","123456");
$link=mysqli_connect("149.28.199.77","root","123456");
if(!$link){
  $response["code"]=1;
  $response["message"]="数据库连接失败";
  echo $response;
  exit;

}
mysqli_set_charset($link,"utf8");
mysqli_select_db($link,"joker");
$sql="select * from {$tableList[$tableID-1]} WHERE ID=${id}";
$sql2="select * from {$tableList[$tableID-1]}";
$res=mysqli_query($link,$sql);
$row=mysqli_fetch_assoc($res);
$res2=mysqli_query($link,$sql2);
$row2=mysqli_fetch_all($res2);
$count=count($row2);
$response['count']=$count;
//echo json_encode();
if(!$row){
  $response["code"]=1;
  $response["message"]="没有笑话了";
  echo json_encode($response);
  exit;
}else{
  $response["code"]=0;
  $response["message"]="finded";
  $response["joke"]=$row;
  echo json_encode($response);
  
}
//关闭连接
mysqli_close($link);
?>