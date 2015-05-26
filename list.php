<?php
include_once('./common.php');

$start = get_time();

$page = $_GET[page];

if (!$page) $page = 1;
$page_rows = 15;

$sql = " select SQL_NO_CACHE count(*) as cnt from 6a_post ";
$row = sql_fetch($sql);
$total_count = $row[cnt];

$total_page  = ceil($total_count / $page_rows);  // 전체 페이지 계산
$from_record = ($page - 1) * $page_rows; // 시작 열을 구함

$sql = " select SQL_NO_CACHE * from 6a_post order by bid asc limit $from_record, $page_rows ";
$result = sql_query($sql);
$k=0;
for ($i=0; $row=sql_fetch_array($result); $i++) {

    $num = $total_count - ($page - 1) * $page_rows - $k++;

    echo $num.'. '."<a href='./view.php?pid=$row[pid]&page=$page'>".$row[title]." $row[bid]</a>";
    echo "&nbsp; <a href='./swap.php?act=up&pid=$row[pid]&page=$page' title='위 게시물과 교체'>↑</a>";
    echo "&nbsp; <a href='./swap.php?act=down&pid=$row[pid]&page=$page' title='아래 게시물과 교체'>↓</a>";
    echo "<br>";
}

echo "<br>";
echo get_paging(10, $page, $total_page, './list.php?page=');

echo "<br><br>";
echo get_time() - $start;