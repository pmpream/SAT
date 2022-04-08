<?php 
require("dbconnect.php");
$id=$_GET["id"];

$sql="SELECT * FROM employees WHERE id = $id";
$result=mysqli_query($connect,$sql);

$row=mysqli_fetch_assoc($result);
$gene_arr=array ("ไทยหลังอาน (Thai Ridgeback)"."<br>","บางแก้ว (Bangkaew)"."<br>"
,"บาเซนจิ (Basenji)"."<br>","บูลล์ด็อก  (Bulldog)"."<br>","ชิสุ (Shih Tzu)"."<br>","พิทบูล (Pit bull)"."<br>"
,"ปั๊ก (Pug)"."<br>","ปอมเมอเรเนียน (Pomeranian)"."<br>","ร็อตไวเลอร์  (Rottweiler)"."<br>","ชิบะ อินุ (Shiba Inu)"."<br>"
,"ดัชชุน (Dachshund)"."<br>","ไซบีเรียนฮัสกี้ (siberian husky)"."<br>","เวลช์ คอร์กี้ (Welsh corgi)"."<br>"
,"โกลเด้น รีทรีฟเวอร์ (Golden Retriever)"."<br>","ซามอยด์ (Samoyed)"."<br>","เชา เชา (Chow Chow)"."<br>","อื่นๆ"."<br>","ไม่ทราบสายพันธุ์"."<br>",); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลสัตว์</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <div class="container my-3">
        <h2 class="text-center">แบบฟอร์มแก้ไขข้อมูล</h2>
        <form action="updateData.php" method="POST">
            <input type="hidden" value="<?php echo $row["id"];?>" name="id">
            <div class="form-group">
                <label for="firstname">ชื่อผู้แจ้ง</label>    
                <input type="text" name="fname" id="" class="form-control" value="<?php echo $row["fname"];?>">
            </div>
            <div class="form-group">
                <label for="lastname">ชื่อสัตว์</label>    
                <input type="text" name="lname" id="" class="form-control" value="<?php echo $row["lname"]?>">
            </div>
            <div class="form-group">
                <label for="gender">เพศ</label><br>    
                <?php
                if($row["gender"] == "male"){
                    echo "<input type='radio' name='gender' value='male checked>ผู้";
                    echo "&nbsp;<input type='radio' name='gender' value='female'>เมีย";
                    
                }else if($row["gender"] == "female"){
                    echo "<input type='radio' name='gender' value='male'>ผู้";
                    echo "  &nbsp &nbsp;<input type='radio' name='gender' value='female' checked>เมีย";
                    
                }else{
                    echo "<input type='radio' name='gender' value='male'>ผู้"."&nbsp;";
                    echo "  &nbsp &nbsp;<input type='radio' name='gender' value='female'>เมีย";
                   
                }
                ?>
            </div>
            <div class="form-group">
                <label for="color">สีสัตว์</label>    
                <input type="text" name="color" id="" class="form-control" value="<?php echo $row["color"]?>">
            </div>
            <div class="form-group">
                <label for="pros">จุดเด่น</label>    
                <input type="text" name="pros" id="" class="form-control" value="<?php echo $row["pros"]?>">
            </div>
            <div class="form-group">
                <label for="contact">ติดต่อ</label>    
                <input type="text" name="contact" id="" class="form-control" value="<?php echo $row["contact"]?>">
            </div>
            <div class="form-group">
                <label for="location_">พิกัด</label>
                <input type="text" name="location_" id="" class="form-control" value="<?php echo $row["location_"]?>">
            </div>
            
            
            <div class="form-group">
                <label for="status_">สถานะ</label><br>
                <?php
                if($row["status_"] == "disappear"){
                    echo "<input type='radio' name='status_' value='disappear' checked>แจ้งหาย";
                    echo "  &nbsp &nbsp;<input type='radio' name='status_' value='lost'>แจ้งหลง";
                    echo "  &nbsp &nbsp;<input type='radio' name='status_' value='other'>พบแล้ว";
                }else if($row["status_"] == "lost"){
                    echo "<input type='radio' name='status_' value='disappear'>แจ้งหาย";
                    echo "   &nbsp &nbsp;<input type='radio' name='status_' value='lost' checked>แจ้งหลง";
                    echo "   &nbsp &nbsp;<input type='radio' name='status_' value='other'>พบแล้ว";
                }else{
                    echo "<input type='radio' name='status_' value='disappear'>แจ้งหาย";
                    echo "  &nbsp &nbsp;<input type='radio' name='status_' value='lost' checked>แจ้งหลง";
                    echo "  &nbsp &nbsp;<input type='radio' name='status_' value='other'>พบแล้ว";
                   
                }
                ?>
            </div>
            
            <div class="form-group">
                <label for="">พันธุ์</label><br>
                <?php 
                $gene=explode(",",$row["gene"]); // ทักษะของพนักงาน
                
                
                foreach($gene_arr as $value){
                    if(in_array($value,$gene)){
                        echo "<input type='checkbox' name='gene[]' value='$value' checked> $value";
                    }else{
                        echo "<input type='checkbox' name='gene[]' value='$value'> $value";
                    }
                }
                ?>
            </div>
            <form action="add_file_db.php" method="post" enctype="multipart/form-data" name="upfile" id="upfile">
    <p>&nbsp;</p>

    <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="40" colspan="2" align="center" bgcolor="#D6D6D6">Form Upload&nbsp;File</td>
      </tr>
      <tr>
        <td width="126" bgcolor="#EDEDED">&nbsp;</td>
        <td width="574" bgcolor="#EDEDED">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" bgcolor="#EDEDED">File Browser</td>
        <td bgcolor="#EDEDED"><label>
            <input type="file" name="fileupload" id="fileupload" required="required" />
          </label></td>
      </tr>
      <tr>
        <td bgcolor="#EDEDED">&nbsp;</td>
        <td bgcolor="#EDEDED">&nbsp;</td>
      </tr>
      <!--<tr>
        <td bgcolor="#EDEDED">&nbsp;</td>
        <td bgcolor="#EDEDED"><input type="submit" name="button" id="button" value="Upload" /></td>
      </tr>-->
      <tr>
        <td bgcolor="#EDEDED">&nbsp;</td>
        <td bgcolor="#EDEDED">&nbsp;</td>
      </tr>
    </table>

    <p>&nbsp;</p>
            
            
            
            
            <input type="submit" value="อัปเดตข้อมูล" class="btn btn-outline-success">
            <input type="reset" value="ล้างข้อมูล" class="btn btn-outline-danger">
            <a href="user_page.php" class="btn btn-outline-primary">กลับหน้าแรก</a>
        </form>
    </div>
</body>
</html>