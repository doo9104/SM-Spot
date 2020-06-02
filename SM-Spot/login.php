<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>로그인</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="_include/css/fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="_include/css/Join_style.css">
</head>
<body>
   
    <div class="main">
        <h1>LogIn</h1>
        <div class="container">
            <div class="sign-up-content">
                <form method="POST" class="signup-form" action="signin.php">
                    <h2 class="form-title">로그인</h2>

                    <div class="form-textbox">
                        <label for="name">아이디</label>
                        <input type="text" name="user_id" class="form-control" />
                    </div>


                    <div class="form-textbox">
                        <label for="pass">비밀번호</label>
                        <input type="password" name="user_pw" class="form-control" />
                    </div>
                    <br>

                    <div class="form-textbox">
                        <input type="submit" name="submit" id="submit" class="submit" value="로그인" />
                        <p></p>
                        <input type="button" name="submit"  class="submit" onclick="location.href='index.php'" value="돌아가기" />
                    </div>
                </form>
                
                <p class="loginhere">
                    계정이 없으신가요?<a href="Join.html" class="loginhere-link"> 회원가입</a>
                </p>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="_include/vendor/jquery/jquery.min.js"></script>
    <script src="_include/js/Join_main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>