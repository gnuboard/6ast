<?php
include_once('./common.php');

$start = get_time();

$page = $_GET['page'];
$order = preg_replace("#^(asc|desc)$#", "$1", strtolower($_GET['order']));
$force = preg_replace("#^(true|false)$#", "$1", strtolower($_GET['force']));

if (!$page) $page = 1;
$page_rows = 20;

$sql = " select SQL_NO_CACHE count(*) as cnt from t_post ";
$row = sql_fetch($sql);
$total_count = $row[cnt];

$total_page  = ceil($total_count / $page_rows);  // 전체 페이지 계산
$from_record = ($page - 1) * $page_rows; // 시작 열을 구함

// oid 는 음수 unique
//$sql = " select SQL_NO_CACHE * from t_post order by oid asc limit $from_record, $page_rows ";
// 속도 무지 빠름
//$sql = " select SQL_NO_CACHE * from t_post limit $from_record, $page_rows ";
// 속도가 oid 와 비슷함
$sql = " select SQL_NO_CACHE * from t_post ";
if ($force == 'true') 
    $sql .= " force key(primary) ";
if ($order) 
    $sql .= " order by pid $order ";
$sql .= " limit $from_record, $page_rows ";
$result = sql_query($sql);
$k=0;
for ($i=0; $row=sql_fetch_array($result); $i++) {

    //$num = $total_count - ($page - 1) * $page_rows - $k++;
    $num = $row[pid];

    echo $num.'. '.$row['title'];
    echo "<br>";
}

echo "<br>";
echo get_paging(10, $page, $total_page, "./t_list.php?order=$order&page=");

echo "<br><br>";
echo get_time() - $start;