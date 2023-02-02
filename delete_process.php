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

  $sql = "delete from user where pk = '$pk'";
  
  mysqli_query($conn, $sql);
?>

<script>
    $(".modal_close").on("click", function () {
      location.href = "logout_process.php";
    });
    action_popup.alert("탈퇴가 완료되었습니다.");
  </script>
</html>