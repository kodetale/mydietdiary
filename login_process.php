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
    include './lib/include/sql_conn.php';

    $id = $_POST['id'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE id ='{$id}'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
  
    if(isset($row)) {
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
      $(".modal_close").on("click", function () {
        location.href = "index.php";
      });
      action_popup.alert("아이디와 비밀번호를 다시 확인해주세요.");
    </script>

    <?php
        }
      } else { 
    ?>

    <script>
      $(".modal_close").on("click", function () {
        location.href = "index.php";
      });
      action_popup.alert("아이디와 비밀번호를 다시 확인해주세요.");
    </script>

    <?php
      }
    ?>
</html>