<?php
include_once('./common.php');

$post_table = 'a_post';
$comment_table = 'a_comment';

$pid = (int)$_POST[pid];
$cid = (int)$_POST[cid];

$sql = " insert into $comment_table
            set pid = '$pid',
                pc_name = '".addslashes($_POST[pc_name])."',
                pc_to_mid = '".addslashes($_POST[pc_to_mid])."',
                pc_to_name = '".addslashes($_POST[pc_to_name])."',
                pc_content = '".addslashes($_POST[pc_content])."',
                pc_datetime = NOW(),
                pc_ip = '$_SERVER[REMOTE_ADDR]' ";
sql_query($sql);

$new_cid = mysql_insert_id();

if ($cid) {

    $sql = " select oid from $comment_table where cid = '$cid' ";
    $row = sql_fetch($sql);
    $oid = (int)$row[oid];

    sql_query(" update $comment_table set oid = oid + 1 where pid = $pid and oid >= $oid ");
    sql_query(" update $comment_table set parent_cid = $cid, oid = $oid where cid = $new_cid ");

    $sql = " select count(*) as cnt from $comment_table where parent_cid = $cid ";
    $row = sql_fetch($sql);
    $reply = $row[cnt] - 1;

    sql_query(" update $comment_table set pc_reply = $reply where cid = $cid ");

} else {

    $sql = " select max(oid) as max_oid from $comment_table where pid = $pid ";
    $row = sql_fetch($sql);
    $oid = $row[max_oid] + 1;

    sql_query(" update $comment_table set parent_cid = $new_cid, oid = $oid where cid = $new_cid ");
}


// 댓글 갯수를 원글에 반영
$sql = " select count(*) as cnt from $comment_table where pid = '$pid' "; 
$row = sql_fetch($sql);
sql_query(" update $post_table set po_comment = '$row[cnt]' where pid = '$pid' ");

header("location:./view.php?pid=$pid");
exit;


include_once('./common.php');

$post_table = 'a_post';
$comment_table = 'a_comment';

$pid = (int)$_POST[pid];
$cid = (int)$_POST[cid];

$sql = " insert into $comment_table
            set pid = '$pid',
                pc_name = '".addslashes($_POST[pc_name])."',
                pc_to_mid = '".addslashes($_POST[pc_to_mid])."',
                pc_to_name = '".addslashes($_POST[pc_to_name])."',
                pc_content = '".addslashes($_POST[pc_content])."',
                pc_datetime = NOW(),
                pc_ip = '$_SERVER[REMOTE_ADDR]' ";
sql_query($sql);

$new_cid = mysql_insert_id();

if ($cid) {

    $sql = " select oid from $comment_table where cid = '$cid' ";
    $row = sql_fetch($sql);
    $oid = (int)$row[oid];

    sql_query(" update $comment_table set oid = oid - 1 where pid = $pid and oid <= $oid ");
    sql_query(" update $comment_table set parent_cid = $cid, oid = $oid where cid = $new_cid ");

} else {

    $sql = " select min(oid) as min_oid from $comment_table where pid = $pid ";
    $row = sql_fetch($sql);
    $oid = $row[min_oid] - 1;

    $sql = " update $comment_table set parent_cid = $new_cid, oid = $oid where cid = $new_cid ";
    sql_query($sql);
}


// 댓글 갯수를 원글에 반영
$sql = " select count(*) as cnt from $comment_table where pid = '$pid' "; 
$row = sql_fetch($sql);
sql_query(" update $post_table set po_comment = '$row[cnt]' where pid = '$pid' ");

header("location:./view.php?pid=$pid");