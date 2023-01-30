<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery.min.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="../lib/css/datepicker.css">
  <link rel="stylesheet" href="../lib/css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>몸무게 기록</title>
</head>

<body>

<?php
  include '../lib/include/top.php';
  $date = date("Y/m/d");
?>

<div id="diary_wrap" class="wrap">
  <div id="weight_bar" class="bar">
  <button class="menu_btn" id="menu_btn" onclick="showLeftMenu(); return false;">
    <img src="../lib/img/menu.png" class="menu_img">
  </button>
  <span class="title">몸무게 기록</span>
  
  <?php
    include '../lib/include/menu.php';
  ?>
  
  <div class="date"><?=$date?></div>
  </div>

  <div class="diary">
    <div>
      <form action="../weight/new_weight_process.php" method="POST" class="form">
        <input type="hidden" name="date" value="<?=$date?>">
        <input type="text" id="weight" name="weight" pattern="^[0-9]*"> kg 
        <input type="image" class="w_new" src="../lib/img/new.png"/>
      </form>
    
      <form action="../weight/weight.php" method="GET" id="search">
    
      <?php
        $year = date('Y');
        $select_year = '<select id="year" name="year" class="select">';
          
        for($i = $year; $i > $year-5; $i--) {
          $selected = ''; 
          
          if($i == $_GET['year']) {
            $selected = " selected"; 
          }
          
          $select_year .= '<option value="'.$i.'"'.$selected.'>'.$i.'년</option>';
        } 
        
        $select_year .= '</select>';
        echo $select_year;

        $select_month = '<select id="month" name="month" class="select">';
          
        for($i = 1; $i <= 12; $i++) {
          $selected = ''; 
        
          if($i == $_GET['month']) {
            $selected = " selected"; 
          }
        
          $select_month .= '<option value="'.sprintf('%02d',$i).'"'.$selected.'>'.$i.'월</option>';
        } 
        
        $select_month .= '</select>';
        echo $select_month;
        ?>
  
        <input type="submit" value="검색" class="form_btn" id="search_btn">
      </form>
  
      <table class="w_table" bgcolor="#d6cbfc">
      
      <?php
  
        include '../lib/include/sql_conn.php';
        
        $pk = $_SESSION['pk'];
        $year_month = $_GET['year'].'-'.$_GET['month'];
  
        $sql = "SELECT * FROM w_diary where date like '$year_month%' and pk = '$pk' order by date desc";
        $result = mysqli_query($conn, $sql);
        $row_num = mysqli_num_rows($result);

        if ($row_num == 0) {
      ?>
      
        <div class="guide" id="w_guide">저장된 몸무게가 없습니다😂</div>
    
      <?php
        } else {

          while($array = mysqli_fetch_array($result)) {
      ?>

        <tr>
          <td><?=str_replace("-", "/", $array['date']);?></td>
          <td><?=$array['weight']?>kg</td>
          <td><form action="../weight/del_weight_process.php" method="post">
            <input type="hidden" name="id" value="<?=$array['id']?>">
            <input type="hidden" name="year" value="<?=$_GET['year']?>">
            <input type="hidden" name="month" value="<?=$_GET['month']?>">
            <input type="submit" value="삭제" class="del">
            </form>
          </td>
        </tr>
        
        <?php 
          } 
        }
        ?>

      </table>
    </div>
  </div>

<script type="text/javascript" src="../lib/js/logout.js"></script>
<script type="text/javascript" src="../lib/js/menu.js"></script>

</body>
</html>