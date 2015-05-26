<?php
include_once('./common.php');

sql_query(' truncate table 6a_post ');

$sql = " select * from g4_write_cm_free where wr_is_comment = 0 order by wr_num, wr_reply ";
$result = sql_query($sql);
$k=9999999;
for ($i=0; $row=sql_fetch_array($result); $i++) {
    $bid = $row[wr_id] * (-1);
    $sql = " insert into 6a_post set pid = '$row[wr_id]', bid = '$bid', oid = '$row[wr_id]', title = '".addslashes($row['wr_subject'])."', content = '".addslashes($row['wr_content'])."', member_name = '".addslashes($row['wr_name'])."', ccnt = '$row[wr_comment]', hit = '$row[wr_hit]', good = '$row[wr_good]', nogood = '$row[wr_nogood]', time = '$row[wr_dateime]', ip = '$row[wr_ip]', wr_id = '$row[wr_id]' ";
    sql_query($sql);
    $k--;
}

die(date('Y.m.d H:i:s') . ' end');