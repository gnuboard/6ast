<?php
include_once('./common.php');

$start = get_time();

$table = 'a_post';

$page = $_GET['page'];

if (!$page) $page = 1;
$page_rows = 20;

$sql = " select SQL_NO_CACHE count(*) as cnt from $table ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$total_page  = ceil($total_count / $page_rows);  // 전체 페이지 계산
$from_record = ($page - 1) * $page_rows; // 시작 열을 구함

$sql = " select SQL_NO_CACHE * from $table force key(oid) where bid = 'free' order by oid asc limit $from_record, $page_rows ";
$result = sql_query($sql);
$k=0;
for ($i=0; $row=sql_fetch_array($result); $i++) {

    //$num = $total_count - ($page - 1) * $page_rows - $k++;
    $num = $row[pid];

    echo "<a href='./a_swap.php?act=up&pid=$row[pid]&page=$page' title='위 게시물과 교체'>▲</a> ";
    echo "<a href='./a_swap.php?act=down&pid=$row[pid]&page=$page' title='아래 게시물과 교체'>▼</a>";
    echo "&nbsp;".$num.'. '."$row[oid] <a href='./a_view.php?pid=$row[pid]&page=$page'>".$row['po_title']."</a> ($row[po_comment]) $row[po_datetime]";
    echo "<br>";
}

echo "<br>";
echo get_paging(10, $page, $total_page, './a_list.php?page=');

echo "<br><br>";
echo get_time() - $start;