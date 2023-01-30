<?php
  session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../lib/css/style.css">
  <title>식단 일기</title>
</head>

<body>

<?php
  include '../lib/include/top.php';
  include '../lib/include/sql_conn.php';
  
  $pk = $_SESSION["pk"];
  $date = $_POST['date'];
  $time = $_POST['time'];
  
  $sql = "SELECT * FROM d_diary where pk = '$pk' AND date = '$date' AND time = '$time'";
  $result = mysqli_query($conn, $sql);
?>

<div id="diary_wrap" class="wrap">
  <div id="diet_bar" class="bar">
    <button class="menu_btn" id="menu_btn" onclick="location.href='../diet/diet.php?date=<?=$date?>'">
      <img src="../lib/img/back.png" class="back_img">
    </button>
    <div class="date"><?=$date?> <?=$time?></div>
    <input type="image" class="edit_plus_btn" src="../lib/img/plus.png" onclick="add_textbox()">
  </div>
  
  <div class="diary">
    <form action="../diet/edit_diet_process.php" method="post" name="editform" id="edit_form" class="form" onsubmit="return edit_check()">
      <div id="box">
      <?php
        while($array = mysqli_fetch_array($result)) {
      ?>
      
        <p><input type="text" name="food[]" id="text" value="<?=$array['food']?>" required> <input type="text" name="kcal[]" id="num" pattern="^[0-9]*" value="<?=$array['kcal']?>" required> kcal <input type='image' src='../lib/img/minus.png' class='minus_btn' onclick='remove(this)'></p>
    
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
<script>
const add_textbox = () => {
  const box = document.getElementById("box");
  const newP = document.createElement('p');
  newP.innerHTML = "<input type='text' name=food[] id='text' required> <input type='text' name=kcal[] id='num' pattern='^[0-9]*' required> kcal <input type='image' src='../lib/img/minus.png' class='minus_btn' onclick='remove(this)'>";
  box.appendChild(newP);
}

const remove = (obj) => {
  document.getElementById('box').removeChild(obj.parentNode);
}
</script>
</body>

</html>