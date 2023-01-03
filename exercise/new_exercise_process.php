<?php
  include '../lib/include/sql_conn.php';

  $pk = $_POST['pk']; 
  $date = $_POST['date'];
  $time = $_POST['time']; 
  $exercise_list = $_REQUEST['exercise'];
  $num_list = $_REQUEST['num'];
  $unit_list = $_REQUEST['unit'];

  for($i=0; $i < sizeof($exercise_list); $i++) {
    $filtered_exercise = mysqli_real_escape_string($conn, $exercise_list[$i]);

    $sql = "INSERT INTO e_diary (pk, date, time, exercise, num, unit) VALUES ('$pk', '$date', '$time', '$filtered_exercise', '$num_list[$i]', '$unit_list[$i]')";
    mysqli_query($conn, $sql);
  }
?>

<html>
  <form action="../exercise/exercise.php" method="GET" name="form">
    <input type="hidden" name="date" value="<?=$date?>">
  </form>
  
  <script>
    document.form.submit();
  </script>
</html>
