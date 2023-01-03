<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./lib/css/style.css">
</head>

<body>
<div id="index_wrap" class="wrap">
  <div class="form_wrap">
    <img src="./lib/img/logo.png" width="260px" height="160px">
    <form action="join_process.php" method="post" name="joinform" id="member_form" class="form" onsubmit="return sendit()">
      <label for="id" class="join_label">아이디</label>
      <div>
        <input type="text" name="id" id="id"><input type="button" id="checkIdBtn" value="중복체크" onclick="checkId()">
        <p id="result">&nbsp;</p>
      </div>
      <label for="password" class="join_label">비밀번호</label>
      <div>
        <input type="password" name="password" id="password">
      </div>
      <label for="password_ch" class="join_label">비밀번호 확인</label>
      <div>
        <input type="password" name="password_ch" id="password_ch">
      </div>
      <label for="name" class="join_label">이름</label>
      <div>
        <input type="text" name="name" id="name">
      </div>
      <input type="submit" value="회원가입" class="form_btn">
    </form>
  </div>
</div>
  
<script src="./lib/js/join.js"></script>
</body>

</html>