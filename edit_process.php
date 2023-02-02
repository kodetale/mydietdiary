<html>
  <head>
    <link rel="stylesheet" href="./lib/css/modal.css">
    <script src="//code.jquery.com/jquery.min.js"></script>
  </head>

  <body>

    <?php 
      include './lib/include/modal.php';
    ?>

  </body>

  <script src="./lib/js/alert.js"></script>

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

  $_SESSION['name'] = $name;
?>

<script>
    $(".modal_close").on("click", function () {
      history.go(-2);
    });
    action_popup.alert("정보가 수정되었습니다.");
  </script>
</html>

