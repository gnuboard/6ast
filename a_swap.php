<?php
include_once('./common.php');

// 위, 아래 게시물과 교체

$start = get_time();

$table = 'a_post';

$act = $_GET['act'];
$pid = $_GET['pid'];
$page = $_GET['page'];

$sql = " select SQL_NO_CACHE * from $table where pid = '$pid' ";
$orig = sql_fetch($sql);

switch ($act) {
    case 'up' :
        $sql = " select pid, oid from $table where oid < '$orig[oid]' order by oid desc limit 1 ";
        $dest = sql_fetch($sql);
        break;
    case 'down' : 
        $sql = " select pid, oid from $table where oid > '$orig[oid]' order by oid asc limit 1 ";
        $dest = sql_fetch($sql);
        break;
}

if ($dest[oid]) {

    $tmp = $dest;

    $sql = " update $table set oid = '$orig[oid]' where pid = '$dest[pid]' ";
    sql_query($sql);

    $sql = " update $table set oid = '$tmp[oid]' where pid = '$orig[pid]' ";
    sql_query($sql);
}

header("location: ./a_list.php?page=$page");
