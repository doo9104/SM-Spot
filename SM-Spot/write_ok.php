<?php

include 'db.php';

session_start();



$title = $_POST[title];

$body = $_POST[body];

$user_id = $_SESSION[user_id];

$date = date("Y-m-d G:i:s");



$sql = "INSERT INTO board( title, body, writer, time ) VALUE ( '{$title}', '{$body}', '{$user_id}', '{$date}' )";

$ret = mysql_query( $sql );



?>

<meta http-equiv='refresh' content="0;url='http://localhost/index.php'">