<?php
include_once('./common.php');

$start = get_time();

sql_query(' truncate table t3_post ');

for ($i=-1; $i>-1000000; $i--) {
    sql_query(" insert into t3_post set pid = '$i', title = 'title $i' ");
}

echo get_time() - $start;