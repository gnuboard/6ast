<?php
include_once('./common.php');

$start = get_time();

sql_query(' truncate table t2_post ');

for ($i=1000000; $i>0; $i--) {
    sql_query(" insert into t2_post set pid = '$i', title = 'title $i' ");
}

echo get_time() - $start;