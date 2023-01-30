<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./lib/css/style.css">
  <title>My Diet Diary</title>
</head>

<body>
<div id="index_wrap" class="wrap">
  <div class="index">
    <img class="logo" src="./lib/img/logo.png" width="350px" height="215px">
    
    <?php 
      if(!isset($_SESSION['pk'])) {
    ?>

    <form action="login_process.php" method="post" id="login_form" class="form">
      <div><input type="text" name="id" id="id" placeholder="아이디"></div>
      <div><input type="password" name="password" id="password" placeholder="비밀번호"></div>
      <div><input type="submit" value="로그인" class="form_btn"></div>
    </form>
    <div class="join_btn"><a href="join.php">회원가입</a></div> 

    <?php 
      } else {
    ?>

    <form action="diet/diet.php" method="GET" id="login_form" class="form">
      <div><input type="hidden" name="date" value="<?=date("Y/m/d");?>"></div>
      <div><input type="submit" value="ENTER" class="form_btn"></div>
    </form>
    <div class="join_btn"><span onclick="logout()">로그아웃</span></div>
    
    <?php 
      }
    ?>
  </div>
</div>

<script type="text/javascript">
  function logout() {
  const data = confirm("로그아웃 하시겠습니까?");
    if (data) {
      location.href = "./logout_process.php";
    }
  }
</script>

</body>

</html>