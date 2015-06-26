<?php
include_once('./common.php');

$start = get_time();

$page = $_GET['page'];
$index = preg_replace('#^(oid|aid)$#', '$1', $_GET['index']);
$order = preg_replace('#^(asc|desc)$#', '$1', $_GET['order']);
$force = preg_replace('#^(true|false)$#', '$1', $_GET['force']);
$category = (int)($_GET['category']);

if (!$page) $page = 1;
$page_rows = 20;

$sql = " select SQL_NO_CACHE count(*) as cnt from t_post ";
if ($category) $sql .= " where category = '$category' ";
$row = sql_fetch($sql);
$total_count = $row[cnt];

$total_page  = ceil($total_count / $page_rows);  // 전체 페이지 계산
$from_record = ($page - 1) * $page_rows; // 시작 열을 구함

$sql = "select SQL_NO_CACHE * from t_post";
if ($force && $index) $sql .= " force key($index) ";
if ($category) $sql .= " where category = '$category' ";
if ($index) $sql .= " order by $index ";
if ($order) $sql .= $order;
$sql .=  " limit $from_record, $page_rows ";
$result = sql_query($sql);
$k=0;
for ($i=0; $row=sql_fetch_array($result); $i++) {
    $num = $row[pid];

    echo $num.'. '.$row['title'];
    echo "<br>";
}

echo "<br>";
echo get_paging(10, $page, $total_page, "./t2_list.php?index=$index&order=$order&force=$force&category=$category&page=");

echo "<br><br>";
echo get_time() - $start;