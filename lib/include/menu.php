<div class="hideMenuBody" id="hideMenuBodyId">
  <div onclick="closeLeftMenu(); return false;" style="text-align:right;"><span style="margin-right:25px;">X</span></div>
  <div class="menu" onclick="location.href='../diet/diet.php?date=<?=date("Y/m/d");?>'">식단 일기</div>
  <div class="menu" onclick="location.href='../exercise/exercise.php?date=<?=date("Y/m/d");?>'">운동 일기</div>
  <div class="menu" onclick="location.href='../weight/weight.php?year=<?=date("Y");?>&month=<?=date("m");?>'">몸무게 기록</div>
</div>