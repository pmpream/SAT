<?php 

    session_start();

    require_once "connection.php";

    if (isset($_POST['submit'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];

        $user_check = "SELECT * FROM user WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($conn, $user_check);
        $user = mysqli_fetch_assoc($result);

        if ($user['username'] === $username) {
            echo "<script>alert('Username already exists');</script>";
        } else {
            $passwordenc = md5($password);

            $query = "INSERT INTO user (username, password, firstname, lastname, userlevel)
                        VALUE ('$username', '$passwordenc', '$firstname', '$lastname', 'm')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $_SESSION['success'] = "Insert user successfully";
                header("Location: index.php");
            } else {
                $_SESSION['error'] = "Something went wrong";
                header("Location: index.php");
            }
        }

    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style4.css">
    <link rel="stylesheet" href="style3.css">

</head>
<body>
<div class="hero">
        <!--<img src="images/cloud.png" class="cloud">-->
        <br>
        <br>
        <br>
    <center>
        <h2 class="text-center">SAT (สัตว์)หายได้คืน</h2>
        <br>
        
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    
        <label for="username">Username : </label>
        <input type="text" name="username" placeholder="Enter your username" class="btn btn-outline-warning btn-sm" required>
        <br>
        <br>
        <label for="password">Password : </label>
        <input type="password" name="password" placeholder="Enter your password" class="btn btn-outline-warning btn-sm" required>
        <br>
        <br>
        <label for="firstname">Firstname : </label>
        <input type="text" name="firstname" placeholder="Enter your firstname" class="btn btn-outline-warning btn-sm" required>
        <br>
        <br>
        <label for="lastname">Lastname : </label>
        <input type="text" name="lastname" placeholder="Enter your lastname" class="btn btn-outline-warning btn-sm" required>
        <br>
        <br>
        <input type="submit" name="submit" value="Submit" class="btn btn-outline-info btn-sm" >
    
    </form>

    <br>
    <a href="index.php" class="btn btn-outline-info btn-sm">Go back to index</a>
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