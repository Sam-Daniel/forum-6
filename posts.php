<?php
session_start();
if (isset($_SESSION['user'])) {
    $_SESSION['user']['username'] .
            '<a href="logout.php">Log Out</a>';
} else {
    header('location: login.php');
}
$user = $_SESSION['user'];



include './db.php';


if (isset($_GET['topic_id'])) {

    $topic_id = $_GET['topic_id'];

    $sql1 = "SELECT * FROM posts WHERE topic_id = $topic_id  ";

    $result1 = mysqli_query($con, $sql1);
}


if (isset($_GET['add_post_header'])) {

    $topic_id = $_GET['add_post_header'];

    $sql1 = "SELECT * FROM posts WHERE topic_id= $topic_id ";
    $result1 = mysqli_query($con, $sql1);
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">

        <title>Posts</title>
    </head>
    <body>
        <div class="container">

            <div class= "header">
                <?php
                $sql2 = "SELECT * FROM topics WHERE topic_id= $topic_id ";
                $result2 = mysqli_query($con, $sql2);

                while ($row = mysqli_fetch_assoc($result2)) {
                    $topic_name = $row['topic_name'];
                    echo "Topic Name: " . $topic_name;
                }


                echo "<h4>Welcome" . "   " . $user['username'] . " </h4>";
                ?>


                <form action="logout.php">
                    <button  type="submit" class="btn btn-default">Log Out</button>   
                </form>
                <br>
                <form action="topics.php">
                    <button  type="submit" class="btn btn-default">Back To Topics</button>   
                </form>

            </div>
            <br><br><br>

            <?php
            echo "<a href=\"add_post.php?idnatopic=$topic_id \">Add new post</a>";
            ?>




            <div class="post_table" >
                <table  class="table table-bordered">
                    <tr>
                        <th>Posts</th>
                        <th>Created By</th>

                    </tr>
                    <?php
                    $sql3 = "SELECT * FROM posts INNER JOIN users ON users.user_id=posts.user_id WHERE posts.topic_id= $topic_id";
                    $result3 = mysqli_query($con, $sql3);


                    while ($row1 = mysqli_fetch_assoc($result3)) {
                        echo "<tr>";
                        echo "<td>" . $row1['content'] . "</td>";
                        echo "<td>" . $row1['username'] . "</td>";

                        echo "</tr>";
                    }
                    ?>
                </table>

            </div>


        </div>
    </body>
</html>
