<?php 

    session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style4.css">
    <link rel="stylesheet" href="style3.css">

</head>
<body>
    <?php if (isset($_SESSION['success'])) : ?>
        <div class="success">
            <?php 
                echo $_SESSION['success'];
            ?>
        </div>
    <?php endif; ?>


    <?php if (isset($_SESSION['error'])) : ?>
        <div class="error">
            <?php 
                echo $_SESSION['error'];
            ?>
        </div>
    <?php endif; ?>

    <body>
    <div class="hero">
        <!--<img src="images/cloud.png" class="cloud">-->
        <br>
        <br>
        <br>
    <center>
    <class= "container my-3">
        <h2 class="text-center">SAT (สัตว์)หายได้คืน</h2>
        <br>
        <form action="login.php" method="POST">
        <div class="form-group">
                <p><label for="username">ชื่อผู้ใช้ : </label>
                <input type="text" name="username" placeholder="Username" class="btn btn-outline-warning btn-sm" required></p>
                <br>
        <div class="form-group">
                <p><label for="password">รหัสผ่าน : </label>
                <input type="password" name="password" placeholder="Password" class="btn btn-outline-warning btn-sm" required></p>
                <br>
        <p><input type="submit" name="submit" value="Login" class="btn btn-outline-info btn-sm"></p>
        <br>
    <a href="register.php" class="btn btn-outline-info btn-sm">Go to register</a>
    </center>

<div class="ocean">
    <img src="images/water.png" class="water">
    <div class="boat">
        <img src="images/boat.png">
    </div>
</div>
</div>

</body>
</html>

<?php 

    if (isset($_SESSION['success']) || isset($_SESSION['error'])) {
        session_destroy();
    }

?>