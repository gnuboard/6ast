<?php
include_once('./common.php');

$post_table = 'a_post';
$comment_table = 'a_comment';
$commentreply_table = 'a_commentreply';

$pid = (int)$_POST[pid];
$cid = (int)$_POST[cid];

$sql = " insert into $commentreply_table
            set cid = '$cid',
                re_content = '".addslashes($_POST[re_content])."',
                re_datetime = NOW(),
                re_ip = '$_SERVER[REMOTE_ADDR]' ";
sql_query($sql);

$sql = " select count(*) as cnt from $commentreply_table where cid = '$cid' "; 
$row = sql_fetch($sql);

sql_query(" update $comment_table set pc_reply = '$row[cnt]' where cid = '$cid' ");

header("location:./view.php?pid=$pid");