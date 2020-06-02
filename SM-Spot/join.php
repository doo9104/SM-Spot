<?php
$division = $_POST[division];

$user_id = $_POST[user_id];

$user_pw = $_POST[user_pw];

$email = $_POST[email];


if( $user_id != '' && $user_pw != '' && $email != '' ) {



  $db = mysql_connect( 'localhost', 'root', 'apmsetup' );
  if( !$db ) {

   die( 'MYSQL connect ERROR: ' . mysql_error());

  }
  mysql_query('set names utf8');


  $ret = mysql_select_db( 'bbs', $db );

  if( !$ret ) {

   die( 'MYSQL select ERROR: ' . mysql_error());

  }



  // 아이디 중복체크

  $sql = "SELECT * FROM user WHERE user_id='{$user_id}'";

  $resource = mysql_query( $sql );

  $num = mysql_num_rows( $resource );



  if( $num > 0 ) {

    echo "<script> alert('이미 사용중인 아이디입니다.'); </script>";

    echo "<script> window.history.back(); </script>";

    exit(0);

  }



 $sql = "INSERT INTO user( division, user_id, user_pw, email ) VALUE( '{$division}','{$user_id}',

         md5('{$user_pw}'), '{$email}' )";

		 //  $sql = "INSERT INTO user( division, user_id, user_pw, email ) VALUE( '{$division}','{$user_id}',

         //md5('{$user_pw}'), '{$email}' )";
  $ret = mysql_query( $sql );

  if( $ret ) {

    echo "<script> alert('회원가입이 정상적으로 처리되었습니다'); </script>";

    echo "<meta http-equiv='refresh' content=\"0;url=http://localhost/index.php\">";

    exit(0);

  }else {

    die( 'MYSQL query ERROR: ' . mysql_error());

  }



}else {

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>회원가입</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="_include/css/fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="_include/css/Join_style.css">
</head>
<body>

    <div class="main">

        <h1>Sign up</h1>
        <div class="container">
            <div class="sign-up-content">
                <form method="POST" class="signup-form">
                    <h2 class="form-title">환영합니다!</h2>
                    <div class="form-radio">
                        <input type="radio" name="division" value="student" id="student" checked="checked" />
                        <label for="student">세명대 학생</label>

                        <input type="radio" name="division" value="normal" id="normal" />
                        <label for="normal">일반인</label>


                    </div>

                    <div class="form-textbox">
                        <label for="name">아이디</label>
                        <input type="text" name="user_id" id="name" />
                    </div>

                    <div class="form-textbox">
                        <label for="email">이메일</label>
                        <input type="email" name="email" id="email" />
                    </div>

                    <div class="form-textbox">
                        <label for="pass">비밀번호</label>
                        <input type="password" name="user_pw" id="pass" />
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                        <label for="agree-term" class="label-agree-term"><span><span></span></span><a href="#" class="term-service">이용약관</a>에 동의합니다.</label>
                    </div>

                    <div class="form-textbox">
                        <input type="submit" name="submit" id="submit" class="submit" value="회원가입" />
                        <p></p>
                        <input type="button" name="submit"  class="submit" onclick="location.href='index.php'" value="돌아가기" />
                    </div>
                </form>

                <p class="loginhere">
                    이미 계정이 있으신가요?<a href="login.html" class="loginhere-link"> 로그인</a>
                </p>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="_include/vendor/jquery/jquery.min.js"></script>
    <script src="_include/js/Join_main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>

<?php

}

?>