<?php 
require('dbconnect.php');
$gene = $_POST["empname"]; 

$sql = "SELECT * FROM employees WHERE gene LIKE '%$gene%' ORDER BY lname ASC";
$result=mysqli_query($connect,$sql);
$count=mysqli_num_rows($result);
$order=1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลสัตว์</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>

    <!-- As a heading หัวข้อ-->
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1">SAT (สัตว์)หายได้คืน </span>
  </div>
</nav>

    <br/>
    <br/>
    <br/>
    <br/>

    <div class="container">
    
    <?php if($count>0){?>
    <table class="table table-bordered">
        <thead>
            <tr>
                
                <th>ลำดับที่</th>
                <th>พันธุ์</th>
                <th>ชื่อผู้เเจ้ง</th>
                <th>ชื่อสัตว์</th>
                <th>เพศ</th>
                <th>สีสัตว์</th>
                
                <th>จุดเด่น</th>
                <th>ติดต่อ</th>
                <th>พิกัด</th>
                <th>สถานะ</th>
                
            </tr>
        </thead>
    <tbody>
        <?php while($row=mysqli_fetch_assoc($result)){?>
            <tr>
                <td><?php echo $order++ ;?></td>
                <td><?php echo $row["gene"] ;?></td>
                </td>
                <td><?php echo $row["fname"] ;?></td>
                <td><?php echo $row["lname"] ;?></td>
                <td>
                <?php 
                if($row["gender"] == "male"){?>
                    ชาย
                <?php } else if ($row["gender"] == "female"){?>
                    หญิง
                <?php }else{?>
                    อื่นๆ
                <?php }?>
                </td>
                <td><?php echo $row["color"] ;?></td>
                
                <td><?php echo $row["pros"] ;?></td>
                <td><?php echo $row["contact"] ;?></td>
                <td><?php echo $row["location_"] ;?></td>
                <td>
                <?php 
                if($row["status_"] == "disappear"){?>
                    แจ้งหาย
                <?php } else if ($row["status_"] == "lost"){?>
                    แจ้งหลง
                <?php }else{?>
                    พบแล้ว
                <?php }?>
                
                
            </tr>
        <?php } ?>
    </tbody>        
        </table>
    
    <?php } else {?>
    <div class="alert alert-danger">
        <b>ไม่พบข้อมูลที่ค้นหา !!!<b>
    </div>
    <?php } ?>
    <a href="user_page.php" class="btn btn-outline-info">กลับไปหน้าฟีด</a>
    </form>
    </div>



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