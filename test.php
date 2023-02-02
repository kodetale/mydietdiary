<?php
echo '파일명<br>';
echo basename(__FILE__).'<br><br>';

echo '상대경로/파일명<br>';
echo $_SERVER['PHP_SELF'].'<br><br>';

echo '절대경로/파일명<br>';
echo __FILE__.'<br>';

echo realpath(__FILE__).'<br><br>';

echo '절대경로<br>';
echo dirname(__FILE__).'<br>';

$path_parts = pathinfo(__FILE__);
echo $path_parts['dirname'].'<br><br>';

$basename = '/'.basename(__FILE__).'/';
$realpath = realpath(__FILE__);

echo '절대경로<br>';
echo preg_replace($basename, '', $realpath).'<br><br>';

echo '상대경로<br>';
echo preg_replace($basename, '', $_SERVER['PHP_SELF']);
?>