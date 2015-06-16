<?php
include_once('./common.php');

$start = get_time();

$pid = $_GET[pid];
$page = $_GET[page];

$sql = " select SQL_NO_CACHE * from 6a_post where pid = '$pid' ";
$view = sql_fetch($sql);

$sql = " select * from 6a_post where bid < '$view[bid]' order by bid desc limit 1 ";
$prev = sql_fetch($sql);

$sql = " select * from 6a_post where bid > '$view[bid]' order by bid asc limit 1 ";
$next = sql_fetch($sql);

if ($prev[pid]) 
    echo "<a href='./view.php?pid=$prev[pid]'>이전</a> &nbsp;";

echo "<a href='./list.php?page=$page'>목록</a> &nbsp;";

if ($next[pid]) 
    echo "<a href='./view.php?pid=$next[pid]'>다음</a>";

echo "<br><br>";
echo "<b>$view[title]</b><br>";
echo $view[content]."<br>";

echo "<br><br>";
echo get_time() - $start;