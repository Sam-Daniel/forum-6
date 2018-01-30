<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script><link rel="stylesheet" type="text/css" href="style.css">

        <title>Forum Login</title>
    </head>
    <body>
        <div id="login_container">

            <form action="login_action.php" method="POST">

                <input class="input_field" type="text" name="username" placeholder="Enter Username"><br>
                <input class="input_field" type="password" name="password" placeholder="Enter Password"><br>
                <input  class="input_field" type="submit" name="submit" value="Log In">

            </form>
            <?php
            if (isset($_GET['errorMsg'])) {
                $errorMsg = $_GET['errorMsg'];

                if ($errorMsg == 1) {
                    echo'<p class="login_error_msg">Both fields are required</p>';
                }
                if ($errorMsg == 2) {
                    echo'<p class="login_error_msg">Only alphanumeric characters</p>';
                }
                if ($errorMsg == 3) {
                    echo'<p class="login_error_msg">Wrong username or password</p>';
                }
                if ($errorMsg == 4) {
                    echo'<p class="login_error_msg">Log In </p>';
                }
            }
            ?>

        </div>


    </body>
</html>
