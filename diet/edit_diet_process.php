<?php
  session_start();
  
  include '../lib/include/sql_conn.php';

  if(!isset($_REQUEST['food'])) {
    $pk = $_SESSION['pk'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $sql = "DELETE FROM d_diary WHERE pk = '$pk' AND date = '$date' AND time = '$time'";
    mysqli_query($conn, $sql);

  } else {
    $pk = $_SESSION['pk'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $food_list = $_REQUEST['food'];
    $kcal_list = $_REQUEST['kcal'];
  
    $sql = "DELETE FROM d_diary WHERE pk = '$pk' AND date = '$date' AND time = '$time'";
    mysqli_query($conn, $sql);
    
    for($i=0; $i < sizeof($food_list); $i++) {
      $filtered_food = mysqli_real_escape_string($conn, $food_list[$i]);
      $sql2 = "INSERT INTO d_diary (pk, date, time, food, kcal) VALUES ('$pk', '$date', '$time', '$filtered_food', '$kcal_list[$i]')";
      mysqli_query($conn, $sql2);
    }
  }
?>

<html>
  <form action="../diet/diet.php" method="GET" name="form">
    <input type="hidden" name="date" value="<?=$date?>">
  </form>
  
  <script>
    document.form.submit();
  </script>
</html>