<?php
  include './lib/include/sql_conn.php';

  $id = $_POST['id'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM user WHERE id ='{$id}'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  
	$hashedPassword = $row['password'];
  $passwordResult = password_verify($password, $hashedPassword);

  if ($passwordResult === true) {
    session_start();
    $_SESSION['pk'] = $row['pk'];
    $_SESSION['name'] = $row['name'];
?>

<script>
	location.href = "./diet/diet.php?date=<?=date("Y/m/d");?>";
</script>

<?php
	} else {
?>

<script>
	alert("아이디 또는 비밀번호를 확인해주세요.");
	location.href = "index.php";
</script>

<?php
	}
?>