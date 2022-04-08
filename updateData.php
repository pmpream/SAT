<?php 
require("dbconnect.php");

$id=$_POST["id"];

$fname=$_POST["fname"]; 
$lname= $_POST["lname"];
$gender=$_POST["gender"];
$color=$_POST["color"];
$pros=$_POST["pros"];
$contact=$_POST["contact"];
$location_=$_POST["location_"];
$gene=implode(",",$_POST["gene"]);
$fileupload = (isset($_POST['fileupload']) ? $_POST['fileupload'] : '');
//$status_=implode(",",$_POST["status_"]); // array=> string
//$status_=implode(",",$_POST["status_"]);

$sql ="UPDATE employees SET fname = '$fname',lname='$lname' , gender = '$gender' , gene = '$gene' , status_ =  '$status_' , fileupload = '$fileupload'
,pros = '$pros' ,location_ = '$location_ ' ,contact = '$contact' WHERE id = $id";

$result=mysqli_query($connect,$sql);

if($result){
    header("location:user_page.php");
    exit(0);
}else{
    echo "เกิดข้อผิดพลาดเกิดขึ้น".mysqli_error($connect);
}
?>