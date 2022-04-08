<?php
require('dbconnect.php');

$sql = "SELECT * FROM employees ORDER BY fname ASC";
$result=mysqli_query($connect,$sql);

$count=mysqli_num_rows($result);
$order=1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>พันธุ์สัตว์</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <h1 class="text-center">พันธุ์สัตว์ในฐานข้อมูล</h1>
    <hr>
    <?php if($count>0){?>
        <form action="asearchData.php" class="form-group" method="POST">
        <label for="">ค้นหาพันธุ์สัตว์</label>
        <input type="text" placeholder="ป้อนพันธุ์สัตว์" name="empname" class="form-control">
        <input type="submit" value="Search" class="btn btn-dark my-2">
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ลำดับที่</th>
                <th>พันธุ์</th>
                <th>ชื่อสัตว์</th>
                <th>สถานะ</th>
                <th>ลบข้อมูล</th>
                <th>ลบข้อมูล (Checkbox)</th>
            </tr>
        </thead>
        <tbody>
        <?php while($row=mysqli_fetch_assoc($result)){?>
            <tr>
                <td><?php echo $order++ ;?></td>
                <td><?php echo $row["gene"] ;?></td>
                <td><?php echo $row["lname"] ;?></td>
                

                <td>
                <?php 
                if($row["status_"] == "disappear"){?>
                    แจ้งหาย
                <?php } else if ($row["status_"] == "lost"){?>
                    แจ้งหลง
                <?php }else {?>
                    พบแล้ว
                <?php }?>
                
                </td>
                <td>
                    <a href="deleteQueryString.php?idemp=<?php echo $row["id"];?>" 
                    class="btn btn-danger"
                    onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่')"
                    >Delete</a>
                </td>
                <form action="multipleDelete.php" method="post">
                <td>
                <input type="checkbox" class="form-control" name="idcheckbox[]" value="<?php echo $row["id"];?>">
                </td>
            </tr>
        <?php } ?>
        </tbody>        
    </table>
    
    <?php } else {?>
    <div class="alert alert-danger">
        <b>ไม่มีข้อมูลสัตว์ที่แจ้ง !!!<b>
    </div>
    <?php } ?>
    <!--<a input type="submit" href="insertForm.php" class="btn btn-success">บันทึกข้อมูล</a>-->
    <?php if($count>0){?>
        <a href="admin_page.php" class="btn btn-primary">ย้อนกลับ</a>
    <input type="submit" value="ลบข้อมูล (Checkbox)" class="btn btn-danger">
    <button class="btn btn-info" onclick="checkAll()">เลือกทั้งหมด</button>
    <button class="btn btn-warning" onclick="uncheckAll()">ยกเลิก</button>
    <?php } ?> 
    </form>
    </div>
</body>


<script>
function checkAll(){
    var form_element=document.forms[1].length; 
    for(i=0;i<form_element-1;i++){
        document.forms[1].elements[i].checked=true;
    }
}
function uncheckAll(){
    var form_element=document.forms[1].length; 
    for(i=0;i<form_element-1;i++){
        document.forms[1].elements[i].checked=false;
    }
}
</script>
</html>