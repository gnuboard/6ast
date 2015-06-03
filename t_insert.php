<?php
include_once('./common.php');

$start = get_time();

sql_query(' truncate table t_post ');

for ($i=0; $i<1000000; $i++) {

    sql_query(" insert into t_post set title = 'title $i' ");
    $aid = 1000000 - $i;
    $category = ($i % 10) + 1;
    sql_query(" update t_post set oid = cast(last_insert_id() as integer) * -1, aid = '$aid', category = '$category' where pid = last_insert_id() ");
}

echo get_time() - $start;