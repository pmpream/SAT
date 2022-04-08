<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แจ้งข้อมูลสัตว์</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>

    <div class="container my-3">
        <h2 class="text-center">แบบฟอร์มบันทึกข้อมูลสัตว์</h2>
        <form action="insertData.php" method="POST">
            <div class="form-group">
                <label for="firstname">ชื่อผู้แจ้ง</label>    
                <input type="text" name="fname" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="lastname">ชื่อสัตว์</label>    
                <input type="text" name="lname" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="gender">เพศ</label><br>
                <input type="radio" name="gender" value="male">ผู้ &nbsp;
                <input type="radio" name="gender" value="female">เมีย
                
            </div>
            <div class="form-group">
                <label for="color">สีสัตว์</label>    
                <input type="text" name="color" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="pros"> จุดเด่น </label>
                <input type="text" name="pros" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="contact"> ติดต่อ </label>
                <input type="text" name="contact" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="location_"> พิกัด </label>
                <input type="text" name="location_" id="" class="form-control">
            </div>
            
        
            <div class="form-group">
                <label for="status_">สถานะ</label><br>
                <input type="radio" name="status_" value="disappear">แจ้งหาย &nbsp;
                <input type="radio" name="status_" value="lost">แจ้งหลง
                
         
            </div>
            <div class="form-group">
                <label for="">พันธุ์</label><br>
                <input type="checkbox" name="gene[]" value="ไทยหลังอาน (Thai Ridgeback)"> ไทยหลังอาน (Thai Ridgeback) <br>
                <input type="checkbox" name="gene[]" value="บางแก้ว (Bangkaew)"> บางแก้ว (Bangkaew) <br>
                <input type="checkbox" name="gene[]" value="บาเซนจิ (Basenji)"> บาเซนจิ (Basenji) <br>
                <input type="checkbox" name="gene[]" value="บูลล์ด็อก  (Bulldog)"> บูลล์ด็อก  (Bulldog) <br>
                <input type="checkbox" name="gene[]" value="ชิสุ (Shih Tzu) "> ชิสุ (Shih Tzu) <br>
                <input type="checkbox" name="gene[]" value="พิทบูล (Pit bull)"> พิทบูล (Pit bull) <br>
                <input type="checkbox" name="gene[]" value="ปั๊ก (Pug)"> ปั๊ก (Pug) <br>
                <input type="checkbox" name="gene[]" value="ปอมเมอเรเนียน (Pomeranian)"> ปอมเมอเรเนียน (Pomeranian) <br>
                <input type="checkbox" name="gene[]" value="ร็อตไวเลอร์  (Rottweiler)"> ร็อตไวเลอร์  (Rottweiler) <br>
                <input type="checkbox" name="gene[]" value="ชิบะ อินุ (Shiba Inu)"> ชิบะ อินุ (Shiba Inu) <br>
                <input type="checkbox" name="gene[]" value="ดัชชุน (Dachshund)"> ดัชชุน (Dachshund) <br>
                <input type="checkbox" name="gene[]" value="ไซบีเรียนฮัสกี้ (siberian husky)"> ไซบีเรียนฮัสกี้ (siberian husky) <br>
                <input type="checkbox" name="gene[]" value="เวลช์ คอร์กี้ (Welsh corgi)"> เวลช์ คอร์กี้ (Welsh corgi) <br>
                <input type="checkbox" name="gene[]" value="โกลเด้น รีทรีฟเวอร์ (Golden Retriever)"> โกลเด้น รีทรีฟเวอร์ (Golden Retriever) <br>
                <input type="checkbox" name="gene[]" value="ซามอยด์ (Samoyed)"> ซามอยด์ (Samoyed) <br>
                <input type="checkbox" name="gene[]" value="เชา เชา (Chow Chow)"> เชา เชา (Chow Chow) <br>
                <input type="checkbox" name="gene[]" value="orther"> อื่นๆ <br>
                <input type="checkbox" name="gene[]" value="ไม่ทราบสายพันธุ์"> ไม่ทราบสายพันธุ์ <br>
                
            </div>
            <form action="add_file_db.php" method="post" enctype="multipart/form-data" name="upfile" id="upfile">
    <p>&nbsp;</p>

    <!--<label class="upload" for=""> แนบรูปภาพ </label> <br />
    <input type="file" name="fileupload" id="fileupload" required="required" />
    <input type="submit" name="button" id="button" value="Upload" />-->

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
  

            
            
            <input type="submit" value="บันทึกข้อมูล" class="btn btn-outline-success" id="button" name="button" >
            <input type="reset" value="ล้างข้อมูล" class="btn btn-outline-danger">
            <a href="user_page.php" class="btn btn-outline-primary">กลับหน้าแรก</a>


        </form>
    </div>
</body>
</html>