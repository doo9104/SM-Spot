<?php

$db = mysql_connect( 'localhost', 'root', 'apmsetup' );

if( !$db ) {

  die( 'MYSQL connect ERROR: ' . mysql_error());

}



$ret = mysql_select_db( 'bbs', $db );

if( !$ret ) {

  die( 'MYSQL select ERROR: ' . mysql_error());

}

?>