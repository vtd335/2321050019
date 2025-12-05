<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "quanlyweb";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if (isset($_SESSION['username'])) {
    echo "Xin chào " . $_SESSION['username'];
}

?>