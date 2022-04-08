<?php
include 'config.php';
$sql = "select * from question where qu_id='{$_GET['id']}' ";
$query = mysqli_query($conn,$sql);
$result = mysqli_fetch_assoc($query);

//answer Table
$sql_aw = "select * from answer where qu_id='{$_GET['id']}' ";
$query_aw = mysqli_query($conn,$sql_aw);
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="language" content="en">
  <title>ระบบ Webboard</title>
</head>
<body>
  <a href="index.php">กลับไปหน้าเดิม</a>
  <form action="add_answer_form.php" method="post">
    <input type="hidden" value="<?php echo $_GET['id']; ?>" name="qu_id" ?>
    <table border="1" cellpadding="10">
      <tr>
        <td>ชื่อหัวข้อตั้งคำถาม</td>
        <td><?php echo $result['topic']; ?></td>
      </tr>
      <tr>
        <td>รายละเอียด</td>
        <td><?php echo nl2br($result['detail']); ?></td>
      </tr>
      <tr>
        <td>ชื่อผู้ตั้งคำถาม</td>
        <td><?php echo $result['name']; ?></td>
      </tr>
      <tr>
        <td>อีเมล์ผู้ตั้งคำถาม</td>
        <td><?php echo $result['email']; ?></td>
      </tr>
    </table>

    <?php $i=1; while($rs = mysqli_fetch_assoc($query_aw)){ ?>
      <hr>
      <table border="1" cellpadding="10" color="green">
        <tr>
          <td>คำตอบ</td>
          <td><?php echo nl2br($rs['detail']); ?></td>
        </tr>
        <tr>
          <td>ชื่อผู้ตอบ</td>
          <td><?php echo $rs['name']; ?></td>
        </tr>
        <tr>
          <td>อีเมล์</td>
          <td><?php echo $rs['email']; ?></td>
        </tr>
        <tr>
          <td>วันที่ตอบ</td>
          <td><?php echo $rs['create_date']; ?></td>
        </tr>
      </table>
      <?php } ?>
      <hr>
      <table border="1" cellpadding="10">
        <tr>
          <td>รายละเอียดคำตอบ</td>
          <td><textarea name="detail" cols="60" rows="4"></textarea></td>
        </tr>
        <tr>
          <td>ชื่อผู้ตอบ</td>
          <td><input type="text" name="name"></td>
        </tr>
        <tr>
          <td>อีเมล์ผู้ตอบ</td>
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
  mysqli_close($conn);
