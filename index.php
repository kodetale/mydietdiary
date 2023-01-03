<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./lib/css/style.css">
</head>

<body>
<div id="index_wrap" class="wrap">
  <div class="index">
    <img class="logo" src="./lib/img/logo.png" width="350px" height="215px">
      <form action="login_process.php" method="post" id="login_form" class="form">
        <div><input type="text" name="id" id="id" placeholder="아이디"></div>
        <div><input type="password" name="password" id="password" placeholder="비밀번호"></div>
        <div><input type="submit" value="로그인" class="form_btn"></div>
      </form>
    <div class="join_btn"><a href="join.php">회원가입</a></div> 
  </div>
</div>
</body>

</html>