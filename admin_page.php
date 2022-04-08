<?php 

    session_start();

    require('dbconnect.php');

    $sql = "SELECT * FROM employees ORDER BY fname ASC";
    $result=mysqli_query($connect,$sql);

    $count=mysqli_num_rows($result);
    $order=1;


    if (!$_SESSION['userid']) {
        header("Location: index.php");
    } else {

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    
    
</head>

<body>
<head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  
&nbsp&nbsp&nbsp<a class="navbar-brand" href="#">SAT (สัตว์)หายได้คืน </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
 


  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="admin_page.php"> <span class="sr-only">(current)</span></a>
      </li>
    </ul> 
    <a href="admin_page.php" button class="btn btn-outline-warning my-2 my-sm-0" type="submit"><h7>Hi, <?php echo $_SESSION['user']; ?></h7></a></a> &nbsp
    <a href="logout.php" button class="btn btn-outline-danger my-2 my-sm-0" type="submit">ออกจากระบบ
    </button></a>

</div>
</nav>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="user_page.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            <span class="ml-2">Homepage</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="aindex.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                            <span class="ml-2">พันธุ์สัตว์ต่างๆ</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="aindex1.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                            <span class="ml-2">สถานะสัตว์</span>
                          </a>
                        
                        <!--<li class="nav-item">
                          <a class="nav-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            <span class="ml-2">Customers</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                            <span class="ml-2">Reports</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                            <span class="ml-2">Integrations</span>
                          </a>
                        </li>-->
                        
                      </ul>
    </div>
    </nav>
            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
                <nav aria-label="breadcrumb">
                <nav>
            <?php if($count>0){?>
        
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
                <a href="editForm.php?id=<?php echo $row["id"]?>" class="btn btn-secondary">Edit</a>
                </td>
                <td>
                    <a href="deleteQueryString.php?idemp=<?php echo $row["id"];?>" 
                    class="btn btn-danger "
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
</div>

</body>
</html>
                      
        
</head>
</body>
</html>
<?php } ?>