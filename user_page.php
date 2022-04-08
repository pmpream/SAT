<?php 

    session_start();

    if (!$_SESSION['userid']) {
        header("Location: index.php");
    } else {

      
    require('dbconnect.php');

    $sql = "SELECT * FROM employees ORDER BY fname ASC";
    $result=$connect->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="style3.css">

</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">SAT (สัตว์)หายได้คืน </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="user_page.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="insertForm.php">แจ้งข้อมูลสัตว์ <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://www.facebook.com/groups/530073320391399/" taget= "blank" > Link</a>
      </li>

      </ul>

    <form action="searchData1.php"class="form-inline my-2 my-lg-0" method="POST">
      <input class="form-control mr-sm-2" type="search" placeholder="ค้นหาพันธุ์สุนัข" name="empname" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> &nbsp 
    </form>
    
    
    <a button class="btn btn-outline-warning my-2 my-sm-0" type="submit"><h7>Hi, <?php echo $_SESSION['user']; ?></h7></a>&nbsp
    <a href="logout.php" button class="btn btn-outline-danger my-2 my-sm-0" type="submit">ออกจากระบบ
    </button></a>
    </nav>
    <nav>

    <body>
    <div class="container">
    <hr>
    <table class="table table-striped table-hover">
    
        <tbody>
        <?php while($row=mysqli_fetch_assoc($result)){?>
            <tr>
            <td>
              
            <?php 
                if($row["status_"] == "disappear"){?>
                    แจ้งหาย
                <?php } else if ($row["status_"] == "lost"){?>
                    แจ้งหลง
                <?php }else{?>
                    พบแล้ว
                <?php }?>

                <?php echo $row["gene"] ;?>
                
                
                
                </td>
                <td><img src="fileupload/<?php print($row["fileupload"]); ?> " width="250" height="200"></td>
                
                <form action="multipleDelete.php" method="post">
           </tr>
          <td>
          <a href="index11.php?id=<?php echo $row["id"]?>" class="btn btn-outline-info btn-sm ">แสดงความคิดเห็น</a>
          
          <a href="editForm.php?id=<?php echo $row["id"]?>" class="btn btn-outline-warning btn-sm">แก้ไข</a>
        
          </td>
        <?php } ?>
        </tbody>        
        </table>
 <?php } ?> 
    </div>
</body>
</nav>
</html>

