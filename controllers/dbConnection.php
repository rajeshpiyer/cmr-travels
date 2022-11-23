<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "cmr_travels";

// $host = "us-cdbr-east-05.cleardb.net";
// $user = "bbc58fac6988d1";
// $password = "2c400fb5";
// $db = "heroku_14e0687b625463f";

$con = mysqli_connect($host, $user, $password, $db);

// Check connection
if ($con->connect_error) {
    echo "<script type='text/javascript'>alert('Database Connection error');</script>";
}
