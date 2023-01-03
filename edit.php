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

<?php
  include './lib/include/sql_conn.php';
  
  $pk = $_SESSION["pk"];
  $sql = "select * from user where pk = '{$pk}'";
  $result = mysqli_query($conn, $sql);
  $array = mysqli_fetch_array($result);
?>

<div id="index_wrap" class="wrap">
  <div class="form_wrap">
    <img src="./lib/img/logo.png" class="logo" width="260px" height="160px">
    <form action="edit_process.php" method="post" name="editform" id="member_form" class="form" onsubmit="return edit_check()">
      <label for="id" class="join_label">아이디</label>
      <div style="margin-bottom: 20px;">
        <?=$array['id']?>
      </div>
      <label for="password" class="join_label">비밀번호</label>
      <div>
        <input type="password" name="password" id="password">
        <span class="err_password"></span>
      </div>
      <label for="password_ch" class="join_label">비밀번호 확인</label>
      <div>
        <input type="password" name="password_ch" id="password_ch">
        <span class="err_password_ch"></span>
      </div>
      <label for="name" class="join_label">이름</label>
      <div>
        <input type="text" name="name" id="name" value="<?=$array['name']?>">
        <span class="err_name"></span>
      </div>
      <input type="submit" value="수정" class="form_btn">
      <button type="button" class="form_btn"onclick="history.back()">취소</button>
    </form>
  </div>
</div>

<script src="./lib/js/edit.js"></script>
</body>

</html>