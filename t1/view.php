<?php
include_once('./common.php');

$start = get_time();

$post_table = 'a_post';
$comment_table = 'a_comment';
$commentreply_table = 'a_commentreply';

$pid = $_GET['pid'];
$page = $_GET['page'];

$sql = " select SQL_NO_CACHE * from $post_table where pid = '$pid' ";
$view = sql_fetch($sql);

$sql = " select * from $post_table where oid < '$view[oid]' order by oid desc limit 1 ";
$prev = sql_fetch($sql);

$sql = " select * from $post_table where oid > '$view[oid]' order by oid asc limit 1 ";
$next = sql_fetch($sql);

if ($prev[pid]) 
    echo "<a href='./view.php?pid=$prev[pid]'>이전</a> &nbsp;";

echo "<a href='./list.php?page=$page'>목록</a> &nbsp;";

if ($next[pid]) 
    echo "<a href='./view.php?pid=$next[pid]'>다음</a>";

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
echo "<button>댓글쓰기</button>";
echo "<div>\n\n";
echo "<form method='post' action='./comment_update.php'>\n";
echo "<input type=hidden name=pid value='$pid'>\n";
echo "<input type=hidden name=pc_name value='".date('His', time())."'>\n";
echo "<textarea name='pc_content' rows=5 cols=40></textarea>\n";
echo "<br><input type=submit>\n";
echo "</form>\n\n";
echo "</div>";
echo "<br><br>";

$sql = " select * from $comment_table where pid = '$view[pid]' order by oid desc ";
$result = sql_query($sql);
for ($i=1; $row=sql_fetch_array($result); $i++) {
    //print_r($row);
    echo "<div>";
    if ($row[cid] !== $row[parent_cid]) {
        echo "↘ ";
    }
    if ($row[pc_to_name]) {
        echo "$row[pc_to_name]님께 쓴 댓글<br>";
    }
    echo "$row[pc_content]<br><small>$row[pc_name]님 | $row[pc_datetime] | $row[pc_ip]";
    if ($row[cid] == $row[parent_cid])
        echo "| 답변 : $row[pc_reply]";
    echo "</small>";
    if ($row[cid] === $row[parent_cid]) {
        echo "<br><form method=post action='./comment_update.php'>\n";
        echo "<input type=hidden name=pid value='$row[pid]'>\n";
        echo "<input type=hidden name=cid value='$row[cid]'>\n";
        echo "<input type=hidden name=pc_name value='".date('His', time())."'>";
        echo "<input type=hidden name=pc_to_mid value='$row[mid]'>\n";
        echo "<textarea name=pc_content></textarea><input type=submit></form>";
    }
    //echo "<div><button>추천 $row[pc_good]</button></div>";
    echo "</div>";

    /*
    $sql2 = " select * from $commentreply_table where cid = '$row[cid]' order by rid desc ";
    $result2 = sql_query($sql2);
    for($k=1;$row2=sql_fetch_array($result2);$k++){
        echo "<div>";
        echo "($k) $row2[re_content] $row2[re_datetime]";
        echo "</div>";
    }

    echo "<form method=post action='commentreply_update.php'>";
    echo "<input type=hidden name=pid value='$row[pid]'>";
    echo "<input type=hidden name=cid value='$row[cid]'>";
    echo "<textarea name=re_content></textarea>";
    echo "<input type=submit>";
    echo "</form>";
    echo "</div>";
    */
}

echo '<br><br>';

// 이전 게시물
$sql = " select pid, po_title from $post_table where oid < '$view[oid]' order by oid desc limit 2 ";
$result = sql_query($sql);
for ($i=0; $row=sql_fetch_array($result); $i++) {
    $tmp_array[] = $row;
}

for ($i=count($tmp_array); $i>=0; $i--) {
    $row = $tmp_array[$i];
    echo "<a href='$_SERVER[PHP_SELF]?pid=$row[pid]'>$row[po_title]</a>";
    echo '<br>';
}

// 현재 게시물
echo "<strong><a href='$_SERVER[PHP_SELF]?pid=$view[pid]'>".$view[po_title]."</a></strong>";
echo '<br>';

// 다음 게시물
$sql = " select pid, po_title from $post_table where oid > '$view[oid]' order by oid asc limit 2 ";
$result = sql_query($sql);
for ($i=0; $row=sql_fetch_array($result); $i++) {
    echo "<a href='$_SERVER[PHP_SELF]?pid=$row[pid]'>$row[po_title]</a>";
    echo '<br>';
}


