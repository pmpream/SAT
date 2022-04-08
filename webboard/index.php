<?php
include 'config.php';
$sql = "select qu_id,topic,create_date from question order by qu_id desc";
$query = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="language" content="en">
  <title>ระบบ Webboard</title>
</head>
<body>
  <a href="add_topic.php">เพิ่มคำถาม</a>
  <table border="1" cellpadding="10">
    <thead>
      <tr>
        <th>ลำดับ</th>
        <th>หัวข้อคำถาม</th>
        <th>วันที่สร้าง</th>
      </tr>
    </thead>
    <tbody>
      <?php $i=1; while($result = mysqli_fetch_assoc($query)){ ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td>
            <a href="view_topic.php?id=<?php echo $result['qu_id']; ?>"><?php echo $result['topic']; ?></a>
          </td>
          <td><?php echo $result['create_date']; ?></td>
        </tr>
        <?php $i++; } ?>
      </tbody>
    </table>
  </body>
  </html>
  <?php
  mysqli_close($conn);
