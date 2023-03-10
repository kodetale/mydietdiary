<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <?php include '../lib/include/head.php' ?>
  <title>식단 일기</title>
</head>

<body>

<?php
  include '../lib/include/top.php';
  include '../lib/include/modal.php';
  $date = $_GET['date'];
?>

<div id="diary_wrap" class="wrap">
  <div id="diet_bar" class="bar">
    <button class="menu_btn" id="menu_btn" onclick="location.href='../diet/diet.php?date=<?=$date?>'">
      <img src="../lib/img/back.png" class="back_img">
    </button>
    <div class="date"><?=$date?></div> <input type="image" class="plus_btn" src="../lib/img/plus.png" onclick="add_textbox()">
  </div>

  <div class="diary">
    <form action="../diet/new_diet_process.php" method="POST" id="new_form" class="form">
      <div id="box">
        <div class="time">시간 <input type="text" name="time" pattern="\d{1,2}(:\d{2})?" placeholder="00:00" required></div>
        <input type="text" name="food[]" id="text" required> <input type="text" name="kcal[]" id="num" pattern="^[0-9]*" required> kcal
        <input type="hidden" name="date" value="<?=$_GET['date'];?>">
      </div>
      <input type="submit" class="form_btn" value="저장">
    </form>
  </div>
</div>

<script type="text/javascript" src="../lib/js/logout.js"></script>
<script type="text/javascript" src="../lib/js/alert.js"></script>
<script>
const add_textbox = () => {
  const box = document.getElementById("box");
  const newP = document.createElement('p');
  newP.innerHTML = "<input type='text' name=food[] id='text' required> <input type='text' name=kcal[] id='num' pattern='^[0-9]*' required> kcal <input type='button' class='minus_btn' onclick='remove(this)'>";
  box.appendChild(newP);
}
        
const remove = (obj) => {
  document.getElementById('box').removeChild(obj.parentNode);
}
</script>
</body>

</html>