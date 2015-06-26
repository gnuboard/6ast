<?php
include_once('./common.php');

$start = get_time();

$page = $_GET[page];

if (!$page) $page = 1;
$page_rows = 25;

if (empty($category)) $category = -1;

$sql = " select SQL_NO_CACHE count(*) as cnt from t3_post ";
$row = sql_fetch($sql);
$total_count = $row[cnt];

$total_page  = ceil($total_count / $page_rows);  // 전체 페이지 계산
$from_record = ($page - 1) * $page_rows; // 시작 열을 구함

$sql = " select SQL_NO_CACHE * from t3_post force index(oid) ";
$sql .=  " order by oid desc limit $from_record, $page_rows ";
$result = sql_query($sql);
$k=0;
for ($i=0; $row=sql_fetch_array($result); $i++) {

    //$num = $total_count - ($page - 1) * $page_rows - $k++;
    $num = $row[pid];

    echo $num.'. '."<a href='./t3_view.php?pid=$row[pid]&page=$page'>".$row['title']."</a>";
    echo "<br>";
}

echo "<br>";
echo get_paging(10, $page, $total_page, "./t3_list.php?page=");

echo "<br><br>";
echo get_time() - $start;