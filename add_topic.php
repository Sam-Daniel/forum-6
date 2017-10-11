<?php
session_start();
include './db.php';
if (isset($_SESSION['user'])) {
    $_SESSION['user']['username'] .
            '<a href="logout.php">Log Out</a>';
} else {
    header('location: login.php');
}
$user = ($_SESSION['user']);


if (isset($_GET['topic_name'])) {

    $topic = $_GET['topic_name'];


    $sql1 = "SELECT * FROM users WHERE user_id=" . $user['user_id'];
    $result1 = mysqli_query($con, $sql1);
    $row = mysqli_fetch_assoc($result1);
    $user_id = $row['user_id'];


    $sql2 = "INSERT INTO topics (topic_name, user_id) VALUES ('$topic', $user_id)";

    $result2 = mysqli_query($con, $sql2);
    mysqli_close($con);

    header('location: topics.php');
}
?>


<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">

        <title>Add Topic</title>
    </head>
    <body>

        <div class="topic_post_container"> 


            <form action="" method="GET" >
                <textarea  class="add_topic_post" rows="4" cols="50" name="topic_name" ></textarea>
                <br>
                <input  class="input_field" type="submit" name="submit" value="Add Topic">   
            </form>
        </div>


    </body>
</html>
