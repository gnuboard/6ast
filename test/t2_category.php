<?php
include_once('./common.php');

$start = get_time();

$sql = " select pid from t2_post ";
$result = sql_query($sql);
for ($i=0; $row=sql_fetch_array($result); $i++) {
    $category = $i % 100;
    sql_query(" update t2_post set category = $category where pid = '$row[pid]' ");
}

echo get_time() - $start;