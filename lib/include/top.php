<div class="top">
  <span class="logout">

<?php
  if (isset($_SESSION['pk'])) {
    echo "{$_SESSION['name']}님 환영합니다😊";
?>

    <span onclick="location.href='../edit.php'">정보수정</span>
    <span onclick="logout()">로그아웃</span>
  
<?php
  }
?>

  </span>
</div>