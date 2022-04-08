<?php
// เชื่อมต่อฐานข้อมูล
require('dbconnect.php');

// รับค่าที่ส่งมาจากฟอร์มลงในตัวแปร
$fname=$_POST["fname"]; 
$lname= $_POST["lname"];
$gender=$_POST["gender"];
$color=$_POST["color"];
$pros=$_POST["pros"];
$contact=$_POST["contact"];
$location_=$_POST["location_"];
$status_=$_POST["status_"];
$gene=implode(",",$_POST["gene"]); // array=> string
$fileupload = (isset($_POST['fileupload']) ? $_POST['fileupload'] : '');


// บันทึกข้อมูล
$sql = "INSERT INTO employees(fname,lname,gender,gene,color,pros,location_,status_,contact,fileupload) 
VALUES('$fname','$lname','$gender','$gene','$color','$pros','$location_','$status_','$contact','$fileupload')";

$result=mysqli_query($connect,$sql); // สั่งรันคำสั่ง sql

if($result){
    header("location:submit.php");
    exit(0);
}else{
    echo mysqli_error($connect);
}

?>