<?php

session_start();
include './db.php';
if (isset($_SESSION['user'])) {
    $_SESSION['user']['username'];
    header('location: topics.php');
} else {
    header('location: login.php');
}
    
  
  
        