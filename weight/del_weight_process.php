<?php 
include "../lib/include/sql_conn.php";

$id = $_POST['id'];

$sql = "DELETE FROM w_diary WHERE id = '$id'";
mysqli_query($conn, $sql);
?>

<html>
  <form action="../weight/weight.php" method="GET" name="form">
    <input type="hidden" name="year" value="<?=$_POST['year']?>">
    <input type="hidden" name="month" value="<?=$_POST['month']?>">
  </form>
  
  <script>
    document.form.submit();
  </script>
</html>