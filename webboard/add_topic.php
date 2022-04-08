<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="language" content="en">
  <title>ระบบ Webboard</title>
</head>
<body>
  <a href="index.php">กลับไปหน้าเดิม</a>
  <form action="add_topic_form.php" method="post">
    <table border="1" cellpadding="10">
      <tr>
        <td>ชื่อหัวข้อตั้งคำถาม</td>
        <td><input type="text" name="topic"></td>
      </tr>
      <tr>
        <td>รายละเอียด</td>
        <td><textarea name="detail" cols="60" rows="4"></textarea></td>
      </tr>
      <tr>
        <td>ชื่อผู้ตั้งคำถาม</td>
        <td><input type="text" name="name"></td>
      </tr>
      <tr>
        <td>อีเมล์ผู้ตั้งคำถาม</td>
        <td><input type="text" name="email"></td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" value="บันทึกข้อมูล" name="submit"></td>
      </tr>
    </table>
  </form>
</body>
</html>
<?php
//mysqli_close($conn);
