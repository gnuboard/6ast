<?php
include_once('./common.php');

// 위, 아래 게시물과 교체

$start = get_time();

$act = $_GET['act'];
$pid = $_GET['pid'];
$page = $_GET['page'];

$sql = " select SQL_NO_CACHE * from 6a_post where pid = '$pid' ";
$orig = sql_fetch($sql);

switch ($act) {
    case 'up' :
        $sql = " select pid, bid from 6a_post where bid < '$orig[bid]' order by bid desc limit 1 ";
        $dest = sql_fetch($sql);
        break;
    case 'down' : 
        $sql = " select pid, bid from 6a_post where bid > '$orig[bid]' order by bid asc limit 1 ";
        $dest = sql_fetch($sql);
        break;
}

if ($dest[pid]) {

    $tmp = $dest;

    $sql = " update 6a_post set bid = '$orig[bid]' where pid = '$dest[pid]' ";
    sql_query($sql);

    $sql = " update 6a_post set bid = '$tmp[bid]' where pid = '$orig[pid]' ";
    sql_query($sql);
}

header("location: ./list.php?page=$page");
