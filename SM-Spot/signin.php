<?php

include 'db.php';

session_start(); //세션시작


//index.php에서 보낸 id랑 pw 변수에저장
$id = $_POST[user_id];

$pw = $_POST[user_pw]; //md5안한상태


//user테이블에서 입력받은 아이디,비번이 일치하는 데이터 검색
$sql = "SELECT * FROM user WHERE user_id = '{$id}' and user_pw = md5('{$pw}')";
// $sql = "SELECT * FROM user WHERE user_id = '{$id}' and user_pw = md5('{$pw}')";

$resource = mysql_query( $sql ); //계정정보

$num = mysql_num_rows( $resource ); // num_rows 없으면 인증 실패



$row = mysql_fetch_row( $resource );


if( $num > 0 ) {

  // 인증에 성공한 경우

  // 중복 체크

  $sql = "SELECT * FROM session WHERE user_id = '{$id}'";

  $resource = mysql_query( $sql );

  $num = mysql_num_rows( $resource );

  if( $num > 0 ) {

    // 이미 로그인한 사용자인 경우

    echo "<script> alert('해당 아이디는 이미 로그인한 상태입니다'); </script>";



  } else {

    // 아직 로그인하지 않은 경우

    // 1. 세션 테이블에 사용자 정보를 입력(insert)

    $sess_id = session_id();

    $sql = "INSERT INTO session VALUE( $row[no], '$id', '$sess_id' )";

    $ret = mysql_query( $sql );



    // 2. 세션 변수에 아이디 추가

    $_SESSION[user_id] = $id;

    $_SESSION[is_login] = 1;



    // 3. 로그인 환영 메시지 출력

    echo "<script> alert('로그인 되었습니다'); </script>";
	 echo "<meta http-equiv='refresh' content=\"0;url=http://localhost/index.php\">";


  }



} else {

  // 인증에 실패한 경우

  echo "<script> alert('아이디 또는 패스워드가 올바르지 않습니다!'); </script>";
  echo "<script> window.history.back(); </script>";


}



?>



<!--<meta http-equiv='refresh' content="0;url='http://localhost/index.php'">-->