<?php
require('dbconnect.php');
$sql = "SELECT * FROM employees";
$result=mysqli_query($connect,$sql);

while($row=mysqli_fetch_assoc($result)){
    echo "ไอดีผู้ใช้ = ".$row["id"]."<br>";
    echo "ชื่อ = ".$row["fname"]."<br>";
    echo "ชื่อสัตว์ = ".$row["lname"]."<br>";
    echo "เพศ = ".$row["gender"]."<br>";
    echo "สีสัตว์= ".$row["color"]."<br>";
    echo "พันธุ์ = ".$row["gene"]."<br>";
    echo "จุดเด่น = ".$row["pros"]."<br>";
    echo "ติดต่อ = ".$row["contact"]."<br>";
    echo "พิกัด = ".$row["location_"]."<br>";
    echo "สถานะ = ".$row["status_"]."<br>";
    echo "อัพโหลดรูปภาพ = ".$row["fileupload"]."<br>";
    echo "<hr>";
}

?>