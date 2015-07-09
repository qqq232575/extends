<?php
header("Content-type: text/html; charset=gbk"); 
set_time_limit(0);
$dbhost = 'localhost';
$dbuser = 'root';
$dbpw = 'xin';
$dbname = 'qiche';
$mcharset = 'gbk';
$lnk = mysql_connect($dbhost,$dbuser,$dbpw) or die(mysql_error());
mysql_select_db( $dbname, $lnk ) or die(mysql_error());
mysql_query('SET NAMES \''.$mcharset.'\'',$lnk) or die(mysql_error());

if(isset($_POST[c]) != ''){
    foreach($_POST[c] as $k=>$v){
        $update = "update chexing set xcarid=".$v." where ccid=".$k;
        if($v != ''){
            query($update);
        }
    }
    exit;
}
$chexingres = select("SELECT * from chexing where xcarid is NULL order by title asc");
echo "<form action='' method=POST>";
foreach($chexingres as $k=>$v){
    echo $v['title']."<input type='text' name='c[".$v['ccid']."]' value='' /><br/>";
}
echo '<input type="submit" /></form>';

function select($sql){
    $res = mysql_query($sql) or die(mysql_error());
    while($row = mysql_fetch_assoc($res)){
        $data[]=$row;
    }
    return $data;
}
function query($sql){
    $res = mysql_query($sql) or die(mysql_error());
    return $res;
}