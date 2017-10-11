<?php
session_start();
include './db.php';
if (isset($_SESSION['user'])) {
    $_SESSION['user']['username'] .
            '<a href="logout.php">Log Out</a>';
} else {
    header('location: login.php');
}

$user = $_SESSION['user'];


if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql_delete = "DELETE FROM topics WHERE topic_name='$id'";

    $result_delete = mysqli_query($con, $sql_delete);
}

$page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
if (!$page) {
    $page = 1;
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

        <title>Forum</title>
    </head>
    <body>
        <div class="container">

            <div class= "header">
                <?php
                echo "<h4>Welcome" . "   " . $user['username'] . " </h4><br>";
                ?>
                <form action="logout.php">
                    <button  type="submit" class="btn btn-default">Log Out</button>   
                </form>

            </div>



            <form action="index.php" method="GET">

                <input type="hidden" name="page" value="<?php echo $page; ?>" />

            </form>
            <a href="add_topic.php">Add new topic</a>


            <div class="post_table" >
                <table  class="table table-bordered">
                    <tr>
                        <th>Topic</th>
                        <th>Created By</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $limit = 5;
                    $offset = 0;

                    if ($page > 0) {
                        $offset = ($page * $limit) - $limit;
                    }


                    $sql = "SELECT * FROM users INNER JOIN topics ON users.user_id = topics.user_id ORDER BY topic_name  LIMIT $limit OFFSET $offset ";
                    $result = mysqli_query($con, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $topic_name = $row['topic_name'];
                        $topic_id = $row['topic_id'];
                        $usernameposts = $row ['username'];
                        echo "<tr>";

                        echo "<td><a href=\"posts.php?topic_id=$topic_id\"> $topic_name </a></td>";

                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td><a href=\"topics.php?id=" . $row['topic_name'] . "\">delete</a></td>";
                        echo "</tr>";
                    }
                    $query = "SELECT COUNT(topic_id) as rows FROM topics ";

                    $result = mysqli_query($con, $query);
                    $contactCount = mysqli_fetch_assoc($result);
                    $contactCount = $contactCount['rows'];
                    ?>
                </table>
                <?php
                $pages = ceil($contactCount / $limit);
                if ($page > 1) {
                    echo '<a href="topics.php?page=' . ($page - 1) . '">Prev</a> ';
                }
                for ($i = 1; $i <= $pages; $i++) {
                    if ($page == $i) {
                        echo $i . ' ';
                    } else {
                        echo '<a href="topics.php?page=' . $i . '">' . $i . '</a> ';
                    }
                }
                if ($page < $pages) {
                    echo '<a href="topics.php?page=' . ($page + 1) . '">Next</a> ';
                }
                ?>
            </div>


        </div>
    </body>
</html>
