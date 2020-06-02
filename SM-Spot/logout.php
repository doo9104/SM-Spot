<?php

include 'db.php';

session_start();



$user_id = $_SESSION[user_id];



$sql = "DELETE FROM session WHERE user_id = '{$user_id}'";

$ret = mysql_query( $sql );



setcookie( session_name(), '', time()-99999999 );

session_destroy();

echo "<script> alert('로그아웃 되었습니다.'); </script>";

?>

<meta http-equiv='refresh' content="0; url='http://localhost/index.php'">