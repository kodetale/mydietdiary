<?php
  include './lib/include/sql_conn.php';
	
	$hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

	$sql = "
    INSERT INTO user
    (id, password, name)
    VALUES('{$_POST['id']}', '{$hashedPassword}', '{$_POST['name']}')";
  
  $result = mysqli_query($conn, $sql);

  if($result === false) {
?>

<script>
  alert("회원가입에 실패했습니다. 다시 확인해주세요.");
  window.history.back();
</script>

<?php
  } else {
?>

<script>
  alert("회원가입이 완료되었습니다.");
  location.href = "index.php";
</script>

<?php 
  }
?>