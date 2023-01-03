<?php
  include './lib/include/sql_conn.php';

  $id = $_GET['id'];
  $sql = "select pk from user where id='$id'";
  $result = mysqli_query($conn, $sql);
  $data = mysqli_fetch_array($result);

  echo isset($data['pk']) ? "X" : "O";
?>