<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <?php include '../lib/include/head.php' ?>
  <title>운동 일기</title>
</head>

<body>

<?php
  include '../lib/include/top.php';
  include '../lib/include/modal.php';
  $date = $_GET['date'];
?>

<div id="diary_wrap" class="wrap">
  <div id="exercise_bar" class="bar">
    <button class="menu_btn" id="menu_btn" onclick="location.href='../exercise/exercise.php?date=<?=$date?>'">
      <img src="../lib/img/back.png" class="back_img">
    </button>
    <div class="date"><?=$date?></div> <input type="image" class="plus_btn" src="../lib/img/plus.png" onclick="add_textbox()">
  </div>

  <div class="diary">
    <form action="../exercise/new_exercise_process.php" method="POST" class="form">
      <div id="box">
        <input type="hidden" name="pk" value="<?=$_SESSION['pk']?>">
        <div class="time" id="e_time">시간 <input type="text" name="time" pattern="\d{1,2}(:\d{2})?" placeholder="00:00" required></div>
        <input type="text" name="exercise[]" id="text" required> <input type="text" name="num[]" id="num" pattern="^[0-9]*" required>
        <select name="unit[]" class="select">
          <option>분</option>
          <option>개</option>
        </select> 
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
  newP.innerHTML = "<input type='text' name=exercise[] id='text' required> <input type='text' name=num[] id='num' pattern='^[0-9]*' required> <select name='unit[]' class='select'><option>분</option> <option>개</option></select> <input type='button' class='e_minus_btn' onclick='remove(this)'>";
  box.appendChild(newP);
}
        
const remove = (obj) => {
  document.getElementById('box').removeChild(obj.parentNode);
}
</script>
</body>

</html>