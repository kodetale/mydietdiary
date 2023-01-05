<?php
  session_start();
  
  include './lib/include/sql_conn.php';
  
  $pk = $_SESSION["pk"];

  $sql = "delete from user where pk = '$pk'";
  
  mysqli_query($conn, $sql);
?>

<script>
  alert("탈퇴가 완료되었습니다.")
  location.href = "logout_process.php";
</script>