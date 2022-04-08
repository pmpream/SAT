<?php
include 'config.php';
$getdate = date('Y-m-d H:i:s');
$sql = "insert into question (topic,detail,name,email,create_date) values ('{$_POST['topic']}','{$_POST['detail']}','{$_POST['name']}','{$_POST['email']}','{$getdate}') ";
$query = mysqli_query($conn,$sql);
if($query==TRUE){
  header('location:index.php');
}else{
  echo 'error inserting database';
}
mysqli_close($conn);
