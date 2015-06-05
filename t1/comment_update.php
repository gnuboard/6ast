<?php
include_once('./common.php');

$post_table = 'a_post';
$comment_table = 'a_comment';

$pid = (int)$_POST[pid];

$sql = " insert into $comment_table
            set pid = '$pid',
                pc_content = '".addslashes($_POST[pc_content])."',
                pc_datetime = NOW(),
                pc_ip = '$_SERVER[REMOTE_ADDR]' ";
sql_query($sql);

$sql = " select count(*) as cnt from $comment_table where pid = '$pid' "; 
$row = sql_fetch($sql);

sql_query(" update $post_table set po_comment = '$row[cnt]' where pid = '$pid' ");

header("location:./view.php?pid=$pid");