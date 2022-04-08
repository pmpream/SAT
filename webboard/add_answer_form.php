<?php
include 'config.php';
$getdate = date('Y-m-d H:i:s');
$sql = "insert into answer (qu_id,detail,name,email,create_date) values ('{$_POST['qu_id']}','{$_POST['detail']}','{$_POST['name']}','{$_POST['email']}','{$getdate}') ";
$query = mysqli_query($conn,$sql);
if($query==TRUE){
  header('location:view_topic.php?id=' . $_POST['qu_id']);
}else{
  echo 'error inserting database';
}
mysqli_close($conn);
