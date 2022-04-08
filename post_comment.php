<?php



// include_once 'controllers/Comment.php';

// $com = new Comment();

// if (isset($_POST['submit'])) {
//     $name = $_POST['name'];
//     $comment = $_POST['comment'];

//     if (empty($name) || empty($comment)) {
//         echo "<span style='color: red; font-size: 20px;'>Field must not be empty</span>";
//     } else {
//         $com->setData($name, $comment);
//         if ($com->create()) {
//             header('Location: index11.php?msg='.urlencode('Comment Posting Successfully'));
//         }
//     }
// }
include("con2DB.php");
$name = $_POST['name'];
$comment = $_POST['comment'];
$id = $_POST['id'];
$date = date("Y-m-d H:i:s");
$sql = "INSERT INTO  tbl_comments (name, comment, date, employee_id) VALUES ('" . $name . "', '" . $comment . "','" . $date . "'," . $id . ")";
$conn2->query($sql);
$url = "index11.php?id=". $id;
header('Location: ' . $url);
