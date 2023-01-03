<?php

  session_start();

  include '../lib/include/sql_conn.php';

  $pk = $_SESSION['pk']; 
  $date = $_POST['date'];
  $weight = $_POST['weight']; 
  
  $sql = "INSERT INTO w_diary (pk, date, weight) VALUES ('$pk', '$date', '$weight')";
  mysqli_query($conn, $sql);
?>

<html>
  <form action="../weight/weight.php" method="GET" name="form">
    <input type="hidden" name="year" value="<?=date('Y')?>">
    <input type="hidden" name="month" value="<?=date('m')?>">
  </form>
  
  <script>
    document.form.submit();
  </script>
</html>