echo '<br><br>';

echo get_time() - $start;

exit;
include_once('./common.php');

$start = get_time();

$post_table = 'a_post';
$comment_table = 'a_comment';
$commentreply_table = 'a_commentreply';

$pid = $_GET['pid'];
$page = $_GET['page'];

$sql = " select SQL_NO_CACHE * from $post_table where pid = '$pid' ";
$view = sql_fetch($sql);

$sql = " select * from $post_table where oid < '$view[oid]' order by oid desc limit 1 ";
$prev = sql_fetch($sql);

$sql = " select * from $post_table where oid > '$view[oid]' order by oid asc limit 1 ";
$next = sql_fetch($sql);

if ($prev[pid]) 
    echo "<a href='./view.php?pid=$prev[pid]'>이전</a> &nbsp;";

echo "<a href='./list.php?page=$page'>목록</a> &nbsp;";

if ($next[pid]) 
    echo "<a href='./view.php?pid=$next[pid]'>다음</a>";

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
echo "<button>댓글쓰기</button>";
echo "<div>\n\n";
echo "<form method='post' action='./comment_update.php'>\n";
echo "<input type=hidden name=pid value='$pid'>\n";
echo "<input type=hidden name=pc_name value='".date('His', time())."'>\n";
echo "<textarea name='pc_content' rows=5 cols=40></textarea>\n";
echo "<br><input type=submit>\n";
echo "</form>\n\n";
echo "</div>";
echo "<br><br>";

$sql = " select * from $comment_table where pid = '$view[pid]' order by oid ";
$result = sql_query($sql);
for ($i=1; $row=sql_fetch_array($result); $i++) {
    //print_r($row);
    echo "<div>";
    if ($row[cid] !== $row[parent_cid]) {
        echo "↘";
    }
    if ($row[pc_to_name]) {
        echo "$row[pc_to_name]님께 쓴 댓글<br>";
    }
    echo "$row[pc_content]<br><small>$row[pc_name]님 | $row[pc_datetime] | $row[pc_ip])</small>";
    if ($row[cid] === $row[parent_cid]) {
        echo "<br><form method=post action='./comment_update.php'>\n";
        echo "<input type=hidden name=pid value='$row[pid]'>\n";
        echo "<input type=hidden name=cid value='$row[cid]'>\n";
        echo "<input type=hidden name=pc_name value='".date('His', time())."'>";
        echo "<input type=hidden name=pc_to_mid value='$row[mid]'>\n";
        echo "<textarea name=pc_content></textarea><input type=submit></form>";
    }
    //echo "<div><button>추천 $row[pc_good]</button></div>";
    echo "</div>";

    /*
    $sql2 = " select * from $commentreply_table where cid = '$row[cid]' order by rid desc ";
    $result2 = sql_query($sql2);
    for($k=1;$row2=sql_fetch_array($result2);$k++){
        echo "<div>";
        echo "($k) $row2[re_content] $row2[re_datetime]";
        echo "</div>";
    }

    echo "<form method=post action='commentreply_update.php'>";
    echo "<input type=hidden name=pid value='$row[pid]'>";
    echo "<input type=hidden name=cid value='$row[cid]'>";
    echo "<textarea name=re_content></textarea>";
    echo "<input type=submit>";
    echo "</form>";
    echo "</div>";
    */
}

echo '<br><br>';

// 이전 게시물
$sql = " select pid, po_title from $post_table where oid < '$view[oid]' order by oid desc limit 2 ";
$result = sql_query($sql);
for ($i=0; $row=sql_fetch_array($result); $i++) {
    $tmp_array[] = $row;
}

for ($i=count($tmp_array); $i>=0; $i--) {
    $row = $tmp_array[$i];
    echo "<a href='$_SERVER[PHP_SELF]?pid=$row[pid]'>$row[po_title]</a>";
    echo '<br>';
}

// 현재 게시물
echo "<strong><a href='$_SERVER[PHP_SELF]?pid=$view[pid]'>".$view[po_title]."</a></strong>";
echo '<br>';

// 다음 게시물
$sql = " select pid, po_title from $post_table where oid > '$view[oid]' order by oid asc limit 2 ";
$result = sql_query($sql);
for ($i=0; $row=sql_fetch_array($result); $i++) {
    echo "<a href='$_SERVER[PHP_SELF]?pid=$row[pid]'>$row[po_title]</a>";
    echo '<br>';
}


echo '<br><br>';

echo get_time() - $start;