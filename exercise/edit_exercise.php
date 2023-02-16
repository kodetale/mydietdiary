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
  include '../lib/include/sql_conn.php';
  include '../lib/include/modal.php';
  
  $pk = $_SESSION["pk"];
  $date = $_POST['date'];
  $time = $_POST['time'];
  
  $sql = "SELECT * FROM e_diary where pk = '$pk' AND date = '$date' AND time = '$time'";
  $result = mysqli_query($conn, $sql);
?>

<div id="diary_wrap" class="wrap">
  <div id="exercise_bar" class="bar">
    <button class="menu_btn" id="menu_btn" onclick="location.href='../exercise/exercise.php?date=<?=$date?>'">
      <img src="../lib/img/back.png" class="back_img">
    </button>
    <div class="date"><?=$date?> <?=$time?></div>
    <input type="image" class="edit_plus_btn" src="../lib/img/plus.png" onclick="add_textbox()">
  </div>

  <div class="diary">
    <form action="../exercise/edit_exercise_process.php" method="post" name="editform" id="edit_form" class="form" onsubmit="return edit_check()">
      <div id="box">
      
      <?php
        while($array = mysqli_fetch_array($result)) {
      ?>
    
      <p><input type="text" name="exercise[]" id="text" value="<?=$array['exercise']?>" required> <input type="text" name="num[]" id="num" pattern="^[0-9]*" value="<?=$array['num']?>" required> 
      <select name='unit[]' class="select">
        <option value="분" <?php if ($array['unit'] == '분') { echo("selected");}?>>분</option>
        <option value="개" <?php if ($array['unit'] == '개') { echo("selected");}?>>개</option>
      </select> 
      <input type="button" class="e_minus_btn" onclick="remove(this)">
    
      <?php
        }
      ?>
      
      </div>
      <input type="hidden" name="date" value="<?=$date?>">
      <input type="hidden" name="time" value="<?=$time?>">
      <input type="submit" value="수정" class="form_btn">
      <button type="button" class="form_btn" onclick="history.back()">취소</button>
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