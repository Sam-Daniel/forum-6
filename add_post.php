<?php
session_start();
include './db.php';
if (isset($_SESSION['user'])) {
    $_SESSION['user']['username'] .
            '<a href="logout.php">Log Out</a>';
} else {
    header('location: login.php');
}

$_SESSION['user'];
$user_id = $_SESSION['user']['user_id'];

if (isset($_GET['idnatopic'])) {
    $topic_id = $_GET['idnatopic'];
}


if (isset($_GET['post_content']) && isset($_GET['form_id']) && isset($_GET['form_topic'])) {
    $post_content = $_GET['post_content'];
    $form_user_id = $_GET['form_id'];
    $form_topic_id = $_GET['form_topic'];

    $sql2 = "INSERT INTO posts (content, user_id, topic_id) VALUES ('$post_content', $form_user_id, $form_topic_id)";

    $result2 = mysqli_query($con, $sql2);
    mysqli_close($con);

    header("location: posts.php?add_post_header=" . $form_topic_id);
}
?>


<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script><link rel="stylesheet" type="text/css" href="style.css">

        <title>Add Post</title>
    </head>
    <body>

        <div class="topic_post_container"> 


            <form  action="" method="GET" >

                <textarea  class="add_topic_post" rows="4" cols="50" name="post_content" >
                </textarea>
                <input type="hidden" name="form_id" value="<?php echo $user_id; ?>" />
                <input type="hidden" name="form_topic" value="<?php echo $topic_id; ?>" />
                <br>
                <input  class="input_field" type="submit" name="submit" value="Add Post">


            </form>

        </div>


    </body>
</html>
