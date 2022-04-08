<?php

include('dbconnect.php');
include_once 'controllers/Comment.php';
$id = $_GET['id'];
$com = new Comment();

$query = "SELECT * FROM `employees` WHERE id = " . $id;
$result = mysqli_query($connect, $query);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Comments</title>

</head>
<center>

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
                        <a class="nav-link" href="https://www.youtube.com/watch?v=_ivYh1FakjE" taget="blank"> Link</a>
                    </li>

                </ul>

                <form action="searchData1.php" class="form-inline my-2 my-lg-0" method="POST">
                    <input class="form-control mr-sm-2" type="search" placeholder="ค้นหาชื่อสัตว์" name="empname" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> &nbsp
                </form>



                <a href="logout.php" button class="btn btn-outline-danger my-2 my-sm-0" type="submit">ออกจากระบบ
                    </button></a>
        </nav>
        <nav>
            <div>
                <?php
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "User ID : " . $row["id"] . "<br>";
                        echo "เจ้าของ : " . $row["fname"] . "<br>";
                        echo "ชื่อสุนัข : " . $row["lname"] . "<br>";
                        echo "เพศ : " . $row["gender"] . "<br>";
                        echo "สีสัตว์ : " . $row["color"] . "<br>";
                        echo "พันธุ์ : " . $row["gene"] . "<br>";
                        echo "จุดเด่น : " . $row["pros"] . "<br>";
                        echo "ติดต่อ : " . $row["contact"] . "<br>";
                        echo "พิกัด : " . $row["location_"] . "<br>";
                        echo "สถานะ : " . $row["status_"] . "<br>";

                        echo "<hr>";
                    }
                }
                ?>
                <center>
            </div>
            <table class="table table-striped table-hover">
                <div class="container my-3">
                    <div class="form-group">
                        <?php
                        include('con2DB.php');
                        date_default_timezone_set('Asia/Bangkok');
                        $date = date("Ymd");
                        
                        $sql = "SELECT * FROM `tbl_comments` WHERE employee_id = " . $id;
                        $result = $conn2->query($sql);
                        $conn2->close();
                        if ($result) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td align='center'>" . $row["name"] . "</td>";
                                echo "<td align='center'>" . $row["comment"] . "</td> ";
                                echo "<td align='center'>" . $row["date"] . "</td> ";
                                echo "</tr>"
                        ?><?php } ?>
                    <?php } ?>
                    </div>
</center>
</div>
</table>

<center>
    <?php

    if (isset($_GET['msg'])) {
        $msg = $_GET['msg'];
        echo "<span style='color: green; font-size: 20px'>" . $msg . "</span>";
    }

    ?>
    <br>
    <form action="post_comment.php" method="post">
        <div class="container my-3">
            <div>
                <input type="hidden" id="id" name="id" value="<?php echo $id ?>"></input>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="fname">name : </label>
                <input type="text" id="name" name="name" required="required">
            </div>
            <div>
                <label for="lname">comment : </label>
                <input type="text" id="lname" name="comment" required="required">
            </div>
            <input type="submit" value="Submit" class="btn btn-outline-warning btn-sm">
        </div>
    </form>
</center>

</div>

</body>

</html>