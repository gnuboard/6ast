<?php
include_once('./common.php');

$start = get_time();

$table = 'a_post';

$pid = $_GET['pid'];
$page = $_GET['page'];

$sql = " select SQL_NO_CACHE * from $table where pid = '$pid' ";
$view = sql_fetch($sql);

$sql = " select * from $table where oid < '$view[oid]' order by oid desc limit 1 ";
$prev = sql_fetch($sql);

$sql = " select * from $table where oid > '$view[oid]' order by oid asc limit 1 ";
$next = sql_fetch($sql);

if ($prev[pid]) 
    echo "<a href='./a_view.php?pid=$prev[pid]'>이전</a> &nbsp;";

echo "<a href='./a_list.php?page=$page'>목록</a> &nbsp;";

if ($next[pid]) 
    echo "<a href='./a_view.php?pid=$next[pid]'>다음</a>";

echo "<h1>$view[po_title]</h1>";
echo "<div>$view[po_name] | $view[po_datetime]</div>";
echo "<div>";
echo "<button>댓글 $view[po_comment]</button> ";
echo "<button>+ 가</button> ";
echo "<button>- 가</button> ";
echo "</div>";
echo "<div>$view[po_content]</div>";
echo "<button>추천 $view[po_good]</button> ";
echo "<br><br>";

$comment_table = 'a_postcomment';

$sql = " select * from $comment_table where pid = '$view[pid]' ";
$result = sql_query($sql);
for ($i=1; $row=sql_fetch_array($result); $i++) {
    echo "<div>".$i.". ".$row[pc_content];
    echo "<div><button>답글 $row[pc_comment2]</button> <button>추천 $row[pc_good]</button></div>";
    echo "</div>";
}

echo get_time() - $start;