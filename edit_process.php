<?php
  session_start();
  
  include './lib/include/sql_conn.php';
  
  $pk = $_SESSION["pk"];
  $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $name = $_POST["name"];

  if(!$_POST['password']) {
    $sql = "UPDATE user SET NAME='$name' WHERE pk = '$pk'";
  } else {
    $sql = "UPDATE user SET password='$hashedPassword', name='$name' WHERE pk ='$pk'";
  }
  
  mysqli_query($conn, $sql);
?>

<script>
  alert("정보가 수정되었습니다.")
  history.go(-2);
</script>
