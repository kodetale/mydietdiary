<?php
  session_start();

  include '../lib/include/sql_conn.php';

  $pk = $_SESSION['pk']; 
  $date = $_POST['date'];
  $time = $_POST['time']; 
  $food_list = $_REQUEST['food'];
  $kcal_list = $_REQUEST['kcal'];

  for($i=0; $i < sizeof($food_list); $i++) {
    $filtered_food = mysqli_real_escape_string($conn, $food_list[$i]);
    
    $sql = "INSERT INTO d_diary (pk, date, time, food, kcal) VALUES ('$pk', '$date', '$time', '$filtered_food', '$kcal_list[$i]')";
    mysqli_query($conn, $sql);
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
