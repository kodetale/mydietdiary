<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <?php include '../lib/include/head.php' ?>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="../lib/css/datepicker.css">
  <title>식단 일기</title>
</head>
<body>

<?php
  include '../lib/include/top.php';
  include '../lib/include/modal.php';
  $date = $_GET['date']
?>

<div id="diary_wrap" class="wrap">
  <div id="diet_bar" class="bar">
    <button class="menu_btn" id="menu_btn" onclick="showLeftMenu(); return false;">
      <img src="../lib/img/menu.png" class="menu_img">
    </button>
    <span class="title">식단 일기</span>

    <?php
      include '../lib/include/menu.php';
    ?>

    <form action="../diet/diet.php" id="diet_form" method="GET">
      <input type="text" id="datepicker" name="date" value="<?=$date?>">
      <input type="submit" class="new" value="" onclick="javascript: form.action='../diet/new_diet.php';" />
    </form>
  </div>
  <div class="diary">
    <div>
    <?php
    include '../lib/include/sql_conn.php';
    
    $pk = $_SESSION['pk'];
    $sql = "SELECT date_format(time, '%H:%i') FROM d_diary WHERE date = '$date' AND pk = '$pk' GROUP BY time";
    $result = mysqli_query($conn, $sql);
    $row_num = mysqli_num_rows($result);
  
    if ($row_num == 0) {
    ?>
    
    <div class="guide">저장된 일기가 없습니다😂</div>
  
    <?php
    } else {
  
    while($array = mysqli_fetch_array($result)) {
      $time = $array['date_format(time, \'%H:%i\')'];
      $sql2 = "SELECT * FROM d_diary WHERE date = '$date' AND time = '$time' AND pk = '$pk'";
      $result2 = mysqli_query($conn, $sql2);
      $kcal = 0;
    ?>
    
    <div id="diet_block" class="block"> 
      <?=$time?>
      <form action=../diet/edit_diet.php method="post">
        <input type="hidden" name="date" value="<?=$date?>">
        <input type="hidden" name="time" value="<?=$time?>">
        <input type="image" class="diary_btn" src="../lib/img/edit.png">
        <input type="image" class="diary_btn" src="../lib/img/cancel.png" onclick="javascript: form.action='../diet/edit_diet_process.php';"/>
      </form>
  
      <?php
        while($array2 = mysqli_fetch_array($result2)) {
          $kcal += $array2['kcal'];
      ?>
  
      <div><?=$array2['food']?> <?=$array2['kcal']?>kcal</div>
  
      <?php
        }
      ?>

      <div class="total">총 <?=$kcal?>kcal</div>
    </div>
    
  <?php
    }
  }
  ?>

    </div>
  </div>
</div>

<script type="text/javascript" src="../lib/js/logout.js"></script>
<script type="text/javascript" src="../lib/js/menu.js"></script>
<script type="text/javascript" src="../lib/js/alert.js"></script>
<script type="text/javascript">
$(function () {
  $("#datepicker").datepicker({
    dateFormat:"yy/mm/dd",
    dayNamesMin:["일","월","화","수","목","금","토"],
    monthNames:["1월","2월","3월","4월","5월","6월","7월","8월","9월","10월","11월","12월"],
    maxDate: "+0D",
    showMonthAfterYear: true,
    yearSuffix: '년',
    showButtonPanel: true,
    nextText: "다음달",
    prevText: "이전달",
    currentText: "오늘",
    closeText: "닫기",

    onSelect:function(d){
      document.getElementById('diet_form').submit();
    }
  });
});
</script>
</body>

</html>