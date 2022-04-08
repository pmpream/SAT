<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include('conect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//$fileupload = $_POST['fileupload']; //รับค่าไฟล์จากฟอร์ม	
//$fileupload = $_POST['fileupload']; //รับค่าไฟล์จากฟอร์ม 
$fileupload = (isset($_POST['fileupload']) ? $_POST['fileupload'] : '');
//ฟังก์ชั่นวันที่
    date_default_timezone_set('Asia/Bangkok');
	$date = date("Ymd");	
//ฟังก์ชั่นสุ่มตัวเลข
    $numrand = (mt_rand());
//เพิ่มไฟล์
$upload=$_FILES['fileupload'];
if($upload !='') {   //not select file
//โฟลเดอร์ที่จะ upload file เข้าไป 
        $path="fileupload/";  

        //เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
        $type = strrchr($_FILES['fileupload']['name'],".");
            
        //ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
        $newname = $date.$numrand.$type;
        $path_copy=$path.$newname;
        $path_link="fileupload/".$newname;

        //คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
        move_uploaded_file($_FILES['fileupload']['tmp_name'],$path_copy);  	
	}
	// เพิ่มไฟล์เข้าไปในตาราง uploadfile
	
		    $sql = "INSERT INTO uploadfile (fileupload) 
		    VALUES('$newname')";
		
		    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " .mysqli_error($con, $query));
                
	
	    mysqli_close($con);
	// javascript แสดงการ upload file
    
	
	if($result){
        echo "<script type='text/javascript'>";
        echo "alert('Upload File Succesfuly');";
        echo "window.location = 'insertForm.php'; ";
        echo "</script>";
	}
	else{
        echo "<script type='text/javascript'>";
        echo "alert('Error back to upload again');";
        echo "window.location = 'insertForm.php'; ";
        echo "</script>";
}
?>

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
    <title>ข้อมูลสัตว์</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <h1 class="text-center">ข้อมูลสัตว์ในฐานข้อมูล</h1>
    <hr>
    <?php if($count>0){?>
        <!--<form action="searchData.php" class="form-group" method="POST">
        <label for="">ค้นหาชื่อผู้เเจ้ง</label>
        <input type="text" placeholder="ป้อนชื่อพนักงาน" name="empname" class="form-control">
        <input type="submit" value="Search" class="btn btn-dark my-2">
    </form>-->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ลำดับที่</th>
                <th>ชื่อผู้แจ้ง</th>
                <th>ชื่อสัตว์</th>
                <th>เพศ</th>
                <th>สีสัตว์</th>
                <th>พันธุ์</th>
                <th>จุดเด่น</th>
                <th>ติดต่อ</th>
                <th>พิกัด</th>
                
                <th>อัพโหลดรูปภาพ</th>
                <th>สถานะ</th>
                <th>แก้ไขข้อมูล</th>
                <th>ลบข้อมูล</th>
                <th>ลบข้อมูล (Checkbox)</th>
            </tr>
        </thead>
        <tbody>
        <?php while($row=mysqli_fetch_assoc($result)){?>
            <tr>
                <td><?php echo $order++ ;?></td>
                <td><?php echo $row["fname"] ;?></td>
                <td><?php echo $row["lname"] ;?></td>
                <td>
                <?php 
                if($row["gender"] == "male"){?>
                    ผู้
                <?php } else if ($row["gender"] == "female"){?>
                    เมีย
                <?php }else{?>
                    อื่นๆ
                <?php }?>
                
                </td>
                <td><?php echo $row["color"] ;?></td>
                <td><?php echo $row["gene"] ;?></td>
                <td><?php echo $row["pros"] ;?></td>
                <td><?php echo $row["contact"] ;?></td>
                <td><?php echo $row["location_"] ;?></td>
                <td><img src="fileupload/<?php print($row["fileupload"]); ?> " width="100" height="100"></td>
                
                <td>
                <?php 
                if($row["status_"] == "disappear"){?>
                    แจ้งหาย
                <?php } else if ($row["status_"] == "lost"){?>
                    แจ้งหลง
                <?php }else{?>
                    พบแล้ว
                <?php }?>
                
                </td>

                

                
                <td>
                <a href="editForm.php?id=<?php echo $row["id"]?>" class="btn btn-primary">แก้ไข</a>
                </td>
                <td>
                    <a href="deleteQueryString.php?idemp=<?php echo $row["id"];?>" 
                    class="btn btn-danger"
                    onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่')"
                    >ลบข้อมูล</a>
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