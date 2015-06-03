<?php
include_once('./common.php');

$write_table = " g4_write_cm_free ";

$post_table = 'a_post';
$postcomment_table = 'a_postcomment';

sql_query(" truncate $post_table ");

$sql = " select * from $write_table where wr_is_comment = 0 order by wr_num desc ";
$sql.= " limit 20 ";
$result = sql_query($sql);
for ($i=0; $row=sql_fetch_array($result); $i++) {
    $sql2 = " select min(oid) as min_oid from $post_table ";
    $row2 = sql_fetch($sql2);
    $min_oid = (int)$row2['min_oid'] - 1;

    $sql3 = " insert $post_table 
                set oid         = $min_oid,
                    bid         = 'free',
                    mid         = '".addslashes($row['mb_id'])."',
                    po_title    = '".addslashes($row['wr_subject'])."',
                    po_content  = '".addslashes($row['wr_content'])."',
                    po_name     = '".addslashes($row['wr_name'])."',
                    po_hit      = '".addslashes($row['wr_hit'])."',
                    po_good     = '".addslashes($row['wr_good'])."',
                    po_nogood   = '".addslashes($row['wr_nogood'])."',
                    po_link     = '".addslashes($row['wr_link1'])."',
                    po_link_hit = '".addslashes($row['wr_link1_hit'])."',
                    po_file     = '".addslashes($row['wr_file'])."',
                    po_comment  = '".addslashes($row['wr_comment'])."',
                    po_datetime = '".addslashes($row['wr_datetime'])."',
                    po_ip       = '".addslashes($row['wr_ip'])."',
                    po_title_ft = '".addslashes($row['wr_subject_ft'])."',
                    po_content_ft = '".addslashes($row['wr_content_ft'])."',
                    wr_id       = $row[wr_id]
                    ";
    sql_query($sql3);
}

sql_query(" truncate $postcomment_table ");

$sql = " select * from $post_table order by pid ";
$result = sql_query($sql);
for($i=0;$row=sql_fetch_array($result);$i++){
    $sql2 = " select * from $write_table where wr_parent = '$row[wr_id]' and wr_is_comment = 1 order by wr_comment ";
    $result2 = sql_query($sql2);
    for($k=0;$row2=sql_fetch_array($result2);$k++){
        $sql3 = " insert $postcomment_table
                     set pid = '$row[pid]',
                         pc_content = '".addslashes($row2[wr_content])."',
                         pc_datetime = '".addslashes($row2[wr_datetime])."' 
                         ";
        sql_query($sql3);
    }
}

die('ok');
?>