<?php
  session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <?php include './lib/include/head.php' ?>
  <title>My Diet Diary</title>
</head>

<body>

<?php
  include './lib/include/sql_conn.php';
  include './lib/include/modal.php';
  
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
        <div id="err" class="err_password"></div>
      </div>
      <label for="password_ch" class="join_label">비밀번호 확인</label>
      <div>
        <input type="password" name="password_ch" id="password_ch">
        <div id="err" class="err_password_ch"></div>
      </div>
      <label for="name" class="join_label">이름</label>
      <div>
        <input type="text" name="name" id="name" value="<?=$array['name']?>">
        <div id="err" class="err_name"></div>
      </div>
      <input type="submit" value="수정" class="form_btn">
      <button type="button" class="form_btn"onclick="history.back()">취소</button>
      <div class="delete" onclick="del_confirm()">회원탈퇴</div>
    </form>
  </div>
</div>

<script src="./lib/js/edit.js"></script>
<script src="./lib/js/alert.js"></script>
<script>
  function del_confirm() {
    action_popup.confirm("정말 탈퇴하시겠습니까?", function (res) {
      if (res) {
        location.href = "delete_process.php";
      }
    })
  }
</script>
</body>

</html>